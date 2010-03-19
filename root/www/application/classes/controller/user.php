<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
* @property ACL $a2
* @property A1 $a1 
* @property Model_User $user
* @property Request $request
*/
class Controller_User extends Controller_Template {
	
	public function before()
	{
		parent::before();
		
		$this->a2 = A2::instance('rp-user');
		$this->a1 = $this->a2->a1;
		$this->user = $this->a2->get_user();
	}	
	
  public function action_index()
  {
    if (empty($user_name)) {
    	echo('kkk');
    }
    else {
    	echo('444');
    }
  }	
  
  public function action_user()
  {
 		if ($this->a2->logged_in())
 			$this->template->content = View::factory('user/logged')->set('user', $this->user);
 		else 
 			$this->request->redirect('auth/login');		
  }
  
  public function action_profile($user_name)
  {
 		$account = ORM::factory('user')
			->where('username','=',$user_name)
			->find(); 
			
  	if ($this->a2->allowed($account, 'view'))
  	{
			$this->template->content = View::factory('user/logged')->set('user', $account);
  	}
  	else 
  	{
 			$this->request->status = 403;
 			$this->template->content = 403;
  	}		
  }	  
 
  public function action_login()
  {
		if ($this->a2->logged_in()) //cannot create new accounts when a user is logged in
		{
			$this->request->redirect('user');
			return false;
		} 
			
		$default_values = array(
			'username' => '',
			'password' => '',
			'remember' => FALSE
		);
		
    $this->template->title = 'User authentication';

    
    //if ($_POST['hidden'] == 'form_sent') 
    //{
    //Security::xss_clean('dsthe');
  //  $v = new Validate($_POST);
//$v->n
//var_dump($_POST);
    if (isset($_POST['form_sent']) && $_POST['form_sent'] == 'form_sent')
    {
    	$_POST['remember'] = isset($_POST['remember']) ? (bool) $_POST['remember'] : FALSE;
			if ($this->a1->login($_POST['username'], $_POST['password'], $_POST['remember']))
			{
				$this->request->redirect('user');
			}
			else
			{
				/**
				 * @todo Вернуть ошибку пользователю о неправильном логине
				 */
				//Kohana::message('username')
				$this->user->error('username', 'user_pass');
			}

			$this->template->messages = View::factory('user/status_messages')->set('messages', $this->user->errors('user'))->set('type', 'error');
			$this->template->content = View::factory('user/login', array_merge($default_values, $_POST));
    }
		else
		{
			$this->template->content = View::factory('user/login', $default_values);
		} 
  }
  
  public function action_register()
  {
  	$default_values = array(
			'username' => '',
			'password' => '',
			'password_confirm' => ''			
  	);
  	
  	if ($this->a1->logged_in()) //cannot create new accounts when a user is logged in
			$this->request->redirect('user');

			
		$post = $_POST;

		// Create a new user
		$user = ORM::factory('user')->values($post);

		if ($user->check())
		{
			$user->save();
			$this->request->redirect('auth/login');
		}
		else
		{
			$this->template->content = View::factory('user/register', array_merge($default_values, $post));
			//show form
			//$this->template->content = View::factory('user/login', $default_values);

			echo Kohana::debug($user->validate()->errors());
		}
  }
  
	public function action_logout()
	{
		$this->a1->logout();
		$this->user = NULL;
		return $this->action_index();
	}  
 
  public function action_list()
  {
    $query = DB::query(Database::SELECT, 'select current_date() as date');
    $row = $query->execute()->current();
    echo $row['date'];
  }	
 
} // Конец контроллера