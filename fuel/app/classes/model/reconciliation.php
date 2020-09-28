<?php
class Model_Reconciliation extends Model_Crud
{
	protected static $_table_name = 'reconciliations';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('opening', 'Opening', 'required');
		$val->add_field('purchases', 'Purchases', 'required');
		$val->add_field('transfers', 'Transfers', 'required');
		$val->add_field('total', 'Total', 'required');
		$val->add_field('closing', 'Closing', 'required');
		$val->add_field('sales_units', 'Sales Units', 'required');
		$val->add_field('unit_price', 'Unit Price', 'required');
		$val->add_field('total_sales', 'Total Sales', 'required');
		$val->add_field('profit', 'Profit', 'required');

		return $val;
	}

}
