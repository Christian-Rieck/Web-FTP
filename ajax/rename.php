<?php
require_once("../includes/config.php");
?>

<form name="renameform" action='javascript:ajaxfade("ajax/showdirectory.php?type=<?php echo $_GET['type']; ?>&oldname=<?php echo $_GET['old']; ?>&rename="+document.renameform.newname.value+"&dir=<?php echo $_GET['curdir']; ?>", "#slider", "<?php echo $_GET['num']; ?>")'>
	<div style="text-align: center; padding: 15px 20px">
		<input type="text" name="newname" value="<?php echo $_GET['old']; ?>" />
		<input type="button" value="<?php echo LANG_RENAME_BUTTON_RENAME; ?>" onclick='ajaxfade("ajax/showdirectory.php?type=<?php echo $_GET['type']; ?>&oldname=<?php echo $_GET['old']; ?>&rename="+document.renameform.newname.value+"&dir=<?php echo $_GET['curdir']; ?>", "#slider", "<?php echo $_GET['num']; ?>")' />
	</div>
</form>