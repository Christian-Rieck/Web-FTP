<?php

class Controller_FtpInfo extends Controller {

	public function make() {

    	$ftpConfig = array(
    	    "host"     => $_SESSION['domain'],
    	    "username" => $_SESSION['username'],
    	    "password" => $_SESSION['password'],
    	    "port"     => $_SESSION['port']);

		$ftp = FTP::getInstance();
					   
		if ($_SESSION['ssl'])
            $ftp -> connect($ftpConfig, true, true);
        else
            $ftp -> connect($ftpConfig);        
       		        
        $view = new View('ftpInfo');
        $view -> assign('info', $ftp -> getFileList("/html/2012/index.php", 1));

		$this -> layout -> assign('info', $view -> loadTemplate());

	}

}

?>