<?php
class Model_Purchase extends Model_Crud
{
	protected static $_table_name = 'purchases';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('product_id', 'Product Id', 'required|valid_string[numeric]');
		$val->add_field('quantity', 'Quantity', 'required');
		// $val->add_field('cost', 'Cost', 'required');
		// $val->add_field('supplier', 'Supplier', 'required|max_length[255]');
		$val->add_field('date', 'Date', 'required');
		//$val->add_field('stock_id', 'Stock Id', 'required');

		return $val;
	}

}
