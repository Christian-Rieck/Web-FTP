<?php

class Controller_default extends Controller {

	protected function make() {
	
		if(!isset($_SESSION['ftp']) && !isset($_SESSION['user']))
		{
			if(file_exists(CONTROLLERS . "login.php"))
			{
				require_once(CONTROLLERS . "login.php");
				if(class_exists("Controller_Login"))
				{
					$login = new Controller_Login();
					$this -> assign("content", $login -> load());	
				}
			}
		}
	}

}

?>