<?php
class Model_Product extends Model_Crud
{
	protected static $_table_name = 'products';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('price', 'Price', 'required');

		return $val;
	}

}
