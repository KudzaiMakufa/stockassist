<?php

namespace Fuel\Migrations;

class Create_stockcounts
{
	public function up()
	{
		\DBUtil::create_table('stockcounts', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'from' => array('null' => false, 'type' => 'date'),
			'to' => array('null' => false, 'type' => 'date'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stockcounts');
	}
}