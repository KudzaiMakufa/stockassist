<?php

namespace Fuel\Migrations;

class Create_supplies
{
	public function up()
	{
		\DBUtil::create_table('supplies', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'address' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'phone' => array('null' => false, 'type' => 'double'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('supplies');
	}
}