		<center>
			<div id="login-box">
			
				<div id="tab_div">
					<ul class="tabs">
						<li><a id="loginTabFtp" onclick="loginForm('ftp')" class="href tabs<?php echo $this -> _['activeFtp']; ?>">FTP</a></li>
						<li><a id="loginTabUser" onclick="loginForm('user')" class="href tabs<?php echo $this -> _['activeUser']; ?>">User</a></li>
					</ul>
				</div>
				
				<div id="form-box">
				<?php echo $this -> _['formBox']; ?>
				</div>
				
			</div>
		</center>