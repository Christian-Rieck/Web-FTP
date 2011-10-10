<?php
include ('../class/ftp.class.php');
session_start();
$ftp = unserialize($_SESSION['ftp_sess']);

require_once("../includes/config.php");

$downloadfile = $_GET['file'];
$file = "../tmp/" . array_pop(explode("/", $downloadfile));

$ftp->download( $downloadfile, $file);

$content = file($file);
$rows = count($content);

if($rows > 20)
	$rows = 20;
else if($rows < 5)
	$rows = 6;

unlink($file);
?>
<div style="text-align: center; padding: 15px 20px">
	<form name="editform" action="javascript:savefile('<?php echo $_GET['file']; ?>', '<?php echo $_GET['dir']; ?>', <?php echo $_GET['num']; ?>)">
		<textarea id="code" name="code" rows="<?php echo $rows; ?>" style="width: 550px; max-width: 550px;"><?php foreach($content as $key) {echo $key; } ?></textarea>
		<br />
		<input type="button" name="submit" value="<?php echo LANG_EDIT_BUTTON_SAVE; ?>" onclick="savefile('<?php echo $_GET['file']; ?>', '<?php echo $_GET['dir']; ?>', <?php echo $_GET['num']; ?>)">
	</form>
</div>