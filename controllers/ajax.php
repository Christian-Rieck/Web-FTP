<?php
/**
 * Ajax Anbindung von Subs
 */
class Controller_Ajax extends Controller {

	// Auszugebende Sub
	private $modul = '';

	/**
	 * Initialisieren des Controllers
	 */
	protected function init() {
		$this -> modul = !empty($this -> request['ajaxmodul']) ? $this -> request['ajaxmodul'] : '';
	}

	/**
	 * Methode zum Erstellen des Contents.
	 */
	public function make() {
		// Laden des richtigen Controllers
		$classname = "Controller_" . $this -> modul;
		$file = CONTROLLERS . $this -> modul . ".php";

		if(file_exists($file)) {
			require_once ($file);

			if(class_exists($classname, false)) {
				$ajax = new $classname($this -> request);

				// Inhalt der Webanwendung ausgeben.
				$this -> layout -> assign('content', $ajax -> load());
			} else
				$this -> layout -> assign('content', "Ajax Controller nicht gefunden.");
		} else
			$this -> layout -> assign('content', "Datei \"" . $file . "\" nicht vorhanden.");
	}

}
?>