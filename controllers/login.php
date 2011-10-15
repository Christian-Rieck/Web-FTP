<?php

class Controller_Login extends Controller {

	public function make() {
	
		$header = new View('header');
		$login  = new View('login');
		$footer = new View('footer');
		
		// Header festlegen
		$header -> assign('headerTitle', "Web-FTP :: Login");
		$header -> assign('stylesheet', "login.css");
		$header -> assign('javascript', "login.js");
		
		// Laden der gewünschten Form
		if(file_exists(CONTROLLERS . "loginForm.php"))
		{
			require_once(CONTROLLERS . "loginForm.php");
			
			if(class_exists("Controller_LoginForm"))
			{
				$loginForm = new Controller_LoginForm($this -> request);
			}
		}
		
		$login -> assign ('formBox', $loginForm -> load());
		
		// Festlegen des aktiven Tabreiters
		if(
			(isset($this -> request['form']) && $this -> request['form'] == "user") 
			|| isset($this -> request['submit_user']))
		{
			$login -> assign('activeUser', " active");
			$login -> assign('activeFtp', "");
			$login -> assign('activeRegister', "");
		}
		else if(
			(isset($this -> request['form']) && $this -> request['form'] == "register") 
			|| isset($this -> request['submit_register']))
		{
			$login -> assign('activeRegister', " active");
			$login -> assign('activeFtp', "");
			$login -> assign('activeUser', "");
		}
		else if(
			!isset($this -> request['form']) 
			|| (isset($this -> request['form']) && $this -> request['form'] == "ftp") 
			|| isset($this -> request['submit_ftp']))
		{ 
			$login -> assign('activeFtp', " active");
			$login -> assign('activeUser', "");
			$login -> assign('activeRegister', "");
		}
		
		$this -> layout -> assign('header', $header -> loadTemplate());
		$this -> layout -> assign('login', $login -> loadTemplate());
		$this -> layout -> assign('footer', $footer -> loadTemplate());
		
	}

}

?>