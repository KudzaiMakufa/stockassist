<?php

namespace Fuel\Migrations;

class Create_purchases
{
	public function up()
	{
		\DBUtil::create_table('purchases', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'product_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'quantity' => array('null' => false, 'type' => 'double'),
			'cost' => array('null' => false, 'type' => 'double'),
			'supplier' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'date' => array('null' => false, 'type' => 'date'),
			'stock_id' => array('null' => false, 'type' => 'double'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('purchases');
	}
}