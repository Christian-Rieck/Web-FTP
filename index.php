<?php
error_reporting(E_ALL);
ob_start();
session_start();
//include("includes/startftp.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true)
{
	header('Location: login.php');
	exit;
}

include ('includes/functions.php');

if(isset($_FILES['uploadfile']['tmp_name']))
{
	include ('includes/file_upload.php');
}

include ('includes/head.php');

if(empty($_SESSION['actdir']))
{
	$_SESSION['actdir'] = "/";
}
?>
<center>
	<div id="ajaxdiv">
		<div id="slider">
		</div>
	</div>
	
	<div style="display: none; padding: 10px 0; margin-top: -10px">
		<div id="bottomAction">
		</div>
	</div>
</center>
<?php 
include('includes/footer.php');
ob_end_flush();
?>