<?php

class Side {

	private $request = null;
	
	public function __construct($request) {
	
		$this -> request = $request;
		
		// Session allgemein starten
		session_start();
		
		$GLOBALS['dp'] .= "fehlgeschlagen";
	
	}

	public function __destruct() {
		// Testausgabe
		/*
		echo "<br><br>";
		print_r($this -> request);
		echo "<br><br>";
		echo $GLOBALS['dp'];
		*/
	}

}

?>