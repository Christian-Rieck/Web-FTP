					<form id="tab_user" class="tab_content" method="post">
						<fieldset>
							<legend>Web-FTP :: Login</legend>
							<div id="login">
								<?php if($this -> _['loginFailed']) {
									echo "<div class='error'><p>" . LANG_LOGIN_ERR_BAD_USER_OR_PASSWORD . "</p></div>";
								} ?>
								<label>Username:</label><br />
								<input 
									type="text" 
									name="username" 
									size="25" 
									placeholder="Steve Jobs" 
									class="text
									<?php if($this -> _['usernameEmpty']) {
										echo " error";
									} ?>"
									/><br />
								<?php if($this -> _['usernameEmpty']) {
									echo "<div class='loginError'>" . LANG_LOGIN_ERR_NO_USER . "</div>";
								} ?>
								<label>Passwort:</label><br />
								<input 
									type="password" 
									name="password" 
									size="25" 
									placeholder="••••••••" 
									class="text
									<?php if($this -> _['passwordEmpty']) {
										echo " error";
									} ?>" 
									/><br />
								<?php if($this -> _['usernameEmpty']) {
									echo "<div class=\"loginError\">" . LANG_LOGIN_ERR_NO_PASSWORD . "</div>";
								} ?>
								<input 
									type="submit" 
									name="submit_user" 
									value="<?php echo LANG_LOGIN; ?>" />
								<input 
									type="submit" 
									name="submit_new_user" 
									value="Registrieren" />
							</div>
						</fieldset>
					</form>