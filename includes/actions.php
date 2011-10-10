<?php
if (isset($_GET['notification']) && !empty($_GET['notification']))
{
	switch($_GET['notification'])
	{
		case "uplosuccess":
			?>
			<div class="success notification">
				<?php echo LANG_ACTION_UPLOAD_SUCCESS_BEFORE . $_GET['uplo_filename'] . LANG_ACTION_UPLOAD_SUCCESS_AFTER; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>	
			<?php
			break;
		case "uplofail":
			?>
			<div class="error notification">
				<?php echo LANG_ACTION_UPLOAD_FAIL; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
			<?php
			break;
		case "zipsuccess":
			?>
			<div class="success notification">
				<?php echo LANG_ACTION_UPLOAD_ZIP_SUCCESS_BEFORE . $_GET['uplo_filename'] . LANG_ACTION_UPLOAD_ZIP_SUCCESS_AFTER; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>	
			<?php
			break;
		case "zipfail":
			?>
			<div class="error notification">
				<?php echo LANG_ACTION_UPLOAD_ZIP_FAIL; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
			<?php
			break;
	}
}
else if (isset($_POST['newfilecontent']) && isset($_POST['filetosave']))
{
	$file = "../tmp/" . array_pop(explode("/", $_POST['filetosave']));
	$editedfile = array_pop(explode("/", $_POST['filetosave']));
	$openfile = fopen($file, "w");
	fwrite($openfile, stripslashes($_POST['newfilecontent']));
	fclose($openfile);
	$ftp->delete($_POST['filetosave']);
	$ftp->upload($file, $_POST['filetosave']);
	if(unlink($file))
	{
	?>
		<div class="success notification">
			<?php echo LANG_ACTION_EDIT_SUCCESS_BEFORE . $editedfile . LANG_ACTION_EDIT_SUCCESS_AFTER; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
	else
	{
	?>
		<div class="error notification">
			<?php echo LANG_ACTION_EDIT_FAIL_BEFORE . $editedfile . LANG_ACTION_EDIT_FAIL_AFTER; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
}
else if (isset($_GET['newdir']))
{
	if(!empty($_GET['newdir']))
	{
		$list = $ftp->getSimpleFileList();
		
		if(!in_array($_GET['newdir'], $list))
		{
			if($ftp->makeDir( $_GET['newdir']))
			{
			?>
				<div class="success notification">
					<?php echo LANG_ACTION_NEWDIR_SUCCESS_BEFORE . $_GET['newdir'] . LANG_ACTION_NEWDIR_SUCCESS_AFTER; ?>
					<span class="closeNotification" onclick="closeNotification()">
						X
					</span>
				</div>
			<?php
			}
			else
			{
			?>
				<div class="error notification">
					<?php echo LANG_ACTION_NEWDIR_FAIL_NO_AUTHORIZATION; ?>
					<span class="closeNotification" onclick="closeNotification()">
						X
					</span>
				</div>
			<?php
			}
		}
		else
		{
		?>
			<div class="error notification">
				<?php echo LANG_ACTION_NEWDIR_FAIL_EXISTS; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}
	}
	else
	{
	?>
		<div class="error notification">
			<?php echo LANG_ACTION_NEWDIR_FAIL_NO_NAME; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
}

else if (isset($_GET['tomove']) && isset($_GET['moveto']) && $_GET['movename'])
{	
	if(@$ftp->rename($_GET['tomove'] . "/", $_GET['moveto'] . "/" . $_GET['movename']))
	{
	?>
		<div class="success notification">
			"<?php echo $_GET['tomove'] . "\"" . LANG_ACTION_MOVE_SUCCESS; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
	else
	{
	?>
		<div class="error notification">
			<?php echo LANG_ACTION_MOVE_FAIL; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
}

else if (isset($_GET['newfile']))
{
	if(!empty($_GET['newfile']))
	{
		$onlyfile = array_pop(explode("/", $_GET['newfile']));
		
		$list = $ftp->getSimpleFileList();
		
		if(!in_array($onlyfile, $list))		
		{
		
			$tempfilename = "../tmp/" . $onlyfile;
			$tempfile = fopen($tempfilename, "w");
			fclose($tempfile);
		
			if (@$ftp->upload($tempfilename, $onlyfile) && unlink($tempfilename))
			{
			?>
				<div class="success notification">
					<?php echo LANG_ACTION_NEWFILE_SUCCESS_BEFORE . $onlyfile . LANG_ACTION_NEWFILE_SUCCESS_AFTER; ?>
					<span class="closeNotification" onclick="closeNotification()">
						X
					</span>
				</div>
			<?php
			}
			else
			{
			?>
				<div class="error notification">
					<?php echo LANG_ACTION_NEWFILE_FAIL_NO_AUTHORIZATION; ?>
					<span class="closeNotification" onclick="closeNotification()">
						X
					</span>
				</div>
			<?php
			}
		}
		else
		{
		?>
			<div class="error notification">
				<?php echo LANG_ACTION_NEWFILE_FAIL_EXISTS; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}
	}
	else
	{
	?>
		<div class="error notification">
			<?php echo LANG_ACTION_NEWFILE_FAIL_NO_NAME; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
}
	
else if (isset($_GET['rename']) && isset($_GET['oldname']) && isset($_GET['type']))
{
	if(@$ftp->rename( $_GET['oldname'], $_GET['rename'] ))
	{
		if($_GET['type'] == "dir")
		{
		?>
			<div class="success notification">
				<?php echo LANG_ACTION_RENAME_DIR_SUCCESS_BEFORE . $_GET['oldname'] . LANG_ACTION_RENAME_DIR_SUCCESS_MIDDLE . $_GET['rename'] . LANG_ACTION_RENAME_DIR_SUCCESS_AFTER; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}
		else
		{
		?>
			<div class="success notification">
				<?php echo LANG_ACTION_RENAME_FILE_SUCCESS_BEFORE . $_GET['oldname'] . LANG_ACTION_RENAME_FILE_SUCCESS_MIDDLE . $_GET['rename'] . LANG_ACTION_RENAME_FILE_SUCCESS_AFTER; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}
	}
	else
	{
		if($_GET['type'] == "dir")
		{
		?>
			<div class="error notification">
				<?php echo LANG_ACTION_RENAME_DIR_FAIL_NO_AUTHORIZATION; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}
		else
		{
		?>
			<div class="error notification">
				<?php echo LANG_ACTION_RENAME_FILE_FAIL_NO_AUTHORIZATION; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}
	}
}

else if (isset($_GET['delete']))
{
	if ($_GET['type'] == "dir")
	{
		if(@$ftp->removeDir( $_GET['delete'], 1 ))
		{
		?>
			<div class="success notification">
				<?php echo LANG_ACTION_DELETE_DIR_SUCCESS_BEFORE . $_GET['delete'] . LANG_ACTION_DELETE_DIR_SUCCESS_AFTER; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}
		else
		{
		?>
			<div class="error notification">
				<?php echo LANG_ACTION_DELETE_FILE_FAIL_NO_AUTHORIZATION; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}	
	}
	else
	{
		if(@$ftp->delete( $_GET['delete'] ))
		{
		?>
			<div class="success notification">
				<?php echo LANG_ACTION_DELETE_FILE_SUCCESS_BEFORE . $_GET['delete'] . LANG_ACTION_DELETE_FILE_SUCCESS_AFTER; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}
		else
		{
		?>
			<div class="error notification">
				<?php echo LANG_ACTION_DELETE_FILE_FAIL_NO_AUTHORIZATION; ?>
				<span class="closeNotification" onclick="closeNotification()">
					X
				</span>
			</div>
		<?php
		}
	}
}

else if (isset($_POST['multidelete']))
{	
	$kette = explode("//", $_POST['multidelete']);
	$last = array();
	$error = false;
	
	foreach($kette as $key)
	{
		$erg = explode("/", $key);
		$last[$erg[0]] = $erg[1];
	}
	
	foreach($last as $name => $type)
	{
		if(!empty($name) && !empty($type))
		{
			if ($type == "file")
			{
				if(!@$ftp->delete( $_GET['dir'] . "/" . $name))
					$error = true;
			}
			else
			{
				if(!@$ftp->removeDir( $_GET['dir'] . "/" . $name, 1 ))
					$error = true;
			}
		}
	}
	
	if($error == false)
	{
	?>
		<div class="success notification">
			<?php echo LANG_ACTION_MULTIDELETE_SUCCESS; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
	else
	{
	?>
		<div class="error notification">
			<?php echo LANG_ACTION_MULTIDELETE_FAIL_NO_AUTHORIZATION; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
}

else if (isset($_GET['chmod']) && isset($_GET['tochmod']))
{
	$chmod = octdec(str_pad($_GET['chmod'],4,'0',STR_PAD_LEFT)); 
	if($ftp->chmod($_GET['tochmod'], $chmod))
	{
	?>
		<div class="success notification">
			<?php echo LANG_ACTION_CHMOD_SUCCESS_BEFORE . $_GET['tochmod'] . LANG_ACTION_CHMOD_SUCCESS_AFTER; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
	else
	{
	?>
		<div class="error notification">
			<?php echo LANG_ACTION_CHMOD_FAIL_NO_AUTHORIZATION; ?>
			<span class="closeNotification" onclick="closeNotification()">
				X
			</span>
		</div>
	<?php
	}
}

else if (isset($_GET['settings']) && $_GET['settings'] == "save")
{
?>
	<div class="success notification">
		<?php echo LANG_ACTION_SETTINGS_SAVE_SUCCESS; ?>
		<span class="closeNotification" onclick="closeNotification()">
			X
		</span>
	</div>
<?php
}

else if (isset($_GET['settings_edit']))
{
	// Set language
	$language = $_GET["language"];
	setcookie("language", $language, time()+(3600*24*365));

	?>
	<script>
		ajaxfade('ajax/showdirectory.php?settings=save', '#slider');
	</script>
	<?php
}
?>