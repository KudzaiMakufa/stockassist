<?php
class Model_Dailytaking extends Model_Crud
{
	protected static $_table_name = 'dailytakings';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('stockname', 'Stockname', 'required|max_length[255]');
		$val->add_field('date', 'Date', 'required');
		$val->add_field('amount', 'Amount', 'required');
		$val->add_field('cashier', 'Cashier', 'required|max_length[255]');

		return $val;
	}

}
