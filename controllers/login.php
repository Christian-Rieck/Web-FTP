<?php

class Controller_Login extends Controller {

	public function make() {
	
		$header = new View('header');
		$login  = new View('login');
		$footer = new View('footer');
		
		$header -> assign('stylesheet', "login.css");
		$header -> assign('javascript', "login.js");
		
		if(file_exists(CONTROLLERS . "loginForm.php"))
		{
			require_once(CONTROLLERS . "loginForm.php");
			
			if(class_exists("Controller_LoginForm"))
			{
				$loginForm = new Controller_LoginForm($this -> request);
			}
		}
		
		$login -> assign ('formBox', $loginForm -> load());
		
		$this -> layout -> assign('header', $header -> loadTemplate());
		$this -> layout -> assign('login', $login -> loadTemplate());
		$this -> layout -> assign('footer', $footer -> loadTemplate());
		
	}

}

?>