	<div class="window">
		<div class="head">
			<div class="text"><?php echo $this -> _['currentDir']; ?></div>
			<div class="background"></div>
		</div>
		
		<div class="mainpart">
		    <ul>
		    <?php
                foreach($this -> _['fileList'] as $file => $value) {
                    echo "<li";
                    if ($value['type'] == "Dir") {
                        echo " class=\"directory\"";
                    }
                    echo ">" . $file . "</li>";    
                }
            ?>
		    </ul>
		</div>
	</div>

<pre>
<p align="left">
<?php var_dump($this -> _['fileList']); ?>
</p>
</pre>