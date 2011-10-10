<?php
require_once("../includes/config.php");
?>

<form name="newdirectoryform" action='javascript:ajaxfade("ajax/showdirectory.php?newdir="+document.newdirectoryform.newdirectoryname.value+"&dir="+$("#directory_for_new").html(), "#slider", "bottomLoader");'>
	<center>
		<h2><?php echo LANG_NEW_DIR_HEAD; ?></h2>
		
		<?php echo LANG_NEW_DIR_DIRECTORY . "<span id=\"directory_for_new\" style=\"font-weight: bold\">" . $_GET['dir'] . "</span>"; ?><br />
		<input type="text" name="newdirectoryname" />
		<input type="button" value="<?php echo LANG_NEW_DIR_BUTTON_CREATE; ?>" onclick='ajaxfade("ajax/showdirectory.php?newdir="+document.newdirectoryform.newdirectoryname.value+"&dir="+$("#directory_for_new").html(), "#slider", "bottomLoader");' />
	</center>
</form>