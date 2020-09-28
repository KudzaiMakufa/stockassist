<?php
class Controller_Transfer extends Controller_Template
{

	public function action_index($stock_id = null)
	{
		$data['transfers'] = null ;

		if(is_null($stock_id))
		{
			$data['items'] = Model_Stockcount::find(array('where'=>array('reconciled'=>0)));
			$data['transfers'] = Model_Transfer::find(array('where'=>array('stock_id'=>0)));
		}else{
			$data['items'] = Model_Stockcount::find(array('where'=>array('reconciled'=>0)));
			$data['transfers'] = Model_Transfer::find(array('where'=>array('stock_id'=>$stock_id)));
		}
		


		
		$this->template->title = "Transfers";
		$this->template->content = View::forge('transfer/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('transfer');

		$data['transfer'] = Model_Transfer::find_by_pk($id);

		$this->template->title = "Transfer";
		$this->template->content = View::forge('transfer/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Transfer::validate('create');

			if ($val->run())
			{
				$transfer = Model_Transfer::forge(array(
					'product_id' => Input::post('product_id'),
					'quantity' => Input::post('quantity'),
					'reason' => Input::post('reason'),
					'date' => Input::post('date'),
					'stock_id' => 0,
					'created_at'=>0,
					'updated_at'=>0
				));

				if ($transfer and $transfer->save())
				{
					Session::set_flash('success', 'Added transfer #'.$transfer->id.'.');
					Response::redirect('transfer');
				}
				else
				{
					Session::set_flash('error', 'Could not save transfer.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Transfers";
		$this->template->content = View::forge('transfer/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('transfer');

		$transfer = Model_Transfer::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Transfer::validate('edit');

			if ($val->run())
			{
				$transfer->product_id = Input::post('product_id');
				$transfer->quantity = Input::post('quantity');
				$transfer->reason = Input::post('reason');
				$transfer->date = Input::post('date');
				

				if ($transfer->save())
				{
					Session::set_flash('success', 'Updated transfer #'.$id);
					Response::redirect('transfer');
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

		$this->template->set_global('transfer', $transfer, false);
		$this->template->title = "Transfers";
		$this->template->content = View::forge('transfer/edit');

	}

	public function action_delete($id = null)
	{
		if ($transfer = Model_Transfer::find_one_by_id($id))
		{
			$transfer->delete();

			Session::set_flash('success', 'Deleted transfer #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete transfer #'.$id);
		}

		Response::redirect('transfer');

	}

}
