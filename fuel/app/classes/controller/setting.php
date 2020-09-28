<?php

class Controller_Setting extends Controller_Template
{

	public function action_truncate()
	{

		$opening = DB::query("Truncate  table  openings ")->execute();
		$purchases = DB::query("Truncate  table  purchases ")->execute();
		$transfers = DB::query("Truncate  table  transfers ")->execute();
		$closings = DB::query("Truncate  table  closings")->execute();
		$stockcounts = DB::query("Truncate  table  stockcounts ")->execute();
		$reconciliation = DB::query("Truncate  table  reconciliations ")->execute();
		$dailytaking = DB::query("Truncate  table  dailytakings ")->execute();

		if($opening && $purchases && $transfers && $closings && $stockcounts && $reconciliation && $dailytaking){

			Session::set_flash('success','Ready for implementation ');
			Response::redirect('product');
			

		}
		Debug::dump($opening);die;
		$data["subnav"] = array('truncate'=> 'active' );
		$this->template->title = 'Truncate';
		$this->template->content = View::forge('setting/truncate', $data);
	}

}
