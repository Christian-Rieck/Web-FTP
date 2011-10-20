<?php

class Controller_UserSettings extends Controller {
	
	public function make() {
		$settings = new View('userSettings');

		$this -> layout -> assign('settings', $settings -> loadTemplate());
	}

}
?>