<?php
include ('../class/ftp.class.php');
session_start();

$ftp = unserialize($_SESSION['ftp_sess']);

$file = "../tmp/" . array_pop(explode("/", $_POST['file']));
$openfile = fopen($file, "w");
fwrite($openfile, stripslashes($_POST['newfilecontent']));
fclose($openfile);
$ftp->delete($_POST['file']);
$ftp->upload($file, $_POST['file']);
unlink($file);

return 0;
?>