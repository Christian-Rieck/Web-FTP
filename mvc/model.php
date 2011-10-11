<?php
/**
 * Grundstruktur eines Models
 */
class Model {

	// Objekt für Datenbankanbindung
	protected $db = null;

	/**
	 * Konstrukur, initialisiert das Model und übernimmt Datenbank Objekt
	 */
	public function __construct() {
		$this -> db = $GLOBALS["db"];
	}

}
?>