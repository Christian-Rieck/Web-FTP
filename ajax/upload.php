<?php
require_once("../includes/config.php");
?>

<div id="upload">
	<center>
		<h2><?php echo LANG_UPLOAD_HEAD; ?></h2>
		
		<?php echo LANG_UPLOAD_DIRECTORY; ?><br />
		<span id="directory_for_new" style="font-weight: bold"><?php echo $_GET['dir']; ?></span>
		<br />
	</center>
	
	<div style="padding-left: 100px; margin-top: 30px">
		<form enctype="multipart/form-data" method="post" action="index.php">
			<?php echo LANG_UPLOAD_BUTTON_CHOOSE; ?><br />
			<input name="uploadfile" type="file"> <br />
			<div style="margin-bottom: 3px;">
				<input type="checkbox" name="unzip" id="unzip"><label for="unzip" style="cursor: pointer"><?php echo LANG_UPLOAD_CHECKBOX_UNZIP; ?></label>
			</div>
			<input type="submit" value="<?php echo LANG_UPLOAD_BUTTON_UPLOAD; ?>">
			<input type="hidden" name="curdir" value="$('#directory_for_new').html()" />
		</form>
		<br />
	</div>
</div>
