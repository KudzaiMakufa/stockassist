<?php
class Controller_Supplie extends Controller_Template
{

	public function action_index()
	{
		$data['supplies'] = Model_Supplie::find_all();
		$this->template->title = "Supplies";
		$this->template->content = View::forge('supplie/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('supplie');

		$data['supplie'] = Model_Supplie::find_by_pk($id);

		$this->template->title = "Supplie";
		$this->template->content = View::forge('supplie/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Supplie::validate('create');

			if ($val->run())
			{
				$supplie = Model_Supplie::forge(array(
					'name' => Input::post('name'),
					'address' => Input::post('address'),
					'phone' => Input::post('phone'),
				));

				if ($supplie and $supplie->save())
				{
					Session::set_flash('success', 'Added supplie #'.$supplie->id.'.');
					Response::redirect('supplie');
				}
				else
				{
					Session::set_flash('error', 'Could not save supplie.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Supplies";
		$this->template->content = View::forge('supplie/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('supplie');

		$supplie = Model_Supplie::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Supplie::validate('edit');

			if ($val->run())
			{
				$supplie->name = Input::post('name');
				$supplie->address = Input::post('address');
				$supplie->phone = Input::post('phone');

				if ($supplie->save())
				{
					Session::set_flash('success', 'Updated supplie #'.$id);
					Response::redirect('supplie');
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

		$this->template->set_global('supplie', $supplie, false);
		$this->template->title = "Supplies";
		$this->template->content = View::forge('supplie/edit');

	}

	public function action_delete($id = null)
	{
		if ($supplie = Model_Supplie::find_one_by_id($id))
		{
			$supplie->delete();

			Session::set_flash('success', 'Deleted supplie #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete supplie #'.$id);
		}

		Response::redirect('supplie');

	}

}
