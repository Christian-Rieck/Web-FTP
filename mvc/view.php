<?php
/**
 * Schnittstelle zu Templates und Layouts
 */
class View {

	// Name des Templates, in dem Fall das Standardtemplate.
	private $template = 'default';
	// Einzubettende Variablen
	private $_ = array();

	/**
	 * Ordnet eine Variable einem bestimmten Schl&uuml;ssel zu.
	 *
	 * @param String $template Template
	 */
	public function __construct($template = 'default', $layout = false) {
		if($layout)
			$this -> setLayout($template);
		else
			$this -> setTemplate($template);
	}

	/**
	 * Ordnet eine Variable einem bestimmten Schl&uuml;ssel zu.
	 *
	 * @param String $key Schlüssel
	 * @param String $value Variable
	 */
	public function assign($key, $value) {
		$this -> _[$key] = $value;
	}

	/**
	 * Setzt den Namen des Templates.
	 *
	 * @param String $template Name des Templates.
	 */
	public function setTemplate($template = 'default') {
		$this -> template = $template;
	}

	/**
	 * Setzt den Namen des Layouts.
	 *
	 * @param String $layout Name des Layouts.
	 */
	public function setLayout($layout = 'default') {
		$this -> template = $layout;
	}

	/**
	 * Das Template-File laden und zurückgeben
	 *
	 * @param string $tpl Der Name des Template-Files (falls es nicht vorher
	 *                      über steTemplate() zugewiesen wurde).
	 * @return string Der Output des Templates.
	 */
	public function loadTemplate() {
		$tpl = $this -> template;
		// Pfad zum Template erstellen & überprüfen ob das Template existiert.
		$file = TEMPLATES . $tpl . '.php';
		$exists = file_exists($file);

		if($exists) {
			// Der Output des Scripts wird n einen Buffer gespeichert, d.h.
			// nicht gleich ausgegeben.
			ob_start();

			// Das Template-File wird eingebunden und dessen Ausgabe in
			// $output gespeichert.
			include $file;
			$output = ob_get_contents();
			ob_end_clean();

			// Output zurückgeben.
			return $output;
		} else {
			// Template-File existiert nicht-> Fehlermeldung.
			return 'could not find template';
		}
	}

	/**
	 * Das Layout-File laden und zurückgeben
	 *
	 * @param string $tpl Der Name des Layout-Files (falls es nicht vorher
	 *                      über steTemplate() zugewiesen wurde).
	 * @return string Der Output des Templates.
	 */
	public function loadLayout() {
		$tpl = $this -> template;
		// Pfad zum Template erstellen & überprüfen ob das Template existiert.
		$file = LAYOUTS . $tpl . '.php';
		$exists = file_exists($file);

		if($exists) {
			// Der Output des Scripts wird n einen Buffer gespeichert, d.h.
			// nicht gleich ausgegeben.
			ob_start();

			// Das Template-File wird eingebunden und dessen Ausgabe in
			// $output gespeichert.
			include $file;
			$output = ob_get_contents();
			ob_end_clean();

			// Output zurückgeben.
			return $output;
		} else {
			// Template-File existiert nicht-> Fehlermeldung.
			return 'could not find layout';
		}
	}

}
?>