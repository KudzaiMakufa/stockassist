<?php
class Controller_Opening extends Controller_Template
{

	public function action_index()
	{
		$data['openings'] = Model_Opening::find_all();
		$this->template->title = "Openings";
		$this->template->content = View::forge('opening/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('opening');

		$data['opening'] = Model_Opening::find_by_pk($id);

		$this->template->title = "Opening";
		$this->template->content = View::forge('opening/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Opening::validate('create');

			if ($val->run())
			{
				$opening = Model_Opening::forge(array(
					'product_id' => Input::post('product_id'),
					'quantity' => Input::post('quantity'),
					'date' => Input::post('date'),
					'stock_id' => 0,
					'created_at'=>0,
					'updated_at'=>0
				));

				if ($opening and $opening->save())
				{
					Session::set_flash('success', 'Added opening #'.$opening->id.'.');
					Response::redirect('opening');
				}
				else
				{
					Session::set_flash('error', 'Could not save opening.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Openings";
		$this->template->content = View::forge('opening/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('opening');

		$opening = Model_Opening::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Opening::validate('edit');

			if ($val->run())
			{
				$opening->product_id = Input::post('product_id');
				$opening->quantity = Input::post('quantity');
				$opening->date = Input::post('date');
				$opening->stock_id = Input::post('stock_id');

				if ($opening->save())
				{
					Session::set_flash('success', 'Updated opening #'.$id);
					Response::redirect('opening');
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

		$this->template->set_global('opening', $opening, false);
		$this->template->title = "Openings";
		$this->template->content = View::forge('opening/edit');

	}

	public function action_delete($id = null)
	{
		if ($opening = Model_Opening::find_one_by_id($id))
		{
			$opening->delete();

			Session::set_flash('success', 'Deleted opening #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete opening #'.$id);
		}

		Response::redirect('opening');

	}

}
