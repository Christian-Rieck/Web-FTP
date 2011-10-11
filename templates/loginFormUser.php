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