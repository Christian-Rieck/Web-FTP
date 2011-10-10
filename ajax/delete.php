<?php
require_once("../includes/config.php");
$todelete = $_GET['delete'];
if($_GET['type'] == "dir")
{
	$type_before = LANG_DELETE_DIRECTORY_BEFORE;
	$type_after = LANG_DELETE_DIRECTORY_AFTER;
}
else
{
	$type_before = LANG_DELETE_FILE_BEFORE;
	$type_after = LANG_DELETE_FILE_AFTER;
} 
?>
<div style="text-align: center; padding: 15px 20px">
	<?php echo $type_before . "<span style='color: blue'>\"" . $todelete . "\"</span>" . $type_after; ?>
	<input type="button" value="<?php echo LANG_DELETE_BUTTON_DELETE; ?>" onclick='ajaxfade("ajax/showdirectory.php?type=<?php echo $_GET['type']; ?>&delete=<?php echo $todelete; ?>&dir=<?php echo $_GET['dir']; ?>", "#slider", "<?php echo $_GET['num']; ?>");' />
</div>