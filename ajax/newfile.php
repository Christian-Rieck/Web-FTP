<?php
require_once("../includes/config.php");
?>

<form name="newfileform" action='javascript:ajaxfade("ajax/showdirectory.php?newfile="+document.newfileform.newfilename.value+"&dir="+$("#directory_for_new").html(), "#slider", "bottomLoader")'>
	<center>
		<h2><?php echo LANG_NEW_FILE_HEAD; ?></h2>
		
		<?php echo LANG_NEW_FILE_DIRECTORY . "<span id=\"directory_for_new\" style=\"font-weight: bold\">" . $_GET['dir'] . "</span>"; ?><br />
		<input type="text" name="newfilename" />
		<input type="button" value="<?php echo LANG_NEW_FILE_BUTTON_CREATE; ?>" onclick='ajaxfade("ajax/showdirectory.php?newfile="+document.newfileform.newfilename.value+"&dir="+$("#directory_for_new").html(), "#slider", "bottomLoader")' />
	</center>
</form>