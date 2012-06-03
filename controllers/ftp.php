<?php

class Controller_Ftp extends Controller {

	protected function make() {
	
	   if (!isset($_SESSION['id']) &&
	       !isset($_SESSION['domain'])) {
			header("Location: " . ROOT . "Login");
			break;
		}
	
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
            
        if (isset($_SESSION['currentDirectory']) &&
            !empty($_SESSION['currentDirectory'])) {
            $ftp -> changeDir($_SESSION['currentDirectory']);
        } else {
            $_SESSION['currentDirectory'] = $ftp -> getDir();
        }
        
        $header = new View('header');
        
        $header -> assign('headerTitle', "Web-FTP :: " . $ftp -> getDir());
		$header -> assign('stylesheet', "ftp.css");
		$header -> assign('javascript', "ftp.js");
		
		$header -> assign('topMenu', true);
		
		$topMenus = array(
				"ftp" => array(
						"text" => "FTP"
						, "bold" => true
						, "content" => array(
								"about" => array(
										"text" => "<a href=\"#\">About FTP</a>"
										, "content" => null
									)
								, "-" => null
								, "logout" => array(
										"text" => "<a href=\"Logout\">Logout</a>"
										, "content" => ""
									)
							)
					)
				, "help" => array(	
						"text" => "Hilfe"
						, "content" => array(
								"showhelp" => array(
										"text" => "<a href=\"#\">Hilfethemen anzeigen</a>"
										, "content" => null
									)
							)
					)
			);
			
		$header -> assign("topMenus", $topMenus);
		        
        $view = new View('ftpFileList');
        $view -> assign('currentDir', $ftp -> getDir());
        $view -> assign('fileList', $ftp -> getFileList($ftp -> getDir(), 1));
        
        $this -> layout -> assign('header', $header -> loadTemplate());
        $this -> layout -> assign('content', $view -> loadTemplate());
	}

}
?>