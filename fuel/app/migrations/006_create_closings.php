<?php

namespace Fuel\Migrations;

class Create_closings
{
	public function up()
	{
		\DBUtil::create_table('closings', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'product_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'quantity' => array('null' => false, 'type' => 'double'),
			'date' => array('null' => false, 'type' => 'date'),
			'stock_id' => array('null' => false, 'type' => 'double'),
			'closeprise' => array('null' => false, 'type' => 'double'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('closings');
	}
}