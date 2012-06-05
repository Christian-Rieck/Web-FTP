		    <ul>
		    <?php
    		    if ($this -> _['currentDir'] != "/") {
        		    echo "<li class=\"directory\">";
        		    echo "<div class=\"directoryIcon\">&nbsp;</div>";
        		    echo "<div class=\"directoryName\">..</div>";
        		    echo "<div class=\"fileTools\">";
                    echo "<div class=\"indicator\">&nbsp;</div>";
                    echo "</div>";
        		    echo "<div class=\"clear\"></div>"; 
        		    echo "</li>\n";
    		    }
                foreach($this -> _['fileList'] as $file => $value) {
                    echo "<li";
                    if ($value['type'] == "Dir") {
                        echo " class=\"directory\"";
                        echo "><div class=\"infoPopover directoryIcon\">&nbsp;</div>";
                        echo "<div class=\"directoryName\">" . $file . "</div>";
                        echo "<div class=\"fileTools\">";
                        echo "<div class=\"indicator\">&nbsp;</div>";
                        echo "</div>";
                    }
                    if ($value['type'] == "File") {
                        echo "><div class=\"infoPopover directoryIcon\" style=\"background-image: none\">&nbsp;</div>";
                        echo "<div class=\"fileName\">" . $file . "</div>";
                        echo "<div class=\"fileTools\">";
                        echo "<div class=\"indicator\">&nbsp;</div>";
                        echo $value['size'] . "</div>";
                    }
                    echo "<div class=\"clear\"></div>"; 
                    echo "</li>\n";   
                }
            ?>
		    </ul>
	
<script type="text/javascript">
$(document).ready(function() {

	$(".directoryName").click(function() {
	
		directoryName = $(this).html();
		$(this).parent().find(".indicator").fadeIn();	
		$.get(ROOT + "Ajax/FtpDirectory/&directory=" + directoryName, function(data)
		{
		    var currentDir = $(".window .head .text").html();
			$(".mainpart").hide();
			$(".mainpart").html(data);
			$(".window .head .text").hide();
			if (directoryName != "..") {
			    if (currentDir != "/") {
    			    $(".window .head .text").html(currentDir + "/" + directoryName);
                } else {
                    $(".window .head .text").html(currentDir + directoryName);
                }
            } else {
                if (currentDir.lastIndexOf("/") != 0) {
                    $(".window .head .text").html(currentDir.substr(0, currentDir.length - (currentDir.length - currentDir.lastIndexOf("/"))))
                } else {
                    $(".window .head .text").html("/");
                }
            }	
			$(".window .head .text").fadeIn();		
			$(".mainpart").fadeIn();		
	    });
	});
});
</script>