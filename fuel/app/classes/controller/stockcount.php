<?php
class Controller_Stockcount extends Controller_Template
{

	public function action_index()
	{
		$data['stockcounts'] = Model_Stockcount::find(array('order_by'=>array('id'=>'desc')));
		$this->template->title = "Stockcounts";
		$this->template->content = View::forge('stockcount/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('stockcount');

		$data['stockcount'] = Model_Stockcount::find_by_pk($id);

		$this->template->title = "Stockcount";
		$this->template->content = View::forge('stockcount/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Stockcount::validate('create');

			if ($val->run())
			{
				$stockcount = Model_Stockcount::forge(array(
					'from' => Input::post('from'),
					'to' => Input::post('to'),
				));

				if ($stockcount and $stockcount->save())
				{
					Session::set_flash('success', 'Added stockcount #'.$stockcount->id.'.');
					Response::redirect('stockcount');
				}
				else
				{
					Session::set_flash('error', 'Could not save stockcount.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Stockcounts";
		$this->template->content = View::forge('stockcount/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('stockcount');

		$stockcount = Model_Stockcount::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Stockcount::validate('edit');

			if ($val->run())
			{
				$stockcount->from = Input::post('from');
				$stockcount->to = Input::post('to');

				if ($stockcount->save())
				{
					Session::set_flash('success', 'Updated stockcount #'.$id);
					Response::redirect('stockcount');
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

		$this->template->set_global('stockcount', $stockcount, false);
		$this->template->title = "Stockcounts";
		$this->template->content = View::forge('stockcount/edit');

	}

	public function action_delete($id = null)
	{
		if ($stockcount = Model_Stockcount::find_one_by_id($id))
		{
			$stockcount->delete();

			Session::set_flash('success', 'Deleted stockcount #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete stockcount #'.$id);
		}

		Response::redirect('stockcount');

	}

}
