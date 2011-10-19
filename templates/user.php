<script type="text/javascript">
	$(document).ready(function() {
		$(".item").click(function() {
			var i, p, c, oi, ni;
			
			i = $(this);
			p = i.parent();
			c = p.children(".checked");
			oi = c.children(".content").children(".icon");
			ni = i.children(".content").children(".icon");
			
			c.removeClass("checked");
			
			oi.css("background-image", oi.css("background-image").replace("/active/", "/inactive/"));
			
			i.addClass("checked");
			
			ni.css("background-image", ni.css("background-image").replace("/inactive/", "/active/"));
			
			p.children(".triangle").animate({
					top: i.index() * 70 + 24
				}, 500);
		});
	});
</script>

	<div class="window">
		<div class="head">
			<div class="text">User Control Panel</div>
			<div class="background"></div>
		</div>
		
		<div class="mainpart">
			<div class="menu">
				<div class="item checked">
					<div class="content">
						<div class="icon" style="background: url('<?php echo ROOT . "resources/images/menu/active/overview.png"; ?>') no-repeat center center;"></div>
						Overview
					</div>
				</div>
				<div class="item">
					<div class="content">
						<div class="icon" style="background: url('<?php echo ROOT . "resources/images/menu/inactive/history.png"; ?>') no-repeat center center;"></div>
						History
					</div>
				</div>
				<div class="item">
					<div class="content">
						<div class="icon" style="background: url('<?php echo ROOT . "resources/images/menu/inactive/server.png"; ?>') no-repeat center center;"></div>
						Server
					</div>
				</div>
				<div class="item">
					<div class="content">
						<div class="icon" style="background: url('<?php echo ROOT . "resources/images/menu/inactive/settings.png"; ?>') no-repeat center center;"></div>
						Settings
					</div>
				</div>
				<div class="triangle"></div>
			</div>
		</div>
	</div>