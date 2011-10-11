<?php

class Controller_LoginForm extends Controller {

	public function make() {
	
		if(!isset($this -> request['form']) || $this -> request['form'] == "ftp")
			$view = new View('loginFormFtp');
		else
			$view = new View('loginFormUser');
			
		$this -> layout -> assign('formBox', $view -> loadTemplate());
	
	}

}

?>