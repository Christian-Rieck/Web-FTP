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
				, "file" => array(	
						"text" => "Ablage"
						, "content" => array(
								"newfile" => array(
										"text" => "<a href=\"#\">Neue Datei</a>"
										, "content" => null
									),
								"newdirectory" => array(
										"text" => "<a href=\"#\">Neuer Ordner</a>"
										, "content" => null
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
		        
        $windowHeader = new View('windowHeader');
        $windowHeader -> assign('currentDir', $ftp -> getDir());
        
        $view = new View('ftpFileList');
        $view -> assign('fileList', $ftp -> getFileList($ftp -> getDir(), 1));
        
        $windowFooter = new View('windowFooter');
        
        $this -> layout -> assign('header', $header -> loadTemplate());
        $this -> layout -> assign('windowHeader', $windowHeader -> loadTemplate());
        $this -> layout -> assign('content', $view -> loadTemplate());
        $this -> layout -> assign('windowFooter', $windowFooter -> loadTemplate());
	}

}
?>