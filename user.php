<?php
session_start();

if(!isset($_SESSION['web_user_id']) || !isset($_SESSION['web_username']))
{
	header('Location: index.php');
	break;
}

include("includes/config.php");
include("includes/mysql_config.php");

if(isset($_POST['submit_ftp']) && $_POST['server_id'] > 0)
{
	$query = $db->query("SELECT * FROM connections WHERE id = " . $_POST['server_id']);
	$server = $query->fetch_row();

	try
	{
		$ftp = FTP::getInstance();
		
		$ssl = $server[6];
		
		$config = array( "host" => $server[2],
				 "port"     => $server[3],
		 	  	 "username" => $server[4],
		 		 "password" => $server[5] );
		
		if($ssl == TRUE)
			$ftp->connect( $config, true);
		else
			$ftp->connect( $config );
		
		$_SESSION['logged_in'] = true;
		$_SESSION['domain'] = $server[2];
		$_SESSION['port'] = $server[3];
		$_SESSION['username'] = $server[4];
		$_SESSION['password'] = $server[5];
		$_SESSION['ssl'] = $ssl;
		$_SESSION['ftp_sess'] = serialize($ftp);
		header('Location: index.php');
	}
	catch (FTPException $ftpError)
	{
		$fehler = true;
		$fehlermeldung = $ftpError->getMessage();
	}
}
else if(isset($_POST['submit_new_server']))
{
	$fehler = false;
	$fehlermeldung = "";
	
	if (empty($_POST['domain']))
	{
		$fehler = true;
		$fehlermeldung .= LANG_LOGIN_ERR_NO_DOMAIN;
		$fehlermeldung .= "<br />";
	}
	if (!isset($_POST['anonymous']))
	{
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
	}
	else
	{
		$_POST['username'] = "anonymous";
	}
	
	if ($fehler == false)
	{
		if(empty($_POST['port']))
			$port = 21;
		else
			$port = $_POST['port'];
		
		if(isset($_POST['ssl']))
			$ssl = 1;
		else
			$ssl = 0;		
		
		$config = array( "host" => $_POST['domain'],
				 "port"     => $port,
		 	  	 "username" => $_POST['username'],
		 		 "password" => $_POST['password'] );
		 		 
		$available = $db->query("SELECT * FROM connections WHERE userid = $_SESSION[web_user_id] AND 
																 domain = '$_POST[domain]' AND
																 port = $port AND
																 username = '$_POST[username]' AND
																 password = '$_POST[password]' AND
																 connections.ssl = $ssl");
													
		if($available->num_rows > 0)
		{
			$fehler = true;
			$fehlermeldung .= "Sie gewählte Verbindung ist bereits vorhanden!";
			$fehlermeldung .= "<br />";
		}
		else
		{
			try
			{
				$ftp = FTP::getInstance();
				
				if($ssl == TRUE)
					$ftp->connect( $config, true);
				else
					$ftp->connect( $config );
				
				$_SESSION['logged_in'] = true;
				$_SESSION['domain'] = $_POST['domain'];
				$_SESSION['port'] = $port;
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['password'] = $_POST['password'];
				$_SESSION['ssl'] = $ssl;
				$_SESSION['ftp_sess'] = serialize($ftp);
							
				$db->query("INSERT INTO connections VALUES('', $_SESSION[web_user_id], '$_POST[domain]', $port, '$_POST[username]', '$_POST[password]', $ssl)") or die($db->error);
				
				header('Location: index.php');
			}
			catch (FTPException $ftpError)
			{
				$fehler = true;
				$fehlermeldung = $ftpError->getMessage();
			}
		}
	}
}

$connections = $db->query("SELECT * FROM connections WHERE userid = " . $_SESSION['web_user_id']);
?>

<html>
	<head>
		<title>Web-FTP Userpanel</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>		
		<script type="text/javascript" src="js/settings.js"></script>
		<script type="text/javascript" src="js/tabs.js"></script>
	</head>
	
	<body>
		<div id="settings_button">
			<img 
				src="images/settings.png" 
				title="<?php echo LANG_SHOW_OPTION_SETTINGS; ?>" 
				style="cursor: pointer"  
				onclick="settings()" />
		</div>
		<div id="settings">
		</div>
		
		<center>
			<div id="login-box">
			
				<div id="tab_div">
					<ul class="tabs">
						<li><a href="#tab_select_server" class="tabs <?php if (isset($_POST['submit_select_server'])) echo "active"; if (!isset($_POST['submit_select_server']) && !isset($_POST['submit_new_server'])) echo "active"; ?>">Server wählen</a></li>
						<li><a href="#tab_new_server" class="tabs <?php if (isset($_POST['submit_new_server'])) echo "active"; ?>">Neuer Server</a></li>
					</ul>
				</div>
				
				<div id="form-box">
					<form id="tab_select_server" class="tab_content" method="post" action="user.php">
						<fieldset>
							<legend>Server auswählen</legend>
							<div id="login">
								<div id="login-form">
									<?php
										if (isset($fehler) && $fehler == true)
											echo "<div style=\"margin-bottom:10px; color:red; font-size:12px\">" . $fehlermeldung . "</div";
									?>
									<label style="cursor: default">Server:</label><br />
									<select style="width: 220px" name="server_id">
									<?php
										if($connections->num_rows == 0)
											echo "<option>Noch kein Server eingetragen!</option>";
										else
										{
											while($list_connections = $connections->fetch_array())
											{
												echo "<option value=\"$list_connections[0]\">$list_connections[2]:$list_connections[3] - $list_connections[4]</option>";
											}
										}
									?>
									</select>
								</div>
								<div style="clear: both"></div>
								<input type="submit" name="submit_ftp" value="Zu Server verbinden" />
							</div>
						</fieldset>
					</form>
					
					<form id="tab_new_server" class="tab_content" method="post" action="user.php">
						<fieldset>
							<legend>Neuer Server</legend>
							<div id="login">
								<div id="login-form">
									<?php
										if (isset($fehler) && $fehler == true)
											echo "<div style=\"margin-bottom:10px; color:red; font-size:12px\">" . $fehlermeldung . "</div";
									?>
									<label style="cursor: default">(FTP-)Domain:</label><br />
									<input 
										type="text" 
										name="domain" 
										size="25" 
										placeholder="www.example.com" />
									<input 
										type="text" 
										name="port" 
										size="1" 
										placeholder="21" /><br />
									<label style="cursor: default">Username:</label><br />
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
										placeholder="••••••••" />
								</div>
								<table>
									<tr style="height: 20px">
										<td>
											<input type="checkbox" id="ssl" name="ssl" />
										</td>
										<td>
											<label for="ssl"><?php echo LANG_SSL_LOGIN; ?></label>
										</td>
									</tr>
									<tr style="height: 30px">
										<td>
											<input type="checkbox" id="anonymous" name="anonymous" />
										</td>
										<td>
											<label for="anonymous"><?php echo LANG_ANONYMOUS_LOGIN; ?></label>
										</td>
									</tr>
								</table>
								<div style="clear: both"></div>
								<input type="submit" name="submit_new_server" value="Einloggen und hinzufügen" />
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</center>
	</body>
</html>

<?php
if(isset($_POST['submit_new_server']))
{ ?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$(".tab_content").hide();
	
			var activeTab = "#tab_new_server";
			var toHeight = $(activeTab).height();
					
			$(activeTab).show();
		});
	</script>
<?php 
}
else
{ ?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$(".tab_content").hide();
	
			var activeTab = "#tab_select_server";
			var toHeight = $(activeTab).height();
					
			$(activeTab).show();
		});
	</script>
<?php } ?>