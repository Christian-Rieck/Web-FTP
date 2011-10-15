<?php
/**
 * Schnittstelle zur Datenbank
 */
class DB {

	// Objekt für Datenbankzugriff
	private $mysqli = null;

	/**
	 * Aufbauen und Testen der Verbindung
	 */
	public function __construct() {
		$this -> mysqli = new mysqli(SQL_SERVER, SQL_USER, SQL_PASSWORD, SQL_DATABASE);

		/* check connection */
		if($this -> mysqli -> connect_errno) {
			printf("Connect failed: %s\n", $this -> mysqli -> connect_error);
			exit();
		}
	}

	/**
	 * Schließen der Verbindung
	 */
	public function __destruct() {
		$this -> mysqli -> close();
	}

	/**
	 * Ausführen einer Abfrage
	 *
	 * @param String $string Auszuführender SQL-String
	 * @return Array Result der Abfrage
	 */
	public function query($string) {
		if($result = $this -> mysqli -> query($string))
			return $result;
		else
			return null;
	}

	/**
	 * Result in Array umwandeln
	 *
	 * @param Array $result Ergebnis der Abfrage
	 * @return Array Array welches die Daten enthält
	 */
	public function fetch_all($result) {
		$out = array();

		while($row = $result -> fetch_assoc())
			$out[] = $row;

		return $out;
	}
	
	/**
	 * Datensätze zählen
	 *
	 * @param Array $result Ergebnis der Abfrage
	 * @return Int Anzahl der Datensätze
	 */
	public function num_rows($result) {
		return $result -> num_rows;
	}
	
	/**
	 * Variable escapen
	 *
	 * @param String $var Variable zum Escapen
	 * @return String Escapte Variable
	 */
	public function escape($var) {
		return $this -> mysqli -> real_escape_string($var);
	}

}

// Globale Instanz erzeugen
$GLOBALS["db"] = new DB();
?>