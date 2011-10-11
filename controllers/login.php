<?php

class Controller_Login extends Controller {

	public function make() {
	
		$header = new View('header');
		$login  = new View('login');
		$footer = new View('footer');
		
		$header -> assign('stylesheet', "login.css");
		$header -> assign('javascript', "login.js");
		
		$this -> layout -> assign('header', $header -> loadTemplate());
		$this -> layout -> assign('login', $login -> loadTemplate());
		$this -> layout -> assign('footer', $footer -> loadTemplate());
		
	}

}

?>