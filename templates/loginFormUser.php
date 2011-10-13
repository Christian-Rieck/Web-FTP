					<form id="tab_user" class="tab_content" method="post">
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
										placeholder="Steve Jobs" 
										<?php if($this -> _['usernameEmpty']) { ?>
											class="error"
										<?php } ?>
										/><br />
									<?php if($this -> _['usernameEmpty']) {
										echo "<div class='loginError'>" . LANG_LOGIN_ERR_NO_USER . "</div>";
									} ?>
									<label style="cursor: default">Passwort:</label><br />
									<input 
										type="password" 
										name="password" 
										size="25" 
										placeholder="••••••••" 
										<?php if($this -> _['passwordEmpty']) { ?>
											class="error"
										<?php } ?>
										/><br />
									<?php if($this -> _['usernameEmpty']) {
										echo "<div class='loginError'>" . LANG_LOGIN_ERR_NO_PASSWORD . "</div>";
									} ?>
								</div>
								<div style="clear: both"></div>
								<p>
									<input type="submit" name="submit_user" value="<?php echo LANG_LOGIN; ?>" />
									<input type="submit" name="submit_new_user" value="Registrieren" />
								</p>
							</div>
						</fieldset>
					</form>