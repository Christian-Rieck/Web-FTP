<?php
include ('../class/ftp.class.php');
session_start();
$ftp = unserialize($_SESSION['ftp_sess']);
require_once("../includes/config.php");

$file = $_GET['file'];
if(substr($file, 0, 2) == "//")
	$file = substr($file, 1, strlen($file));

$modifiedTimestamp = $ftp->getLastModified($file);
$fileSize = $ftp->getSize($file, 1);

$lastModified = date("d.m.Y - H:i", $modifiedTimestamp);

$fileinfo = $ftp->getFileList($file, 1);
?>

<div style="padding: 15px 20px 15px 70px; margin: 0 auto">

	<div style="float: left; width: 35%; font-weight: bold">
		<?php echo LANG_PROPERTIES_OWNER;?> <br />
		<?php echo LANG_PROPERTIES_GROUP;?> <br />
		<?php echo LANG_PROPERTIES_LAST_MODIFIED;?> <br />
		<?php echo LANG_PROPERTIES_SIZE;?> <br />
		<?php echo LANG_PROPERTIES_CHMOD;?> <br />
		<?php echo LANG_PROPERTIES_PATH;?>
	</div>
	
	<div style="float: right; width: 65%">
		<?php echo $fileinfo[$file]['owner']; ?> <br />
		<?php echo $fileinfo[$file]['group']; ?> <br />
		<?php echo $lastModified; ?> Uhr <br />
		<?php echo $fileinfo[$file]['size']; ?> <br />
		<?php echo substr($fileinfo[$file]['chmod'], 1); ?> <br />
		<?php echo $fileinfo[$file]['name']; ?> 
	</div>	
	
	<div style="clear: both"></div>
</div>