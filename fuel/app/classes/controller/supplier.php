<?php
class Controller_Supplier extends Controller_Template
{

	public function action_index()
	{
		$data['suppliers'] = Model_Supplier::find_all();
		$this->template->title = "Suppliers";
		$this->template->content = View::forge('supplier/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('supplier');

		$data['supplier'] = Model_Supplier::find_by_pk($id);

		$this->template->title = "Supplier";
		$this->template->content = View::forge('supplier/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Supplier::validate('create');

			if ($val->run())
			{
				$supplier = Model_Supplier::forge(array(
					'name' => Input::post('name'),
					'address' => Input::post('address'),
					'phone' => Input::post('phone'),
					'created_at'=>0,
					'updated_at'=>0
				));

				if ($supplier and $supplier->save())
				{
					Session::set_flash('success', 'Added supplier #'.$supplier->id.'.');
					Response::redirect('supplier');
				}
				else
				{
					Session::set_flash('error', 'Could not save supplier.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Suppliers";
		$this->template->content = View::forge('supplier/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('supplier');

		$supplier = Model_Supplier::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Supplier::validate('edit');

			if ($val->run())
			{
				$supplier->name = Input::post('name');
				$supplier->address = Input::post('address');
				$supplier->phone = Input::post('phone');

				if ($supplier->save())
				{
					Session::set_flash('success', 'Updated supplier #'.$id);
					Response::redirect('supplier');
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

		$this->template->set_global('supplier', $supplier, false);
		$this->template->title = "Suppliers";
		$this->template->content = View::forge('supplier/edit');

	}

	public function action_delete($id = null)
	{
		if ($supplier = Model_Supplier::find_one_by_id($id))
		{
			$supplier->delete();

			Session::set_flash('success', 'Deleted supplier #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete supplier #'.$id);
		}

		Response::redirect('supplier');

	}

}
