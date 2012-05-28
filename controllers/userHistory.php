<?php

class Controller_UserHistory extends Controller {
	
	public function make() {
		$history = new View('userHistory');

		$this -> layout -> assign('history', $history -> loadTemplate());
	}

}
?>