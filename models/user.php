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
				username = '" . $username . "' 
				AND password = '" . $password . "'";
				
		if($result = $this -> db -> query($sql))
			return $this -> db -> num_rows($result) == 1;
		else 
			return false;
	}
}

?>