<?php
class Model_Closing extends Model_Crud
{
	protected static $_table_name = 'closings';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('product_id', 'Product Id', 'required|valid_string[numeric]');
		$val->add_field('quantity', 'Quantity', 'required');
		$val->add_field('date', 'Date', 'required');
		//$val->add_field('stock_id', 'Stock Id', 'required');
		$val->add_field('closeprise', 'Closeprise', 'required');

		return $val;
	}

}
