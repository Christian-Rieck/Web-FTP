<?php
/**
 * Model - User
 */
class Model_User extends Model {

	/**
	 * Prüft ob die Benutzerdaten korrekt sind
	 *
	 * @param string $username Eingegebener Benutzername
	 * @param string $password MD5 des eingegebenen Passwords
	 *
	 * @return Bool Daten sind korrekt ja / nein
	 */
	public function checkLogin($username, $password) {
		$sql = "
			SELECT
				*
			FROM
				users
			WHERE
				username = '" . $this -> db -> escape ($username) . "' 
				AND password = '" . $password . "'";
		
		return ($result = $this -> db -> query($sql)) && $this -> db -> num_rows($result) == 1;
	}
	
	/**
	 * Prüfen ob ein bestimmter Benutzername existiert
	 *
	 * @param string $username Zu prüfenden Benutzername
	 *
	 * @return Bool Benutzer existiert
	 */
	public function userExists($username) {
		$sql = "
			SELECT
				username
			FROM
				users
			WHERE
				username = '" . $this -> db -> escape ($username) . "'";
		
		return ($result = $this -> db -> query($sql)) && $this -> db -> num_rows($result) > 0;
	}
	
	/**
	 * Anlegen eines neuen Users
	 *
	 * @param string $username Neuer Benutzername
	 * @param string $password Zugehöriges Passwort als MD5
	 *
	 * @return Bool Erfolgreich eingetragen
	 */
	public function addUser($username, $password) {
		$sql = "
			INSERT INTO
				users
			VALUES (
				''
				, '" . $this -> db -> escape ($username) . "'
				, '" . $this -> db -> escape ($password) . "'
				)";
		
		return ($result = $this -> db -> query($sql));
	}

}

?>