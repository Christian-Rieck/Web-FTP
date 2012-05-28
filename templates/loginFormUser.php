				<form id="tab_user" class="tab_content" method="post">
					<div id="login">
						<?php 
						if(	  $this -> _['loginFailed'] 
						   || $this -> _['usernameEmpty'] 
						   || $this -> _['passwordEmpty']) {
							echo "<div class=\"error\">";
							echo LANG_LOGIN_ERR;
							echo "<ul>";
							
							if($this -> _['loginFailed']) {
								echo "<li>" . LANG_LOGIN_ERR_BAD_USER_OR_PASSWORD . "</li>";
							}								
							if($this -> _['usernameEmpty']) {
								echo "<li>" . LANG_LOGIN_ERR_NO_USER . "</li>";
							}
							if($this -> _['passwordEmpty']) {
								echo "<li>" . LANG_LOGIN_ERR_NO_PASSWORD . "</li>";
							}
							
							echo "</ul>";								
							echo "</div>";
						}
						?>
						<label>Username:</label><br />
						<input 
							type="text" 
							name="username" 
							placeholder="Steve Jobs" 
							class="text
							<?php if($this -> _['usernameEmpty'] || $this -> _['loginFailed']) {
								echo " error";
							} ?>"
							<?php if(isset($this -> _['username'])) {
								echo "value=\"{$this -> _['username']}\"";
							} ?>
							/><br />
						<label>Passwort:</label><br />
						<input 
							type="password" 
							name="password" 
							placeholder="••••••••" 
							class="text
							<?php if($this -> _['passwordEmpty'] || $this -> _['loginFailed']) {
								echo " error";
							} ?>" 
							/><br />
						<input 
							type="submit" 
							name="submit_user" 
							value="<?php echo LANG_LOGIN; ?>" />
					</div>
				</form>