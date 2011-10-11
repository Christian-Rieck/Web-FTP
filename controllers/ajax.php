<?php
/**
 * Ajax Anbindung von Subs
 */
class Controller_Ajax extends Controller {

	// Auszugebende Sub
	private $module = '';

	/**
	 * Initialisieren des Controllers
	 */
	protected function init() {
		$this -> module = !empty($this -> request['ajaxmodul']) ? $this -> request['ajaxmodul'] : '';
	}

	/**
	 * Methode zum Erstellen des Contents.
	 */
	public function make() {
		// Laden des richtigen Controllers
		$classname = "Controller_" . $this -> module;
		$file = $this -> module . ".php";
		$file{0} = strtolower($file{0});
		$file = CONTROLLERS . $file;

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