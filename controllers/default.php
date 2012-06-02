<?php

class Controller_default extends Controller {

	protected function make() {

		if (isset($_SESSION['id'])) {
			header("Location: " . ROOT . "User");
			break;
		}
		if (isset($_SESSION['domain'])) {
			header("Location: " . ROOT . "Ftp");
			break;
		}
		
		if (!isset($_SESSION['ftp']) && !isset($_SESSION['user'])) {
			$login = $this -> loadController("Login");
			$this -> layout -> assign("content", $login -> load());
		}
	}

}
?>