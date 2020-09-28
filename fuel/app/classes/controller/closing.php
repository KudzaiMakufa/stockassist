<?php
class Controller_Closing extends Controller_Template
{

	public function action_index()
	{
		$data['closings'] = Model_Closing::find_all();
		$this->template->title = "Closings";
		$this->template->content = View::forge('closing/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('closing');

		$data['closing'] = Model_Closing::find_by_pk($id);

		$this->template->title = "Closing";
		$this->template->content = View::forge('closing/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Closing::validate('create');

			if ($val->run())
			{
				$closing = Model_Closing::forge(array(
					'product_id' => Input::post('product_id'),
					'quantity' => Input::post('quantity'),
					'date' => Input::post('date'),
					'stock_id' => 0,
					'closeprise' => Input::post('closeprise'),
					'created_at'=>0,
					'updated_at'=>0
				));

				if ($closing and $closing->save())
				{
					Session::set_flash('success', 'Added closing #'.$closing->id.'.');
					Response::redirect('closing');
				}
				else
				{
					Session::set_flash('error', 'Could not save closing.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Closings";
		$this->template->content = View::forge('closing/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('closing');

		$closing = Model_Closing::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Closing::validate('edit');

			if ($val->run())
			{
				$closing->product_id = Input::post('product_id');
				$closing->quantity = Input::post('quantity');
				$closing->date = Input::post('date');
				$closing->stock_id = Input::post('stock_id');
				$closing->closeprise = Input::post('closeprise');

				if ($closing->save())
				{
					Session::set_flash('success', 'Updated closing #'.$id);
					Response::redirect('closing');
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

		$this->template->set_global('closing', $closing, false);
		$this->template->title = "Closings";
		$this->template->content = View::forge('closing/edit');

	}

	public function action_delete($id = null)
	{
		if ($closing = Model_Closing::find_one_by_id($id))
		{
			$closing->delete();

			Session::set_flash('success', 'Deleted closing #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete closing #'.$id);
		}

		Response::redirect('closing');

	}

}
