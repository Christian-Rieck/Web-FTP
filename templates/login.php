		<center>
			<div id="login-box">
			
				<div id="tab_div">
					<ul class="tabs">
						<li><a id="loginTabFtp" onclick="loginForm('ftp')" class="href tabs <?php if (isset($_POST['submit_ftp'])) echo "active"; if (!isset($_POST['submit_ftp']) && !isset($_POST['submit_user']) && !isset($_GET['user'])) echo "active"; ?>">FTP</a></li>
						<li><a id="loginTabUser" onclick="loginForm('user')" class="href tabs <?php if (isset($_POST['submit_user']) || isset($_GET['user'])) echo "active"; ?>">User</a></li>
					</ul>
				</div>
				
				<div id="form-box">
				<?php echo $this -> _['formBox']; ?>
				</div>
				
			</div>
		</center>