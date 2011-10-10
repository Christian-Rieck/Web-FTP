<?php
$upload_notofication = "";

include ('../class/ftp.class.php');
$ftp = unserialize($_SESSION['ftp_sess']);
$ftp->changeDir( $_SESSION['actdir'] );

if(isset($_POST['unzip']) && $_POST['unzip'] == "on" && $_FILES['uploadfile']['type'] == "application/zip")
{
	$zip = new ZipArchive;
	if ($zip->open($_FILES['uploadfile']['tmp_name']) === TRUE) 
	{
	    $i = 0;
		$anzahl = $zip->numFiles;
	    
	    while($i < $anzahl)
	    {
	    	$files[] = $zip->getNameIndex($i);
		  	$i++;
	    }

		$zip->extractTo('tmp/');
	    $zip->close();
	    
	    foreach ($files as $actzipfile)
		{
			$laenge = strlen($actzipfile)-1;
			$erg = substr($actzipfile, $laenge ); 
			
			if ($erg == "/")
			{
				$ftp->makeDir($actzipfile);	
				$directories[] = $actzipfile;
			}
			else
			{
				$ftp->upload('tmp/' . $actzipfile, $actzipfile);
				unlink('tmp/' . $actzipfile);
			}
			
		}
		
		$directories = array_reverse($directories);
		foreach($directories as $deldir)
		{
			rmdir('tmp/' . $deldir);	
		}
		$upload_notification = "zipsuccess";
	}
	else
	{
	    $upload_notification = "zipfail";
	}	
}
else
{
	move_uploaded_file($_FILES['uploadfile']['tmp_name'], "tmp/" . $_FILES['uploadfile']['name']);
	if($ftp->upload("tmp/" . $_FILES['uploadfile']['name'], $_FILES['uploadfile']['name']))
	{
		$upload_notification = "uplosuccess";
	}
	else
	{
		$upload_notification = "uplofail";
	}
	unlink("tmp/" . $_FILES['uploadfile']['name']);
}
?>