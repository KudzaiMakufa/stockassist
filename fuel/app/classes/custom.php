<?php


class Custom
{

	public static function getProductName($id)
	{
		//Debug::dump($userid);die;


		$user = DB::query("SELECT * FROM products where id = '".$id."' ")->execute()->as_array();
		// Debug::dump($user[0]['usertype']);die;
		// $fullname = unserialize($user[0]->profile_fields);
		
		// $object = json_decode(json_encode($fullname), FALSE);
		
		
	

		return $user[0]['name'] ;
		
	}
	public static function getStockTakeName($id)
	{
		//Debug::dump($userid);die;


		$user = DB::query("SELECT * FROM stockcounts where id = '".$id."' ")->execute()->as_array();
		// Debug::dump($user);die;

		if(empty($user)){

		}else{

			return $user[0]['from'].' to '.$user[0]['to'] ;
		}
		
		
	

		
	}
	
	public static function getProductSellingPrice($id , $stock_id)
	{
		//Debug::dump($userid);die;


		$user = DB::query("SELECT * FROM closings where product_id = '".$id."' and stock_id = '".$stock_id."' ")->execute()->as_array();
		
		
		
	

		return $user[0]['closeprise'] ;
		
	}
	public static function getClosingClostPrice($id)
	{
		$user = DB::query("SELECT * FROM closings where product_id = '".$id."'  ")->execute()->as_array();
		
		
		
	

		return $user[0]['closeprise'] ;
		
	}
	public static function getProductCostPrice($id)
	{
		//Debug::dump($userid);die;


		$user = DB::query("SELECT * FROM products where id = '".$id."' ")->execute()->as_array();
		
		
		
	

		return doubleval($user[0]['price'])*0.80;
		
	}
	
	public static function getusername($userid)
	{
		//Debug::dump($userid);die;


		$user = DB::query("SELECT * FROM users where id = '".$userid."' ")->execute()->as_array();

		Debug::dump(unserialize($user[0]['profile_fields']));die;
		$fullname = unserialize($user[0]->profile_fields)['fullname'];
		
		Debug::dump($user[0]);die;
	

		return $user[0]['usertype'] ;
		
	}

	public static function getnatid($userid)
	{
		//Debug::dump($userid);die;


		$user = DB::query("SELECT * FROM users where id = '".$userid."' ")->execute()->as_array();


		
		//Debug::dump($user[0]);die;
	

		return $user[0]['username'] ;
		
	}
	public static function getuserid()
	{
	
		 list(, $userid) = Auth::get_user_id(); 
		 
		if($userid == 0){
			Session::set_flash('error','you must login in first');
			Response::redirect('login/login') ;
		}

		return $userid; 
		
	}
	

	
	public static function getusertype($userid)
	{
		if($userid == 0){
			Session::set_flash('error','you must login in first');
			Response::redirect('login/login') ;
		 }
		$user = DB::query("SELECT * FROM usertypes where userid = '".$userid."' ")->as_object()->execute();
		$usertype = $user[0]->type;
		
	
		//Debug::dump($username);die;
		return $usertype;
	}
	
	public static function getlecturers(){
		$school = Model_Usertype::find(array('where'=>array('type'=>'lecturer')));
					
		// $school = DB::query("SELECT * FROM usertypes where 'type' = 'lecturer' ")->as_object()->execute();
		$arr=array('0'=>'--Please Select Supervisor--');
		

		foreach ($school as $item) {
			$user = DB::query("SELECT * FROM users where id = '".$item->userid."' ")->as_object()->execute();
			$fullname = unserialize($user[0]->profile_fields)['firstname'].' '.unserialize($user[0]->profile_fields)['lastname'];
			
			$arr[$fullname] = $fullname;
		}
		return $arr ;
	}
	public static function getstudentfullname(){
		$school = Model_Usertype::find(array('where'=>array('type'=>'student')));
					
		// $school = DB::query("SELECT * FROM usertypes where 'type' = 'lecturer' ")->as_object()->execute();
		$arr=array('0'=>'--Please Select Student --');
		

		foreach ($school as $item) {
			$user = DB::query("SELECT * FROM users where id = '".$item->userid."' ")->as_object()->execute();
			$fullname = unserialize($user[0]->profile_fields)['firstname'].' '.unserialize($user[0]->profile_fields)['lastname'].' '.$user[0]->username;
			
			$arr[$fullname] = $fullname;
		}
		return $arr ;
	}

}
