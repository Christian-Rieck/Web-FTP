<?php

class Side {

	private $request = null;

	public function __construct($request) {

		$this -> request = $request;
		
		$GLOBALS['dp'] = "Debug: \n";

		// Session allgemein starten
		session_start();
		header('Content-Type: text/html; charset=utf-8');
		date_default_timezone_set('Europe/Berlin');

		if (isset($_COOKIE['language']) && isset($locales[$_COOKIE['language']]))
			$lang = $_COOKIE['language'];
		else {
			$lang = "de_DE";
			setcookie("language", $lang, time() + (3600 * 24 * 365));
		}
		require_once (RESOURCES . "languages/lang_" . $lang . ".php");
	}

	public function __destruct() {
		// Testausgabe
		
		echo "<div style='text-align:left'><pre>";
		var_dump($this -> request);
		echo "</pre></div>";

		echo $GLOBALS['dp'];

	}

}
?>