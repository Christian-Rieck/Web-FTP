<?php
	include ("../class/ftp.class.php");
	session_start();
	$ftp = unserialize($_SESSION['ftp_sess']);
	
	include ("../includes/functions.php");
	require_once("../includes/config.php");
	
	if (isset($_GET['dir']))
	{
		$ftp->changeDir($_GET['dir']);
		
		if (isset($_GET['up']))
		{
			$ftp->levelUp();
		}	
		$_SESSION['actdir'] = $ftp->getDir();
	}
	else
	{
		$ftp->changeDir($_SESSION['actdir']);
	}
	
	$actdir = $ftp->getDir();
		
	include ('../includes/actions.php');
?>

<script type="text/javascript">
	parent.document.title = 'Web-FTP :: <?php echo $actdir; ?>';
</script>

<div style="margin-bottom: 10px">
	<div id="breadcrumb_menu">
		<img id="loader" class ="options" src="images/ajax-loader-small.gif" alt="loading..." style="display: none; float: right; padding-right: 2px" />
		<?php	
		$actdirs = array();
		if ($actdir != "/")
		{
			$actdirs =  explode("/", $actdir);
		}
		else
		{
			$actdirs[] = "";
		}
		
		$clickpath = "";
		$count = 1;
		while($count < count($actdirs))
		{
			$clickpath .= $actdirs[$count] . "/";
			echo $actdirs[$count] ? "" : "";
			?><a 
				class="breadcrumb"
				onclick="ajaxfade('ajax/showdirectory.php?dir=<?php echo $clickpath; ?>', '#slider')"><?php echo $actdirs[$count] ? $actdirs[$count] : "/"; ?></a><?php
			$count++;
		}
		?>
		<a class="breadcrumb"
		   onclick="ajaxfade('ajax/showdirectory.php?dir=/', '#slider')"><img src="images/home.png" 
		   																	  id="bread_home" 
		   																	  onmouseover="this.src='images/home_hover.png'" 
		   																	  onmouseout="this.src='images/home.png'" /></a>
	</div>
</div>
<ul>
<?php	
	$toolID = 0;
	$liste = $ftp->getFileList('', 1 );
	
	if ($liste)
	{
		sksort($liste, "name", true);
		foreach ($liste as $dir => $ftplist)
		{
			if ($liste[$dir]['type'] == 'Dir')
			{
	/* -----------------------------------*/
	/* -------->>> DIRECTORIES <<<--------*/
	/* -----------------------------------*/
?>
	<li class="listdir"
	<?php if($toolID == 0)
			echo "style=\"border-top: 1px solid #ccc;\""; ?>>
	  	<div class="li_hover">
			<div 
				class="listdiv" 
				title="<?php echo LANG_SHOW_OPEN_DIRECTORY . $liste[$dir]['name']; ?>" 
				onclick="ajaxfade('ajax/showdirectory.php?dir=<?php echo $actdir; if($actdir != "/"){echo"/";} echo $liste[$dir]['name']; ?>', '#slider', '<?php echo $toolID; ?>')">
				<?php echo $liste[$dir]['name']; ?>
			</div>
			<div class="options_right">
				<img
					src="images/ajax-loader-small.gif" 
					id="loader_<?php echo $toolID; ?>" 
					class="options" 
					alt="loading…" 
					style="display: none" />
				<img 
					src="images/move.png" 
					title="<?php echo LANG_SHOW_OPTION_DIR_MOVE; ?>" 
					class="options" 
					alt="move" 
					onclick="move('<?php echo $actdir . "/" . $liste[$dir]['name']; ?>', '<?php echo $toolID; ?>')" />
				<img 
					src="images/chmod.png" 
					title="<?php echo LANG_SHOW_OPTION_DIR_CHMOD; ?>" 
					class="options" 
					alt="chmod" 
					onclick="chmod('<?php echo $liste[$dir]['chmod']; ?>', '<?php echo $liste[$dir]['name']; ?>', '<?php echo $actdir; ?>', '<?php echo $toolID; ?>')" />
				<img 
					src="images/rename.png" 
					title="<?php echo LANG_SHOW_OPTION_DIR_RENAME; ?>" 
					class="options" 
					alt="rename" 
					onclick="rename('<?php echo $liste[$dir]['name']; ?>', '<?php echo $actdir; ?>', 'dir', '<?php echo $toolID; ?>')" />
				<img 
					src="images/delete.png" 
					title="<?php echo LANG_SHOW_OPTION_DIR_DELETE; ?>"
					class="options" 
					alt="löschen" 
					onclick="deletest('<?php echo $liste[$dir]['name']; ?>', '<?php echo $actdir; ?>', 'dir', '<?php echo $toolID; ?>')" />
				<input
					type="checkbox" 
					class="multi_delete" 
					alt="löschen" 
					value="<?php echo $liste[$dir]['name']; ?>/dir" />
			</div>
			<div style="clear: both"></div>
	  	</div>
	  	<div style="overflow: hidden">
			<div id="tools_<?php echo $toolID; ?>" class="tools" style="overflow:hidden; position: relative">
				<div class="tools_inner">
					<div id="tool_<?php echo $toolID; ?>" style="width: 100%; position:relative;"></div>
				</div>		
			</div>
	  	</div>
	</li>
<?php
	/* -----------------------------------*/
	/* ----------->>> FILES <<<-----------*/
	/* -----------------------------------*/
			$toolID++;
			}
		}
		foreach ($liste as $dir => $ftplist)
		{
			if ($liste[$dir]['type'] == 'File')
			{
				$endung = array_pop(explode(".", $liste[$dir]['name']));
				if (file_exists("../images/filetypes/{$endung}.png"))
				{
					$rowback = "images/filetypes/{$endung}.png";
				}
				else
				{
					$rowback = "images/filetypes/file.png";
				}				
				?>
				  <li class="listfile"
				  <?php if($toolID == 0)
						  echo "style=\"border-top: 1px solid #ccc;\""; ?>>
				    <form name="downloadform_<?php echo $toolID; ?>" action="ajax/download.php" method="post">
					  <input type="hidden" name="dir" value="<?php echo $actdir . "/" . $liste[$dir]["name"]; ?>" />
					</form>
					  <div class="li_hover">
					  	<img 
							src="<?php echo $rowback; ?>"
							alt="properties"  
							class="properties" 
							onclick="properties('<?php echo $actdir . "/" . $liste[$dir]['name']; ?>', '<?php echo $toolID; ?>')" />
					    <div 
					    	class="listdiv-files" 
					    	title="<?php echo LANG_SHOW_OPTION_FILE_DOWNLOAD . $liste[$dir]['name']; ?>" 
					    	onclick="document.downloadform_<?php echo $toolID; ?>.submit();return false">		   
						  <?php echo $liste[$dir]['name']; ?>
						  <span class="filesize">
						  	<?php echo $liste[$dir]['size']; ?>
						  </span>
					    </div>
					    <div style="float: right; height: 24px; padding-right: 3px">
					    <img
							src="images/ajax-loader-small.gif" 
							id="loader_<?php echo $toolID; ?>" 
							class="options" 
							alt="loading…" 
							style="display: none" />
					<?php
					if(is_editorfile($endung))
					{
					  ?>
						<img 
							src="images/edit.png"
							title="<?php echo LANG_SHOW_OPTION_FILE_EDIT; ?>" 
							class="options"
							alt="edit"
							onclick="edit('<?php echo $actdir . "/" . $liste[$dir]['name']; ?>', '<?php echo $toolID; ?>', '<?php echo $actdir; ?>')" />
					  <?php
					}	
					  ?>
					  	<img 
							src="images/move.png" 
							title="<?php echo LANG_SHOW_OPTION_FILE_MOVE; ?>" 
							class="options" 
							alt="move" 
							onclick="move('<?php echo $actdir . "/" . $liste[$dir]['name']; ?>', '<?php echo $toolID; ?>')" />
						<img 
							src="images/chmod.png" 
							title="<?php echo LANG_SHOW_OPTION_FILE_CHMOD; ?>" 
							class="options" 
							alt="chmod" 
							onclick="chmod('<?php echo $liste[$dir]['chmod']; ?>', '<?php echo $liste[$dir]['name']; ?>', '<?php echo $actdir; ?>', '<?php echo $toolID; ?>')" />
						<img 
							src="images/rename.png" 
							title="<?php echo LANG_SHOW_OPTION_FILE_RENAME; ?>" 
							class="options" 
							alt="rename" 
							onclick="rename('<?php echo $liste[$dir]['name']; ?>', '<?php echo $actdir; ?>', 'file', '<?php echo $toolID; ?>')" />
						<img 
							src="images/delete.png" 
							title="<?php echo LANG_SHOW_OPTION_FILE_DELETE; ?>" 
							class="options" 
							alt="löschen" 
							onclick="deletest('<?php echo $liste[$dir]['name']; ?>', '<?php echo $actdir; ?>', 'file', '<?php echo $toolID; ?>')" />
						<input
							type="checkbox" 
							class="multi_delete" 
							alt="löschen" 
							value="<?php echo $liste[$dir]['name']; ?>/file" />
					    </div>
						<div style="clear: both"></div>
	  				  </div>
	  				<div style="overflow: hidden">
					  <div id="tools_<?php echo $toolID; ?>" class="tools" style="overflow:hidden; position: relative">
						<div style="box-shadow: inset 0 0 8px #000; -webkit-box-shadow: inset 0 0 8px #000; box-shadow: inset 0 0 8px #000; position:relative; left: -10px; width: 620px">
						  <div id="tool_<?php echo $toolID; ?>" style="width: 100%; position:relative;"></div>
						</div>		
					  </div>
	  				</div>
				  </li>
				<?php
				$toolID++;
			}
		}
	} 
	?>
	</ul>
	<div style="margin: 5px 3px 10px 3px">
		<div style="width: 33%; float: left">
			<img 
				src="images/new_directory.png" 
				title="<?php echo LANG_SHOW_OPTION_NEW_DIRECTORY; ?>" 
				class="options" 
				style="margin:0 5px 0 0" 
				onClick="newdirectory('<?php echo $actdir; ?>')" />
			<img 
				src="images/new_file.png" 
				title="<?php echo LANG_SHOW_OPTION_NEW_FILE; ?>" 
				class="options" 
				style="margin:0 5px 0 0" 
				onClick="newfile('<?php echo $actdir; ?>')" />
			<img 
				src="images/upload.png" 
				title="<?php echo LANG_SHOW_OPTION_UPLOAD; ?>" 
				class="options" 
				style="margin:0 5px 0 0" 
				onClick="upload('<?php echo $actdir; ?>')" />
		</div>
		<div style="width: 34%; float: left; text-align: center">
			&nbsp;
			<img 
				src="images/ajax-loader-small.gif"
				id="bottomLoader" 
				style="display: none" />
			&nbsp;
		</div>
		<div style="width: 33%; float: left; text-align: right">
			<img 
				src="images/delete_multi_checkbox.png" 
				title="<?php echo LANG_SHOW_OPTION_MULTI_DELETE; ?>" 
				class="options" 
				style="margin:0 5px 0 0" 
				onClick="showcheckbox()" />
			<img 
				src="images/delete.png" 
				title="<?php echo LANG_SHOW_OPTION_DO_MULTI_DELETE; ?>" 
				class="options multi_delete" 
				style="margin:0" 
				onClick="delete_multi('<?php echo $actdir; ?>')" />
		</div>
	</div>
	<div style="clear: both"></div>
	
<script>
if ($("#bottomAction").css("top") == "0px")
{
	$("#directory_for_new").html("<?php echo $actdir; ?>");
}
</script>