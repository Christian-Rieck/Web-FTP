<?php

class Controller_LoginForm extends Controller {

	public function make() {
	
		if($this -> request['form'] != "register" && !isset($this -> request['submit_register']))
		{				
			if(
				(isset($this -> request['form']) && $this -> request['form'] == "user") 
				|| isset($this -> request['submit_user']))
			{
				$view = new View('loginFormUser');
			}
			else if(
				(isset($this -> request['form']) && $this -> request['form'] == "register") 
				|| isset($this -> request['submit_register']))
			{
				$view = new View('loginFormRegister');
			}
			else if(
				!isset($this -> request['form']) 
				|| (isset($this -> request['form']) && $this -> request['form'] == "ftp") 
				|| isset($this -> request['submit_ftp']))
			{ 
				$view = new View('loginFormFtp');
			}
			
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
				else
					$view -> assign('username', $username);
					
				if(empty($password))
				{
					$fehler = true;
					$view -> assign('passwordEmpty', true);
				}
				else
					$view -> assign('password', $password);
				
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
		}
		else
		{
			$view = new View('loginFormRegister');
			
			// Wenn Registrierung
			if(isset($this -> request['submit_register']))
			{
				$username = $this -> request['username'];
				$password = $this -> request['password'];
				$passwordRepeat = $this -> request['passwordRepeat'];	
				
				$fehler = false;
				$fehlerUser = false;
				
				// Leere Eingabefelder abfangen
				if(empty($username))
				{
					$fehler = $fehlerUser = true;
					$view -> assign('usernameEmpty', true);
				}
				else
				{
					if(strlen($username) < 3)
					{
						$fehler = $fehlerUser = true;
						$view -> assign('usernameToShort', true);
					}
					$view -> assign('username', $username);
				}
				
				if(empty($password))
				{
					$fehler = true;
					$view -> assign('passwordEmpty', true);
				}
				else
				{
					if(strlen($password) < 6)
					{
						$fehler = true;
						$view -> assign('passwordToShort', true);
					}
					$view -> assign('password', $password);
				}
				
				if(empty($passwordRepeat))
				{
					$fehler = true;
					$view -> assign('passwordRepeatEmpty', true);
				}
				else
				{
					if($password != $passwordRepeat)
					{
						$fehler = true;
						$view -> assign('passwordUnequal', true);
					}
					$view -> assign('passwordRepeat', $password);
				}
				
				if(!$fehlerUser)
				{
					if(file_exists(MODELS . "user.php"))
					{
						require_once(MODELS . "user.php");
						
						if(class_exists("Model_User"))
						{
							$user = new Model_User();
		
							if($user -> userExists($username))
							{
								$view -> assign('usernameExists', true);
								$view -> assign('username', $username);
							}
						}
					}
				}
				
				if(!$fehler)
				{
					if($user -> addUser($username, md5($password)))
						$view -> assign('registerSuccess', true);
					else
						$view -> assign('registerSuccess', false);
				}
			}
		}
		
		$this -> layout -> assign('formBox', $view -> loadTemplate());
	
	}

}

?>