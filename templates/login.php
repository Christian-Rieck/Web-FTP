		<center>
			<div id="loginBox">
			
				<div id="tabDiv">
					<ul class="tabs">
						<li><a id="loginTabFtp" onclick="loginForm('ftp')" class="href tabs<?php echo $this -> _['activeFtp']; ?>">FTP</a></li>
						<li><a id="loginTabUser" onclick="loginForm('user')" class="href tabs<?php echo $this -> _['activeUser']; ?>">User</a></li>
						<li><a id="loginTabRegister" onclick="loginForm('register')" class="href tabs<?php echo $this -> _['activeRegister']; ?>">Registrieren</a></li>
					</ul>
				</div>
				
				<div id="formBox">
				<?php echo $this -> _['formBox']; ?>
				</div>
				
			</div>
		</center>