<?php

class Controller_Stocktake extends Controller_Template
{
	public function action_choose()
	{
		$data['items'] = Model_Stockcount::find(array('where'=>array('reconciled'=>0)));
		$this->template->title = 'Choose ';
		$this->template->content = View::forge('stocktake/choose', $data);	
	}
	public function action_index()
	{
		$data['products'] = null ;

		if(Input::method() == 'POST'){
			
			if(Input::post('from') == "" || Input::post('to') == ""){
				Session::set_flash('error','Select stocktake dates');
				Response::redirect('stocktake');

			}
			//Debug::dump(Input::post('from'));die;
			//save stock model
			$stock_id = 0 ; 
			$stockcount = Model_Stockcount::forge(array(
				'from' => Input::post('from'),
				'to' => Input::post('to'),
				'reconciled' => 0 ,
				'created_at'=>0,
				'updated_at'=>0
			));

			if($stockcount->save()){
				$stock_id = $stockcount->id ; 
			}
			
			//finding each product and calling respective input id 
			//saving to opening ,purchases , transfers and closing 
			$products  = Model_Product::find_all();
		
					$arr = [] ;
			foreach ($products as $item) 
			{
				
				//opening 
				$opening = Model_Opening::find(array('where'=>array('stock_id'=>0,'product_id' => $item->id)))[0];
				//Debug::dump($opening);die;
				if(is_null($opening)){

				}else{
					$opening->stock_id = $stock_id ; 
					$opening->save() ; 
				}

				//purchases 
				//'".$item->id."'
				$purchases = DB::query("SELECT * FROM purchases WHERE product_id = '".$item->id."' AND  stock_id = 0 " )->as_object()->execute(); 
				 //Debug::dump($purchases[0]->save);die;
				if(!$purchases){

				}else
				{
					//Debug::dump($purchase[0]->stockid);die;
					foreach($purchases as $purchase){
						//Debug::dump($purchase->stock_id);die;
						$purchase->stock_id = $stock_id ; 
						//converting to array 
						$purchasearray = Model_Purchase::forge((array)$purchase);
						//Debug::dump($purchasearray->save());die;
						$purchasearray->save() ; 
						// Debug::dump($purchase);
					}
				}	


				

				//Debug::dump($purchases->stock_id);die;
				//transfers

				$transfers = DB::query("SELECT * FROM transfers WHERE product_id = '".$item->id."' AND  stock_id = 0 " )->as_object()->execute(); 
				//Debug::dump($transfers);die;
				if(!$transfers){

				}else{
						//Debug::dump($transfers[0]['stock_id']);die;
						foreach($transfers as $transfer){


							$transfer->stock_id = $stock_id ; 
							//converting to array 
							$transferarray = Model_Transfer::forge((array)$transfer); 
							$transferarray->save() ; 
						}
				}
					
				

				//closing 

					//now adding closing stock to database
					$closing = Model_Closing::forge(array(
						'product_id' => $item->id,
						'quantity' => Input::post($item->id),
						'date' => date("Y/m/d"),
						'stock_id' => $stock_id,
						//storing the closing price for future reference incase of price changes to product 
						'closeprise' => $item->price,
						'created_at'=>0,
						'updated_at'=>0
					));

					$closing->save();

				// }



				

				//  if($item->save()){

				//  }else{
				// 	$arr[$item->id] =>  
				//  }
				
			
			}
			Session::set_flash('success','Closing stock captures successful ');
			Response::redirect('reconciliation');
			
			
		}
		else
		{

		$data['products'] = Model_Product::find(array('order_by'=>array('name'=>'desc')));

		}
	
		$this->template->title = 'Stocktake ';
		$this->template->content = View::forge('stocktake/index', $data);
	}

}

























