				<form id="tab_register" class="tab_content" method="post">
					<div id="login">
						<?php 
						if(isset($this -> _['registerSuccess']) && !$this -> _['registerSuccess']
						   || $this -> _['usernameEmpty'] 
						   || $this -> _['usernameToShort']
						   || $this -> _['usernameExists']
						   || $this -> _['passwordEmpty']
						   || $this -> _['passwordToShort']
						   || $this -> _['passwordUnequal']
						   || $this -> _['passwordRepeatEmpty'] ) {
						   
							echo "<div class=\"error\">";
							echo LANG_REGISTER_ERR;
							echo "<ul>";
							
							if(isset($this -> _['registerSuccess']) && !$this -> _['registerSuccess']) {
								echo "<li>" . LANG_REGISTER_FAILED . "</li>";
							}
							if($this -> _['usernameEmpty']) {
								echo "<li>" . LANG_REGISTER_ERR_NO_USER . "</li>";
							}								
							if($this -> _['usernameToShort']) {
								echo "<li>" . LANG_REGISTER_ERR_USERNAME_TO_SHORT . "</li>";
							}
							if($this -> _['usernameExists']) {
								echo "<li>" . LANG_REGISTER_ERR_USERNAME_EXISTS . "</li>";
							}
							if($this -> _['passwordEmpty']) {
								echo "<li>" . LANG_REGISTER_ERR_NO_PASSWORD . "</li>";
							}
							if($this -> _['passwordToShort']) {
								echo "<li>" . LANG_REGISTER_ERR_PASSWORD_TO_SHORT . "</li>";
							}								
							if($this -> _['passwordUnequal']) {
								echo "<li>" . LANG_REGISTER_ERR_PASSWORD_UNEQUAL . "</li>";
							}
							if($this -> _['passwordRepeatEmpty']) {
								echo "<li>" . LANG_REGISTER_ERR_NO_PASSWORD_REPEAT . "</li>";
							}
							
							echo "</ul>";								
							echo "</div>";					
						} 
						else if(isset($this -> _['registerSuccess']) && $this -> _['registerSuccess'])
							echo "<div class=\"success\">" . LANG_REGISTER_SUCCESS . "</div>";
						
						if( !isset($this -> _['registerSuccess']) 
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
							<label style="cursor: default">Passwort:</label><br />
							<input 
								type="password" 
								name="password" 
								class="text
								<?php if($this -> _['passwordEmpty'] || $this -> _['passwordUnequal'] || $this -> _['passwordToShort']) {
									echo " error";
								} ?>"
								placeholder="••••••••" /><br />
							<label style="cursor: default">Passwort wiederholen:</label><br />
							<input 
								type="password" 
								name="passwordRepeat" 
								class="text
								<?php if($this -> _['passwordRepeatEmpty'] || $this -> _['passwordUnequal'] || $this -> _['passwordToShort']) {
									echo " error";
								} ?>"
								placeholder="••••••••" /> <br />
							<input type="submit" name="submit_register" value="<?php echo LANG_REGISTER; ?>" />
						<?php 
						} ?>
					</div>
				</form>