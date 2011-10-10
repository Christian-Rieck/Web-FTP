<?php 
session_start();

if(isset($_GET['connection']))
{
	$web_username = $_SESSION['web_username'];
	$web_user_id = $_SESSION['web_user_id'];
	
	session_destroy();
	session_start();
	
	$_SESSION['web_username'] = $web_username;
	$_SESSION['web_user_id'] = $web_user_id;
	
	header('Location: user.php');
}
else
{
	session_destroy();
	header('Location: login.php');
}
?>
