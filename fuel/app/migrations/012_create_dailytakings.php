<?php

namespace Fuel\Migrations;

class Create_dailytakings
{
	public function up()
	{
		\DBUtil::create_table('dailytakings', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'stockname' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'date' => array('null' => false, 'type' => 'date'),
			'amount' => array('null' => false, 'type' => 'double'),
			'cashier' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('dailytakings');
	}
}