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
		$header -> assign('topMenu', true);
		
		$footer = new View('footer');

		$user = new View('user');
		
		$menus = array(
						"Overview" => 1
						, "History" => 2
						, "Server" => 3
						, "Settings" => 4);
		
		if (isset($this -> request['menu'])) {
			$menuname = $this -> request['menu'];
			$menuname = strtoupper($menuname{0}) . substr($menuname, 1);
		}
		
		if (!$menus[$menuname])
			$menuname = "Overview";
		
		$content = $this -> loadController("User" . $menuname);
		$user -> assign('activeMenu', $menuname);
		
		$user -> assign('triangleTop', ($menus[$menuname] - 1) * 70 + 24);
		
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