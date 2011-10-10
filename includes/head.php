<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Web-FTP</title>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>

		<script type="text/javascript">
			$(window).load(function () 
			{
 				ajaxfade("ajax/showdirectory.php<?php if(isset($_FILES['uploadfile']['name'])){ echo "?notification=" . $upload_notification . "&uplo_filename=" . $_FILES['uploadfile']['name'];} ?>", "#slider");
			});
		</script>
		
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>
	<body>
		<div id="settings_button">
			<img 
				src="images/settings.png" 
				title="<?php echo LANG_SHOW_OPTION_SETTINGS; ?>" 
				style="cursor: pointer"  
				onclick="settings()" />
		</div>
		<div id="settings">
		</div>