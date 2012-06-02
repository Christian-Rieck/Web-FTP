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
			
		$user = new View('user');
			
		$user -> assign('activeMenu', $menuname);
		
		$user -> assign('triangleTop', ($menus[$menuname] - 1) * 70 + 24);
		
		// Header festlegen
		$header -> assign('headerTitle', LANG_UCP_TITLE);
		$header -> assign('javascript', "ucp.js");
		$header -> assign('stylesheet', "ucp.css");
		
		$topMenus = array(
				"ucp" => array(
						"text" => "UCP"
						, "bold" => true
						, "content" => array(
								"about" => array(
										"text" => "<a href=\"#\">About UCP</a>"
										, "content" => null
									)
								, "-" => null
								, "logout" => array(
										"text" => "<a href=\"Logout\">Logout</a>"
										, "content" => ""
									)
							)
					)
				, "help" => array(	
						"text" => "Hilfe"
						, "content" => array(
								"showhelp" => array(
										"text" => "<a href=\"#\">Hilfethemen anzeigen</a>"
										, "content" => null
									)
							)
					)
					
					
					
				/*, "connections" => array(
						"Verbindung"
						, array(
								"Neue Verbindung" => null
								, "-" => null
								, "Verbindungen..." => array(
									"Verbindung 1" => null
									, "Verbindung 2" => null
								)
						)
					)
				, "help" => array(	
					"Hilfe"
					, array(
						"Hilfethemen anzeigen" => null
					)
				)*/
			);
			
		$header -> assign("topMenus", $topMenus);

		$footer = new View('footer');
		
		$content = $this -> loadController("User" . $menuname);		
		$user -> assign('content', $content -> load());

		$this -> layout -> assign('header', $header -> loadTemplate());
		$this -> layout -> assign('user', $user -> loadTemplate());
		$this -> layout -> assign('footer', $footer -> loadTemplate());
	}

}
?>