<?php
class Controller_Product extends Controller_Template
{

	public function action_index()
	{
		$data['products'] = Model_Product::find(array('order_by'=>array('name'=>'asc')));
		$this->template->title = "Products";
		$this->template->content = View::forge('product/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('product');

		$data['product'] = Model_Product::find_by_pk($id);

		$this->template->title = "Product";
		$this->template->content = View::forge('product/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Product::validate('create');

			if ($val->run())
			{
				$product = Model_Product::forge(array(
					'name' => Input::post('name'),
					'price' => Input::post('price'),
					'created_at'=>0,
					'updated_at'=>0
				));
				

				if ($product and $product->save())
				{
					Session::set_flash('success', 'Added product #'.$product->id.'.');
					Response::redirect('product');
				}
				else
				{
					Session::set_flash('error', 'Could not save product.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Products";
		$this->template->content = View::forge('product/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('product');

		$product = Model_Product::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Product::validate('edit');

			if ($val->run())
			{
				$product->name = Input::post('name');
				$product->price = Input::post('price');

				if ($product->save())
				{
					Session::set_flash('success', 'Updated product #'.$id);
					Response::redirect('product');
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

		$this->template->set_global('product', $product, false);
		$this->template->title = "Products";
		$this->template->content = View::forge('product/edit');

	}

	public function action_delete($id = null)
	{
		if ($product = Model_Product::find_one_by_id($id))
		{
			$product->delete();

			Session::set_flash('success', 'Deleted product #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete product #'.$id);
		}

		Response::redirect('product');

	}

}
