				<form id="tab_ftp" class="tab_content" method="post">
					<div id="login">
						<?php
							if (isset($fehler) && $fehler == true)
								echo "<div style=\"margin-bottom:10px; color:red; font-size:12px\">" . $fehlermeldung . "</div";
						?>
						<label>(FTP-)Domain:</label><br />
						<input 
							type="text" 
							name="domain" 
							class="text" 
							style="width: 160px"
							placeholder="www.example.com" />
						<input 
							type="text" 
							name="port" 
							class="text" 
							maxlength="5"
							style="width: 50px; float: right" 
							placeholder="21" /><br />
						<label>Username:</label><br />
						<input 
							type="text" 
							name="username" 
							class="text" 
							style="width: 230px" 
							placeholder="Steve Jobs" /><br />
						<label>Passwort:</label><br />
						<input 
							type="password" 
							name="password" 
							class="text" 
							style="width: 230px" 
							placeholder="••••••••" />
						<table>
							<tr style="height: 20px">
								<td>
									<input 
										type="checkbox" 
										id="ssl" 
										name="ssl" />
								</td>
								<td>
									<label 
										class="pointer" 
										for="ssl"><?php echo LANG_SSL_LOGIN; ?></label>
								</td>
							</tr>
							<tr style="height: 20px">
								<td>
									<input 
										type="checkbox" 
										id="anonymous" 
										name="anonymous" />
								</td>
								<td>
									<label 
										class="pointer" 
										for="anonymous"><?php echo LANG_ANONYMOUS_LOGIN; ?></label>
								</td>
							</tr>
						</table>
						<input 
							type="submit" 
							name="submit_ftp" v
							value="<?php echo LANG_LOGIN; ?>" />
					</div>
				</form>