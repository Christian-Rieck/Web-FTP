<?php
include (INCLUDES . "mysql.php");
include (MVC . "view.php");
include (MVC . "controller.php");
include (MVC . "model.php");

/**
 * Hauptcontroller zum laden des gewünschten Controllers
 */
class MainController {

	// Übergebene Daten
	private $request = null;
	// Zu ladender Controller
	private $module = '';

	/**
	 * Konstruktor, erstellet den Controller.
	 *
	 * @param Array $request Array aus $_GET & $_POST.
	 */
	public function __construct() {
		$this -> request = array_merge($_GET, $_POST);
		$this -> module = !empty($this -> request['module']) ? $this -> request['module'] : 'default';

		echo $this -> display();
	}

	/**
	 * Methode zum ausführen der Action wenn nötig
	 *
	 * @param Controller $controller Zielcontroller
	 */
	private function runAction($controller) {
		foreach($this->request as $key => $value) {
			if(strpos($key, "action_") >= 0 && method_exists($controller, $key))
				$controller -> $key();
		}
	}

	/**
	 * Methode zum anzeigen des Contents.
	 *
	 * @return String Content der Applikation.
	 */
	public function display() {
		// Laden des richtigen Controllers
		$classname = "Controller_" . $this -> module;
		$file = CONTROLLERS . $this -> module . ".php";

		if(file_exists($file)) {
			require_once ($file);

			if(class_exists($classname, false)) {
				$controller = new $classname($this -> request);

				// Ausführen der Aktion
				$this -> runAction($controller);

				// Inhalt der Webanwendung ausgeben.
				return $controller -> load();
			} else
				return "Modul nicht gefunden.";
		} else
			return "Datei \"" . $file . "\" nicht vorhanden.";
	}

}
?>