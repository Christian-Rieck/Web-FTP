<?php

class Controller_User extends Controller {
	
	public function init() {
	
		if (!isset($_SESSION['id'])) {
			header("Location: " . ROOT);
			break;
		}
		
	}
	
	public function make() {
		
		$header = new View('header');
		$footer = new View('footer');

		$user = new View('user');
		
		
		if (file_exists(CONTROLLERS . "userOverview.php")) {
			require_once (CONTROLLERS . "userOverview.php");

			if (class_exists("Controller_UserOverview")) {
				$content = new Controller_UserOverview($this -> request);
			}
		}
		
		// Header festlegen
		$header -> assign('headerTitle', LANG_UCP_TITLE);
		$header -> assign('javascript', "ucp.js");
		$header -> assign('stylesheet', "ucp.css");
		
		$user -> assign('content', $content -> load());

		$this -> layout -> assign('header', $header -> loadTemplate());
		$this -> layout -> assign('user', $user -> loadTemplate());
		$this -> layout -> assign('footer', $footer -> loadTemplate());
	}

}
?>