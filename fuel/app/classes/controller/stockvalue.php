<?php

class Controller_Stockvalue extends Controller_Template
{

	public function action_index()
	{
			$data["stockval"] = [];
			$sql = "select product_id , quantity from openings where  stock_id = 0 ";
			$query = DB::query($sql)->execute()->as_array();
			$data["stocks"] = $query;
			// Debug::dump($query[0]) ; die ;
			$sql = "select SUM(quantity) as rcrds from openings where stock_id = 0 ";
			$query = DB::query($sql)->execute()->as_array();
			if(is_null($query))
			{

			}
			else
			{
				$data["stockval"] = doubleval($query[0]['rcrds']) ;
			}
			


		
		$this->template->title = 'Stock Value';
		$this->template->content = View::forge('stockvalue/index', $data);
	}

}
