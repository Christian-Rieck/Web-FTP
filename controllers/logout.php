<?php

class Controller_Logout extends Controller {

	public function make() {
		
		if (isset($_SESSION['id']) || isset($_SESSION['domain'])) {
    		session_destroy();
		}
		header("Location: " . ROOT . "Login");
	}

}
?>