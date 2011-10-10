<?php
include ('../class/ftp.class.php');
session_start();
$ftp = unserialize($_SESSION['ftp_sess']);

$size = $ftp->getSize( $_POST['dir'] );
$cursize = $size / 1024 / 1024;

$dateiname = basename($_POST['dir']);

header("Content-Type: application/download"); 
header("Content-Type: application/octet-stream");
header("Content-Length: {$size}"); 
header("Content-Disposition: attachment; filename=".urlencode($dateiname));


$file = fopen('php://output', 'w+');

while(!feof($ftp->download( $_POST['dir'], $file))) 
{
	$buffer = fread($ftp->download( $_POST['dir'], $file), 2048);
	readfile($buffer);
	flush();
	ob_flush();
}
?>