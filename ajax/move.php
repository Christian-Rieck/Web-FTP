<?php
require_once("../includes/config.php");
$full = $_GET['name'];

$path = substr($full, 0, strripos($full, "/")) . "/";
$toMove = array_pop(explode("/", $full));
?>

<form name="moveform" action='javascript:ajaxfade("ajax/showdirectory.php?movename=<?php echo $toMove; ?>&tomove=<?php echo $full; ?>&moveto="+document.moveform.moveto.value, "#slider", "<?php echo $_GET['num']; ?>")'>
	<div style="text-align: center; padding: 15px 20px">
		"<b><?php echo $toMove; ?></b>" verschieben nach: <br />
		<input type="text" name="moveto" size="50" value="<?php echo $path; ?>" />
		<input type="button" value="<?php echo LANG_MOVE_BUTTON_MOVE; ?>" onclick='ajaxfade("ajax/showdirectory.php?movename=<?php echo $toMove; ?>&tomove=<?php echo $full; ?>&moveto="+document.moveform.moveto.value, "#slider", "<?php echo $_GET['num']; ?>")' />
	</div>
</form>