<?php
session_start();

if(isset($_SESSION['username']))
	header('Location: index.php');
else if(isset($_SESSION['web_username']))
	header('Location: user.php');
else if(isset($_POST['submit_new_user']))
	header('Location: register.php');

include("includes/config.php");

if (isset($_POST['submit_ftp']))
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
	
	if ($fehler == false)
	{
		if(empty($_POST['port']))
			$port = 21;
		else
			$port = $_POST['port'];
		
		if(isset($_POST['ssl']))
			$ssl = true;
		else
			$ssl = false;		
		
		$config = array( "host" => $_POST['domain'],
				 "port"     => $port,
		 	  	 "username" => $_POST['username'],
		 		 "password" => $_POST['password'] );
		
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
			header('Location: index.php');
		}
		catch (FTPException $ftpError)
		{
			$fehler = true;
			$fehlermeldung = $ftpError->getMessage();
		}
	}
}
else if (isset($_POST['submit_user']))
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
	
	if ($fehler == false)
	{
		include("includes/mysql_config_my.php");
		//include("includes/mysql_config.php");
		
		$username = $db->real_escape_string($_POST['username']);
		$password = md5($_POST['password']);
		
		$logincheck = $db->query("SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'");
		
		if($logincheck->num_rows !== 1)
		{
			$fehler = true;
			$fehlermeldung .= "Benutzername oder Passwort sind falsch!";
			$fehlermeldung .= "<br />";
		}
		else
		{
			$id = $logincheck->fetch_row();
					
			session_start();
			$_SESSION['web_user_id'] = $id[0];
			$_SESSION['web_username'] = $username;
			
			header('Location: user.php');
		}
	}
}
?>

<html>
	<head>
		<title>Web-FTP :: Login</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>		
		<script type="text/javascript" src="js/tabs.js"></script>
	</head>
	
	<body>
		<center>
			<div id="login-box">
			
				<div id="tab_div">
					<ul class="tabs">
						<li><a href="#tab_ftp" class="tabs <?php if (isset($_POST['submit_ftp'])) echo "active"; if (!isset($_POST['submit_ftp']) && !isset($_POST['submit_user']) && !isset($_GET['user'])) echo "active"; ?>">FTP</a></li>
						<li><a href="#tab_user" class="tabs <?php if (isset($_POST['submit_user']) || isset($_GET['user'])) echo "active"; ?>">User</a></li>
					</ul>
				</div>
				
				<div id="form-box">
					<form id="tab_ftp" class="tab_content" method="post" action="login.php">
						<fieldset>
							<legend>Web-FTP :: Login</legend>
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
								<input type="submit" name="submit_ftp" value="<?php echo LANG_LOGIN; ?>" />
							</div>
						</fieldset>
					</form>
					
					<form id="tab_user" class="tab_content" method="post" action="login.php">
						<fieldset>
							<legend>Web-FTP :: Login</legend>
							<div id="login">
								<div id="login-form">
									<?php
										if (isset($fehler) && $fehler == true)
											echo "<div style=\"margin-bottom:10px; color:red; font-size:12px\">" . $fehlermeldung . "</div";
									?>
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
								<div style="clear: both"></div>
								<input type="submit" name="submit_user" value="<?php echo LANG_LOGIN; ?>" /> <br />
								<input type="submit" name="submit_new_user" value="Neuer Benutzer..." />
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</center>
	</body>
</html>

<?php
if(isset($_POST['submit_user']) || isset($_GET['user']))
{ ?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$(".tab_content").hide();
	
			var activeTab = "#tab_user";
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
	
			var activeTab = "#tab_ftp";
			var toHeight = $(activeTab).height();
					
			$(activeTab).show();
		});
	</script>
<?php } ?>