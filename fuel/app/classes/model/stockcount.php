<?php
class Model_Stockcount extends Model_Crud
{
	protected static $_table_name = 'stockcounts';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('from', 'From', 'required');
		$val->add_field('to', 'To', 'required');

		return $val;
	}

}
