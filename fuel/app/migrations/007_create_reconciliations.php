<?php

namespace Fuel\Migrations;

class Create_reconciliations
{
	public function up()
	{
		\DBUtil::create_table('reconciliations', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'opening' => array('null' => false, 'type' => 'double'),
			'purchases' => array('null' => false, 'type' => 'double'),
			'transfers' => array('null' => false, 'type' => 'double'),
			'total' => array('null' => false, 'type' => 'double'),
			'closing' => array('null' => false, 'type' => 'double'),
			'sales_units' => array('null' => false, 'type' => 'double'),
			'unit_price' => array('null' => false, 'type' => 'double'),
			'total_sales' => array('null' => false, 'type' => 'double'),
			'profit' => array('null' => false, 'type' => 'double'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('reconciliations');
	}
}