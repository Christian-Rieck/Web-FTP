<?php

class Controller_UserMenu extends Controller {

	public function make() {				
		$menu = $this -> loadController($this -> request['menu']);
		$this -> layout -> assign('content', $menu -> load());
	}

}

?>