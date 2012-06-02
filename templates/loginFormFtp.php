				<form id="tab_ftp" class="tab_content" method="post">
					<div id="login">
						<?php 
						if(   $this -> _['domainEmpty'] 
						   || $this -> _['badDomain']
						   || $this -> _['portEmpty'] 
						   || $this -> _['badPort']
						   || $this -> _['usernameEmpty']
						   || $this -> _['passwordEmpty']
						   || $this -> _['ftpError']) {
							echo "<div class=\"error\">";
							echo LANG_LOGIN_ERR;
							echo "<ul>";
							
							if($this -> _['domainEmpty']) {
								echo "<li>" . LANG_LOGIN_ERR_NO_DOMAIN . "</li>";
							}
							if($this -> _['badDomain'] && !$this -> _['domainEmpty']) {
								echo "<li>" . LANG_LOGIN_ERR_BAD_DOMAIN . "</li>";
							}
							if($this -> _['badPort']) {
								echo "<li>" . LANG_LOGIN_ERR_BAD_PORT . "</li>";
							}								
							if($this -> _['usernameEmpty']) {
								echo "<li>" . LANG_LOGIN_ERR_NO_USER . "</li>";
							}
							if($this -> _['passwordEmpty']) {
								echo "<li>" . LANG_LOGIN_ERR_NO_PASSWORD . "</li>";
							}
							if($this -> _['ftpError']) {
								echo "<li>" . $this -> _['ftpError'] . "</li>";
							}
							
							echo "</ul>";								
							echo "</div>";
						}
						?>
						<label>Domain / IP:</label><br />
						<input 
							type="text" 
							name="domain" 
							class="text
							<?php if($this -> _['domainEmpty'] || $this -> _['badDomain']) {
								echo " error";
							} ?>"
							<?php if(isset($this -> _['domain'])) {
								echo "value=\"{$this -> _['domain']}\"";
							} ?> 
							style="width: 160px"
							placeholder="www.example.com" />
						<input 
							type="text" 
							name="port" 
							class="text
							<?php if($this -> _['portEmpty'] || $this -> _['badPort']) {
								echo " error";
							} ?>"
							<?php if(isset($this -> _['port']) && $this -> _['port'] != 21) {
								echo "value=\"{$this -> _['port']}\"";
							} ?> 
							maxlength="5"
							style="width: 50px; float: right" 
							placeholder="21" /><br />
						<label>Username:</label><br />
						<input 
							type="text" 
							name="username" 
							class="text
							<?php if($this -> _['usernameEmpty']) {
								echo " error";
							} ?>"
							<?php if(isset($this -> _['username'])) {
								echo "value=\"{$this -> _['username']}\"";
							} ?> 
							style="width: 230px" 
							placeholder="Steve Jobs" /><br />
						<label>Passwort:</label><br />
						<input 
							type="password" 
							name="password" 
							class="text
							<?php if($this -> _['passwordEmpty']) {
								echo " error";
							} ?>"
							<?php if(isset($this -> _['password'])) {
								echo "value=\"{$this -> _['password']}\"";
							} ?> 
							style="width: 230px" 
							placeholder="••••••••" />
						<table>
							<tr style="height: 20px">
								<td>
									<input 
										type="checkbox" 
										id="ssl" 
										<?php
    										if ($this -> _['sslEnabled'])
    										    echo "checked=\"checked\"";
										?>
										name="ssl" />
								</td>
								<td>
									<label 
										class="pointer" 
										for="ssl"><?php echo LANG_SSL_LOGIN; ?></label>
								</td>
							</tr>
						</table>
						<input 
							type="submit" 
							name="submit_ftp" 
							value="<?php echo LANG_LOGIN; ?>" />
					</div>
				</form>