	<div class="window">
		<div class="head">
			<div class="text"><?php echo $this -> _['currentDir']; ?></div>
			<div class="background"></div>
		</div>
		
		<div class="mainpart">
		    <ul>
		    <?php
    		    if ($this -> _['currentDir'] != "/") {
        		    echo "<li class=\"directory\"><div class=\"directoryName\">..</div></li>\n";
    		    }
                foreach($this -> _['fileList'] as $file => $value) {
                    echo "<li";
                    if ($value['type'] == "Dir") {
                        echo " class=\"directory\"";
                        echo "><div class=\"directoryName\">";
                        echo $file . "</div>";
                    }
                    if ($value['type'] == "File") {
                        echo "><div class=\"fileName\">";
                        echo $file . "</div>";
                        echo "<div class=\"fileSize\">" . $value['size'] . "</div>";
                        echo "<div class=\"clear\"></div>"; 
                    }
                    echo "</li>\n";   
                }
            ?>
		    </ul>
		</div>
	</div>
	
<script type="text/javascript">
$(document).ready(function() {

	$(".directoryName").click(function() {
	
		directoryName = $(this).html();		
		$.get(ROOT + "Ajax/FtpDirectory/&directory=" + directoryName, function(data)
		{
			$("#center").hide();
			$("#center").html(data);
			$("#center").fadeIn();		
	    });
	});
});
</script>