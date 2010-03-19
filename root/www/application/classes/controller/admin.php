<?php
class Controller_Admin extends Controller
{
	protected $auth;
	protected $user;
    
	public function before() {
		parent::before();
   
		$this->auth = A1::instance();       
		$this->user = $this->auth->get_user();
	}

	public function action_index()
	{
		$query = DB::query(Database::SELECT, 'select current_date() as date');
		$row = $query->execute()->current();
		echo $row['date'];
	}    
}
