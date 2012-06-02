<?php

class Controller_LoginForm extends Controller {

	public function make() {

		if ($this -> request['form'] != "register" && !isset($this -> request['submit_register'])) {
			if ((isset($this -> request['form']) && $this -> request['form'] == "loginTabUser") || isset($this -> request['submit_user'])) {
				$view = new View('loginFormUser');
			} else if ((isset($this -> request['form']) && $this -> request['form'] == "loginTabRegister") || isset($this -> request['submit_register'])) {
				$view = new View('loginFormRegister');
			} else if (!isset($this -> request['form']) || (isset($this -> request['form']) && $this -> request['form'] == "loginTabFtp") || isset($this -> request['submit_ftp'])) {
				$view = new View('loginFormFtp');
			}

			// Wenn User Login
			if (isset($this -> request['submit_user'])) {
				$username = $this -> request['username'];
				$password = $this -> request['password'];

				$fehler = false;

				if (empty($username)) {
					$fehler = true;
					$view -> assign('usernameEmpty', true);
				} else
					$view -> assign('username', $username);

				if (empty($password)) {
					$fehler = true;
					$view -> assign('passwordEmpty', true);
				} else
					$view -> assign('password', $password);

				if (!$fehler) {
					if (file_exists(MODELS . "user.php")) {
						require_once (MODELS . "user.php");

						if (class_exists("Model_User")) {
							$user = new Model_User();

							if ($user -> checkLogin($username, md5($password)) && $user -> login($username))
								header("Location: " . ROOT . "User");
							else
								$view -> assign('loginFailed', true);
						}
					}
				}
			} else if (isset($this -> request['submit_ftp'])) {
				$domain = $this -> request['domain'];
				$this -> request['port'] == 0 ? $port = 21 : $port = $this -> request['port'];
				$username = $this -> request['username'];
				$password = $this -> request['password'];

				$fehler = false;

				if (empty($domain)) {
					$fehler = true;
					$view -> assign('domainEmpty', true);
				} else
					$view -> assign('domain', $domain);
					
				if (!preg_match('/^([a-zA-Z]{2,5}:\/\/)?(www\.)?([a-zA-Z0-9]{3,65})(\.[a-zA-Z]{2,4})$/', $domain)) {
    				$fehler = true;
    				$view -> assign('badDomain', true);
					$view -> assign('domain', $domain);
				} else
				    $view -> assign('domain', $domain);

				if ($port < 1 || $port > 65535) {
					$fehler = true;
					$view -> assign('badPort', true);
					$view -> assign('port', $port);
				} else
					$view -> assign('port', $port);
					
				if (empty($username)) {
					$fehler = true;
					$view -> assign('usernameEmpty', true);
				} else
					$view -> assign('username', $username);
					
				if (empty($password)) {
					$fehler = true;
					$view -> assign('passwordEmpty', true);
				} else
					$view -> assign('password', $password);

				if (!$fehler) {
					//echo "fehlerfrei";
				}
			}
		} else {
			$view = new View('loginFormRegister');

			// Wenn Registrierung
			if (isset($this -> request['submit_register'])) {
				$username = $this -> request['username'];
				$password = $this -> request['password'];
				$passwordRepeat = $this -> request['passwordRepeat'];

				$fehler = false;
				$fehlerUser = false;

				// Leeren Benutzernamen abfangen
				if (empty($username)) {
					$fehler = $fehlerUser = true;
					$view -> assign('usernameEmpty', true);
				} else {
					// Zu kurzen Benutzernamen abfangen
					if (strlen($username) < 3) {
						$fehler = $fehlerUser = true;
						$view -> assign('usernameToShort', true);
					}
					$view -> assign('username', $username);
				}

				if (empty($password)) {
					$fehler = true;
					$view -> assign('passwordEmpty', true);
				} else {
					if (strlen($password) < 6) {
						$fehler = true;
						$view -> assign('passwordToShort', true);
					}
					$view -> assign('password', $password);
				}

				if (empty($passwordRepeat)) {
					$fehler = true;
					$view -> assign('passwordRepeatEmpty', true);
				} else {
					if ($password != $passwordRepeat) {
						$fehler = true;
						$view -> assign('passwordUnequal', true);
					}
					$view -> assign('passwordRepeat', $password);
				}

				if (!$fehlerUser) {
					if (file_exists(MODELS . "user.php")) {
						require_once (MODELS . "user.php");

						if (class_exists("Model_User")) {
							$user = new Model_User();

							if ($user -> userExists($username)) {
								$view -> assign('usernameExists', true);
								$view -> assign('username', $username);
							}
						}
					}
				}

				if (!$fehler) {
					if ($user -> addUser($username, md5($password)))
						$view -> assign('registerSuccess', true);
					else
						$view -> assign('registerSuccess', false);
				}
			}
		}

		$this -> layout -> assign('formBox', $view -> loadTemplate());

	}

}
?>