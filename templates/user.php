<script type="text/javascript">
	$(document).ready(function() {
		$(".item").click(function() {
			i = $(this);
			p = i.parent();
			
			p.children(".checked").removeClass("checked");
			
			i.addClass("checked");
			
			p.children(".triangle").animate({
					top: i.index() * 70 + 24
				} , 500);
		});
	});
</script>

	<div class="window">
		<div class="head">User Control Panel</div>
		
		<div class="mainpart">
			<div class="menu">
				<div class="item checked">
					<div class="content">
						<div class="icon"></div>
						Survey
					</div>
				</div>
				<div class="item">
					<div class="content">
						<div class="icon"></div>
						History
					</div>
				</div>
				<div class="item">
					<div class="content">
						<div class="icon"></div>
						Server
					</div>
				</div>
				<div class="item">
					<div class="content">
						<div class="icon"></div>
						Settings
					</div>
				</div>
				<div class="triangle"></div>
			</div>
		</div>
	</div>