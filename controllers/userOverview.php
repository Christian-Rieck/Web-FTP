<?php

class Controller_UserOverview extends Controller {
	
	public function make() {
		$overview = new View('userOverview');

		$this -> layout -> assign('overview', $overview -> loadTemplate());
	}

}
?>