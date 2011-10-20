<?php

class Controller_UserMenu extends Controller {

	public function make() {
		$menu = $this -> request['menu'];
		$dateiname = strtolower($menu{0}) . substr($menu, 1);	
		$controllername = "Controller_" . strtoupper($menu{0}) . substr($menu, 1);
				
		if (file_exists(CONTROLLERS . $dateiname . ".php")) {
			require_once (CONTROLLERS . $dateiname . ".php");

			if (class_exists($controllername)) {
				$menu = new $controllername($this -> request);
			}
		}
		
		$this -> layout -> assign('content', $menu -> load());
	}

}

?>