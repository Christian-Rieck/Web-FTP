<?php

class Controller_User extends Controller {

	public function make() {

		$header = new View('header');
		$footer = new View('footer');

		if (!isset($_SESSION['id'])) {
			$user = new View('userFailed');
			$header -> assign('headerTitle', "Web-FTP :: Bitte einloggen!");
		} else {
			$user = new View('user');

			// Header festlegen
			$header -> assign('headerTitle', "Web-FTP :: User Control Panel");
			$header -> assign('javascript', "ucp.js");
		}

		$header -> assign('stylesheet', "ucp.css");

		$this -> layout -> assign('header', $header -> loadTemplate());
		$this -> layout -> assign('user', $user -> loadTemplate());
		$this -> layout -> assign('footer', $footer -> loadTemplate());
	}

}
?>