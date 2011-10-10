<?php
require_once("../includes/config.php");
session_start();
?>
<form name="settingsform" action='javascript:settings(); ajaxfade("ajax/showdirectory.php?language="+document.settingsform.language.value, "#slider");'>
	<center>
		<h2><?php echo LANG_SETTINGS_HEAD; ?></h2>
		<div style="width: 400px; text-align: left; font-size: 12px">
			<?php 
			if(isset($_SESSION['logged_in'])) { ?>
				<a href="logout.php?connection">Server-Verbindung trennen</a><br />
			<?php }
			if(isset($_SESSION['web_username'])) { ?>
				<a href="logout.php"><?php echo LANG_LINK_LOGOUT; ?></a><br />
			<?php }
			echo LANG_SETTINGS_CHOOSE_LANG; ?>
			
			<select name="language">
				<?php
				$langdir = opendir("../includes/languages");
				while($lang = readdir($langdir))
				{
					if(substr($lang, 0, 1) != ".")
					{
						$short_locale = substr($lang, 5, 5);
						
						$select = "";
						if($short_locale == $_COOKIE['language'])
						{
							$select = "selected";
						}
						
						echo "<option value=\"{$short_locale}\" {$select}>" . $locales[$short_locale] . "</option>";
					}
				}
				?>
			</select>
  		</div>
  		<br />
  		<input type="button" value="<?php echo LANG_SETTINGS_SAVE; ?>" onclick='settings(); ajaxfade("ajax/showdirectory.php?settings_edit=1language="+document.settingsform.language.value, "#slider");' />
	</center>
</form>