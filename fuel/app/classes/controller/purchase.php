<?php
class Controller_Purchase extends Controller_Template
{

	public function action_index($stock_id = null)
	{
		
		$data['purchases'] = null ;

		if(is_null($stock_id))
		{
			$data['items'] = Model_Stockcount::find(array('where'=>array('reconciled'=>0)));
			$data['purchases'] = Model_Purchase::find(array('where'=>array('stock_id'=>0)));
		}else{
			$data['items'] = Model_Stockcount::find(array('where'=>array('reconciled'=>0)));
			$data['purchases'] = Model_Purchase::find(array('where'=>array('stock_id'=>$stock_id)));
		}
		
		$this->template->title = "Purchases";
		$this->template->content = View::forge('purchase/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('purchase');

		$data['purchase'] = Model_Purchase::find_by_pk($id);

		$this->template->title = "Purchase";
		$this->template->content = View::forge('purchase/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Purchase::validate('create');

			if ($val->run())
			{
				$purchase = Model_Purchase::forge(array(
					'product_id' => Input::post('product_id'),
					'quantity' => Input::post('quantity'),
					'cost' => Custom::getProductCostPrice(Input::post('product_id')),
					'supplier' => "Multiple Suppliers",
					'date' => Input::post('date'),
					'stock_id' => 0,
					'created_at'=>0,
					'updated_at'=>0
				));
				

				if ($purchase and $purchase->save())
				{
					Session::set_flash('success', 'Added purchase #'.$purchase->id.'.');
					Response::redirect('purchase');
				}
				else
				{
					Session::set_flash('error', 'Could not save purchase.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Purchases";
		$this->template->content = View::forge('purchase/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('purchase');

		$purchase = Model_Purchase::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Purchase::validate('edit');

			if ($val->run())
			{
				$purchase->product_id = Input::post('product_id');
				$purchase->quantity = Input::post('quantity');
				//$purchase->cost = Custom::getProductCostPrice(Input::post('product_id'));
				// $purchase->supplier = Input::post('supplier');
				$purchase->date = Input::post('date');
				

				if ($purchase->save())
				{
					Session::set_flash('success', 'Updated purchase #'.$id);
					Response::redirect('purchase');
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

		$this->template->set_global('purchase', $purchase, false);
		$this->template->title = "Purchases";
		$this->template->content = View::forge('purchase/edit');

	}

	public function action_delete($id = null)
	{
		if ($purchase = Model_Purchase::find_one_by_id($id))
		{
			$purchase->delete();

			Session::set_flash('success', 'Deleted purchase #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete purchase #'.$id);
		}

		Response::redirect('purchase');

	}

}
