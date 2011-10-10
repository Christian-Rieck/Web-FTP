<?php
include("includes/config.php");

if(isset($_POST['submit_register']))
{
	$fehler = false;
	$fehlermeldung = "";
	
	if (empty($_POST['username']))
	{
		$fehler = true;
		$fehlermeldung .= LANG_LOGIN_ERR_NO_USER;
		$fehlermeldung .= "<br />";
	}
	if (empty($_POST['password']))
	{
		$fehler = true;
		$fehlermeldung .= LANG_LOGIN_ERR_NO_PASSWORD;
		$fehlermeldung .= "<br />";
	}
	if (empty($_POST['password_repeat']))
	{
		$fehler = true;
		$fehlermeldung .= "Sie müssen das Passwort wiederholen!";
		$fehlermeldung .= "<br />";
	}
	if ($_POST['password'] != $_POST['password_repeat'])
	{
		$fehler = true;
		$fehlermeldung .= "Die Passwörter stimmen nicht überein!";
		$fehlermeldung .= "<br />";
	}
	
	if ($fehler == false)
	{
		include("includes/mysql_config.php");
	
		$username = $db->real_escape_string($_POST['username']);
		$password = md5($_POST['password']);
		
		$checkuser = $db->query("SELECT username FROM users WHERE username = '" . $username . "'");
	
		if($checkuser->num_rows > 0)
		{
			$fehler = true;
			$fehlermeldung .= "Der Benutzername ist bereits vergeben!";
			$fehlermeldung .= "<br />";
		}
		else
		{
			$insertQuery = "INSERT INTO users VALUES ('', '$username', '$password')";
			if($db->query($insertQuery))
			{
				$registered = true;
				$fehler = true;
				$fehlermeldung .= "<span style=\"color:green\">Sie haben sich erfolgreich registriert! <br />";
				$fehlermeldung .= "<a href=\"login.php?user\">Hier</a> gelangen Sie zum Login...</span>";
				$fehlermeldung .= "<br />";
			}
			else
			{
				$fehler = true;
				$fehlermeldung .= "Fehler beim Eintragen in die Datenbank!";
				$fehlermeldung .= "<br />";
			}
		}
	}
}
?>
<html>
	<head>
		<title>Web-FTP :: Registrierung</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	
	<body>
		<center>
			<div id="login-box">
				<form method="post" action="register.php" style="padding-top: 1em">
					<fieldset>
						<legend>Web-FTP :: Registrierung</legend>
						<div id="login">
							<div id="login-form">
								<?php
									if (isset($fehler) && $fehler == true)
										echo "<div style=\"margin-bottom:10px; color:red; font-size:12px\">" . $fehlermeldung . "</div";
										
									if($registered == false)
									{
								?>
								<label style="cursor: default">Benutzername:</label><br />
								<input 
									type="text" 
									name="username" 
									size="25" 
									placeholder="Steve Jobs" /><br />
								<label style="cursor: default">Passwort:</label><br />
								<input 
									type="password" 
									name="password" 
									size="25" 
									placeholder="••••••••" /><br />
								<label style="cursor: default">Passwort wiederholen:</label><br />
								<input 
									type="password" 
									name="password_repeat" 
									size="25" 
									placeholder="••••••••" />
							</div>
							<div style="clear: both"></div>
							<input type="submit" name="submit_register" value="Registrieren" />
							<?php } ?>
						</div>
					</fieldset>
				</form>
			</div>
		</center>
	</body>
</html>