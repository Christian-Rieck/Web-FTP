<?php

class Controller_UserServer extends Controller {
	
	public function make() {
		$server = new View('userServer');

		$this -> layout -> assign('server', $server -> loadTemplate());
	}

}
?>