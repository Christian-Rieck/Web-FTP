<?php
/**
 * Vorlage für Controller
 */
class Controller {

	// Enthält die übergebenen Daten
	protected $request = null;
	// Stellt zugehöriges Layout als View bereit
	protected $layout = null;

	/**
	 * Konstruktor, erstellt den Controller.
	 *
	 * @param Array $request Array aus $_GET & $_POST.
	 */
	public function __construct($request) {
		$this -> request = $request;

		if(method_exists($this, "init"))
			$this -> init();

		$classname = get_class($this);

		if(strpos($classname, "Controller_") == 0)
			$this -> layout = new View(strtolower($classname{11}) . substr($classname, 12), true); 
		else
			$this -> layout = new View("notfound");
	}

	/**
	 * Methode zum Laden des Contents.
	 *
	 * @return String Content der Applikation.
	 */
	public function load() {
		if(method_exists($this, "make"))
			$this -> make();

		return $this -> layout -> loadLayout();
	}

}
?>