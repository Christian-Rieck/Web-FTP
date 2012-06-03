<?php

class Controller_FtpDirectory extends Controller {

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
        
        if ($this -> request['directory'] != "..") {
            $ftp -> changeDir($_SESSION['currentDirectory'] . "/" . $this -> request['directory']);
        } else {
            $ftp -> changeDir($_SESSION['currentDirectory']);
            $ftp -> levelUp();
        }
        $_SESSION['currentDirectory'] = $ftp -> getDir();        
       		        
        $view = new View('ftpFileList');
        $view -> assign('currentDir', $ftp -> getDir());
        $view -> assign('fileList', $ftp -> getFileList($ftp -> getDir(), 1));

		$this -> layout -> assign('directory', $view -> loadTemplate());

	}

}

?>