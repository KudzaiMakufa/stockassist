<?php
class Controller_Reconciliation extends Controller_Template
{

	public function action_calculate($stock_id = null)
	{
		//all ogic goes here
		$products = Model_Product::find_all(); 
		if(is_null($products)){
			Session::set_flash('error', 'Selected stock period does not exist	');
			Response::redirect('stocktake/choose');
		}
		foreach($products as $item){
			$openingqty = 0 ;
			$purchaseqty = 0 ;
			$transferqty = 0 ;
			$closingqty = 0 ;
			

			//opening 

			$sql = "select SUM(quantity) as rcrds from openings where product_id = '".$item->id."' and  stock_id = '".$stock_id."' ";
			$query = DB::query($sql)->execute()->as_array();
			if(is_null($query))
			{

			}
			else
			{
				$openingqty = doubleval($query[0]['rcrds']) ;
			}
			
			//purchases
			$sql = "select SUM(quantity) as rcrds from purchases where product_id = '".$item->id."' and  stock_id = '".$stock_id."' ";
			$query = DB::query($sql)->execute()->as_array();
			if(is_null($query))
			{

			}
			else
			{
				$purchaseqty = doubleval($query[0]['rcrds']);
			}

			//transfers
			$sql = "select SUM(quantity) as rcrds from transfers where product_id = '".$item->id."' and  stock_id = '".$stock_id."' ";
			$query = DB::query($sql)->execute()->as_array();
			if(is_null($query))
			{

			}
			else
			{
				$transferqty = doubleval($query[0]['rcrds']) ;
			}

			//closing 
			$sql = "select SUM(quantity) as rcrds from closings where product_id = '".$item->id."' and  stock_id = '".$stock_id."' ";
			$query = DB::query($sql)->execute()->as_array();
			if(is_null($query))
			{

			}
			else
			{	
				$closingqty = doubleval($query[0]['rcrds']) ;
			}
			

			//get selling price
			$sellingprice = doubleval(Custom::getProductSellingPrice($item->id, $stock_id)); 
			//get cost  price
			//we will fix u letter
			//$costprice = Custom::getClosingCostPrice($item->id , $stock_id) ;
			
			//now insert nto reconciliation statement
			$total = ($openingqty+$purchaseqty)- $transferqty ; 
			$salesunits = $total - $closingqty ;

			$reconciliation = Model_Reconciliation::forge(array(
				'product_id'=>$item->id , 
				'opening' => $openingqty,
				'purchases' => $purchaseqty,
				'transfers' => $transferqty,
				'total' => $total,
				'closing' => $closingqty,
				'sales_units' => $salesunits,
				'unit_price' => $sellingprice,
				'total_sales' => $salesunits* $sellingprice,
				'profit' => 0,
				'stock_id'=>$stock_id,
				'created_at'=>0,
				'updated_at'=>0
			));

			if ($reconciliation and $reconciliation->save())
			{
				//fetching closing stock to pump in opening stock 
				$quantity = Model_Closing::find(array('where'=>array('stock_id'=>$stock_id,'product_id'=>$item->id)))[0];
				//Debug::dump($quantity);die;
				$opening = Model_Opening::forge(array(
					'product_id' => $item->id,
					'quantity' => $quantity->quantity,
					'date' => date("y-m-d"),
					'stock_id' => 0,
					'created_at'=>0,
					'updated_at'=>0
				));

				if ($opening and $opening->save())
				{
					//$quantity->stock_id = ; 	
				}
			}

		}
		Session::set_flash('success', 'Stock reconciliation successful');
		Response::redirect('reconciliation');

	}
	public function action_index($stock_id = null)
	{
		$data['reconciliations'] = null ;
		$data['items'] = null ;
		$data['expectedcash']= 0 ;
		$data['actualcash']= 0 ;
		if(is_null($stock_id)){
			$data['reconciliations'] = null ;
			$data['items'] = Model_Stockcount::find(array('where'=>array('reconciled'=>0)));
		}else{
			$data['reconciliations'] = Model_Reconciliation::find(array('where'=>array('stock_id'=>$stock_id)));
			$data['items'] = Model_Stockcount::find(array('where'=>array('reconciled'=>0)));
			//calculating expected cash
			$sql = "select SUM(total_sales) as rcrds from reconciliations where stock_id = '".$stock_id."'  ";

			$query = DB::query($sql)->execute()->as_array();
			$data['expectedcash']= doubleval($query[0]['rcrds']) ;

			//calculating  actual cash
			$sql = "select SUM(amount) as rcrds from dailytakings where stockname = '".$stock_id."'  ";

			$query = DB::query($sql)->execute()->as_array();

			$data['actualcash']= doubleval($query[0]['rcrds']) ;

			//get cashier name 
			$sql = "select cashier as rcrds from dailytakings where stockname = '".$stock_id."'  ";

			$query = DB::query($sql)->execute()->as_array();
			// Debug::dump(empty($query));die;

			if(empty($query)){
				$data['cashier']=  "no cashier" ; 
			}else{
				$data['cashier']= $query[0]['rcrds'] ;
			}
			

			$data['stockname']= $stock_id ;
			

			//Debug::dump($data['expectedcash']);die;
			
		}
		

		//Debug::dump(is_null($stock_id));die;
		$this->template->title = "Reconciliations";
		$this->template->content = View::forge('reconciliation/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('reconciliation');

		$data['reconciliation'] = Model_Reconciliation::find_by_pk($id);

		$this->template->title = "Reconciliation";
		$this->template->content = View::forge('reconciliation/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Reconciliation::validate('create');

			if ($val->run())
			{
				$reconciliation = Model_Reconciliation::forge(array(
					'opening' => Input::post('opening'),
					'purchases' => Input::post('purchases'),
					'transfers' => Input::post('transfers'),
					'total' => Input::post('total'),
					'closing' => Input::post('closing'),
					'sales_units' => Input::post('sales_units'),
					'unit_price' => Input::post('unit_price'),
					'total_sales' => Input::post('total_sales'),
					'profit' => Input::post('profit'),
					'stock_id'=>0,
					'created_at'=>0,
					'updated_at'=>0
				));

				if ($reconciliation and $reconciliation->save())
				{
					Session::set_flash('success', 'Added reconciliation #'.$reconciliation->id.'.');
					Response::redirect('reconciliation');
				}
				else
				{
					Session::set_flash('error', 'Could not save reconciliation.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Reconciliations";
		$this->template->content = View::forge('reconciliation/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('reconciliation');

		$reconciliation = Model_Reconciliation::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Reconciliation::validate('edit');

			if ($val->run())
			{
				$reconciliation->opening = Input::post('opening');
				$reconciliation->purchases = Input::post('purchases');
				$reconciliation->transfers = Input::post('transfers');
				$reconciliation->total = Input::post('total');
				$reconciliation->closing = Input::post('closing');
				$reconciliation->sales_units = Input::post('sales_units');
				$reconciliation->unit_price = Input::post('unit_price');
				$reconciliation->total_sales = Input::post('total_sales');
				$reconciliation->profit = Input::post('profit');

				if ($reconciliation->save())
				{
					Session::set_flash('success', 'Updated reconciliation #'.$id);
					Response::redirect('reconciliation');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('reconciliation', $reconciliation, false);
		$this->template->title = "Reconciliations";
		$this->template->content = View::forge('reconciliation/edit');

	}

	public function action_delete($id = null)
	{
		if ($reconciliation = Model_Reconciliation::find_one_by_id($id))
		{
			$reconciliation->delete();

			Session::set_flash('success', 'Deleted reconciliation #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete reconciliation #'.$id);
		}

		Response::redirect('reconciliation');

	}

}
