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