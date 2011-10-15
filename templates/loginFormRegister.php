					<form id="tab_register" class="tab_content" method="post">
						<div id="login">
							<?php 
							if(isset($this -> _['registerSuccess']))
								if($this -> _['registerSuccess'])
									echo "<div class=\"loginSuccess\">" . LANG_REGISTER_SUCCESS . "</div>";
								else
									echo "<div class=\"loginError\" style=\"font-size: 13px\">" . LANG_REGISTER_FAILED . "</div>";
							
							if(
								!isset($this -> _['registerSuccess']) 
								|| (isset($this -> _['registerSuccess']) && !$this -> _['registerSuccess']))
							{ ?>
								<label style="cursor: default">Benutzername:</label><br />
								<input 
									type="text" 
									name="username" 
									class="text
									<?php if($this -> _['usernameEmpty'] || $this -> _['usernameToShort'] || $this -> _['usernameExists']) {
										echo " error";
									} ?>"
									<?php if(isset($this -> _['username'])) {
										echo "value=\"{$this -> _['username']}\"";
									} ?>
									placeholder="Steve Jobs" /><br />
								<?php if($this -> _['usernameEmpty']) {
									echo "<div class=\"loginError\">" . LANG_REGISTER_ERR_NO_USER . "</div>";
								} 
								else if($this -> _['usernameToShort']) {
									echo "<div class=\"loginError\">" . LANG_REGISTER_ERR_USERNAME_TO_SHORT . "</div>";
								}
								else if($this -> _['usernameExists']) {
									echo "<div class=\"loginError\">" . LANG_REGISTER_ERR_USERNAME_EXISTS . "</div>";
								} ?>
								<label style="cursor: default">Passwort:</label><br />
								<input 
									type="password" 
									name="password" 
									class="text
									<?php if($this -> _['passwordEmpty'] || $this -> _['passwordUnequal'] || $this -> _['passwordToShort']) {
										echo " error";
									} ?>"
									placeholder="••••••••" /><br />
								<?php if($this -> _['passwordEmpty']) {
									echo "<div class=\"loginError\">" . LANG_REGISTER_ERR_NO_PASSWORD . "</div>";
								}
								else if($this -> _['passwordToShort']) {
									echo "<div class=\"loginError\">" . LANG_REGISTER_ERR_PASSWORD_TO_SHORT . "</div>";
								} ?>
								<label style="cursor: default">Passwort wiederholen:</label><br />
								<input 
									type="password" 
									name="passwordRepeat" 
									class="text
									<?php if($this -> _['passwordRepeatEmpty'] || $this -> _['passwordUnequal'] || $this -> _['passwordToShort']) {
										echo " error";
									} ?>"
									placeholder="••••••••" /> <br />
								<?php if($this -> _['passwordRepeatEmpty']) {
									echo "<div class=\"loginError\">" . LANG_REGISTER_ERR_NO_PASSWORD_REPEAT . "</div>";
								} ?>
								<?php if($this -> _['passwordUnequal']) {
									echo "<div class=\"loginError\">" . LANG_REGISTER_ERR_PASSWORD_UNEQUAL . "</div>";
								} ?>
								<input type="submit" name="submit_register" value="<?php echo LANG_REGISTER; ?>" />
							<?php 
							} ?>
						</div>
					</form>