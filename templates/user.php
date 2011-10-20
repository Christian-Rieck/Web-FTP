	<div class="window">
		<div class="head">
			<div class="text"><?php echo LANG_UCP_HEADER; ?></div>
			<div class="background"></div>
		</div>
		
		<div class="mainpart">
			<div class="menu">
				<div class="item checked" id="UserOverview">
					<div class="content">
						<div class="icon" style="background: url('<?php echo ROOT . "resources/images/menu/active/overview.png"; ?>') no-repeat center center;"></div>
						<?php echo LANG_UCP_MENU_OVERVIEW; ?>
					</div>
				</div>
				<div class="item" id="UserHistory">
					<div class="content">
						<div class="icon" style="background: url('<?php echo ROOT . "resources/images/menu/inactive/history.png"; ?>') no-repeat center center;"></div>
						<?php echo LANG_UCP_MENU_HISTORY; ?>
					</div>
				</div>
				<div class="item" id="UserServer">
					<div class="content">
						<div class="icon" style="background: url('<?php echo ROOT . "resources/images/menu/inactive/server.png"; ?>') no-repeat center center;"></div>
						<?php echo LANG_UCP_MENU_SERVER; ?>
					</div>
				</div>
				<div class="item" id="UserSettings">
					<div class="content">
						<div class="icon" style="background: url('<?php echo ROOT . "resources/images/menu/inactive/settings.png"; ?>') no-repeat center center;"></div>
						<?php echo LANG_UCP_MENU_SETTINGS; ?>
					</div>
				</div>
				<div class="triangle"></div>
			</div>
			<div class="content">
				<div>
					<?php echo $this -> _['content']; ?>
				</div>
			</div>
		</div>
	</div>