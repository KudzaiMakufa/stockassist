<?php
class Controller_Dailytaking extends Controller_Template
{

	public function action_index()
	{
		$data['dailytakings'] = Model_Dailytaking::find(array('order_by'=>array('id'=>'desc')));
		$this->template->title = "Dailytakings";
		$this->template->content = View::forge('dailytaking/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('dailytaking');

		$data['dailytaking'] = Model_Dailytaking::find_by_pk($id);

		$this->template->title = "Dailytaking";
		$this->template->content = View::forge('dailytaking/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Dailytaking::validate('create');

			if ($val->run())
			{
				$dailytaking = Model_Dailytaking::forge(array(
					'stockname' => Input::post('stockname'),
					'date' => Input::post('date'),
					'amount' => Input::post('amount'),
					'cashier' => Input::post('cashier'),
					'created_at'=>0,
					'updated_at'=>0
				));

				if ($dailytaking and $dailytaking->save())
				{
					Session::set_flash('success', 'Added dailytaking #'.$dailytaking->id.'.');
					Response::redirect('dailytaking');
				}
				else
				{
					Session::set_flash('error', 'Could not save dailytaking.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Dailytakings";
		$this->template->content = View::forge('dailytaking/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('dailytaking');

		$dailytaking = Model_Dailytaking::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Dailytaking::validate('edit');

			if ($val->run())
			{
				$dailytaking->stockname = Input::post('stockname');
				$dailytaking->date = Input::post('date');
				$dailytaking->amount = Input::post('amount');
				$dailytaking->cashier = Input::post('cashier');

				if ($dailytaking->save())
				{
					Session::set_flash('success', 'Updated dailytaking #'.$id);
					Response::redirect('dailytaking');
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

		$this->template->set_global('dailytaking', $dailytaking, false);
		$this->template->title = "Dailytakings";
		$this->template->content = View::forge('dailytaking/edit');

	}

	public function action_delete($id = null)
	{
		if ($dailytaking = Model_Dailytaking::find_one_by_id($id))
		{
			$dailytaking->delete();

			Session::set_flash('success', 'Deleted dailytaking #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete dailytaking #'.$id);
		}

		Response::redirect('dailytaking');

	}

}
