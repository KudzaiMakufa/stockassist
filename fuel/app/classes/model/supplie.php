<?php
class Model_Supplie extends Model_Crud
{
	protected static $_table_name = 'supplies';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('address', 'Address', 'required|max_length[255]');
		$val->add_field('phone', 'Phone', 'required');

		return $val;
	}

}
