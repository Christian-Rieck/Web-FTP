<?php
ob_start();
session_start();

include("includes/config.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true)
{
	header('Location: login.php');
	exit;
}

$_SESSION['ftp_sess'] = serialize($ftp);
?>