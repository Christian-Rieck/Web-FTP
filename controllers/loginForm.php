<?php

class Controller_LoginForm extends Controller {

	public function make() {
		
		if((isset($this -> request['form']) && $this -> request['form'] == "user") || isset($this -> request['submit_user']))
			$view = new View('loginFormUser');	
		else if(!isset($this -> request['form']) || (isset($this -> request['form']) && $this -> request['form'] == "ftp") || isset($this -> request['submit_ftp']))
			$view = new View('loginFormFtp');	
		
		// Wenn User Login
		if(isset($this -> request['submit_user']))
		{
			$username = $this -> request['username'];
			$password = $this -> request['password'];	
			
			$fehler = false;	
			
			if(empty($username))
			{
				$fehler = true;
				$view -> assign('usernameEmpty', true);
			}
			if(empty($password))
			{
				$fehler = true;
				$view -> assign('passwordEmpty', true);
			}
			
			if(!$fehler)
			{
				if(file_exists(MODELS . "user.php"))
				{
					require_once(MODELS . "user.php");
					
					if(class_exists("Model_User"))
					{
						$user = new Model_User();
						
						if($user -> checkLogin($username, md5($password)))
						{}
						else
						{
							$view -> assign('loginFailed', true);
						}
					}
				}
			}
		}
		
		$this -> layout -> assign('formBox', $view -> loadTemplate());
	
	}

}

?>