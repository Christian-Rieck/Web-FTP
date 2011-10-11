	</body>
</html>

<?php
if(isset($_POST['submit_user']) || isset($_GET['user']))
{ ?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$(".tab_content").hide();
	
			var activeTab = "#tab_user";
			var toHeight = $(activeTab).height();
					
			$(activeTab).show();
		});
	</script>
<?php 
}
else
{ ?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$(".tab_content").hide();
	
			var activeTab = "#tab_ftp";
			var toHeight = $(activeTab).height();
					
			$(activeTab).show();
		});
	</script>
<?php } ?>