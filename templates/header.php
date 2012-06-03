<!DOCTYPE html>
<html>

	<head>
		<title><?php echo $this -> _['headerTitle']; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT . "resources/css/" . $this -> _['stylesheet']; ?>">
		
		<?php if ($this -> _['topMenu']) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>resources/css/topMenu.css">
		<?php } ?>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>		
		<script type="text/javascript" src="<?php echo ROOT . "resources/js/" . $this -> _['javascript']; ?>"></script>
		<script type="text/javascript">
			ROOT = "<?php echo ROOT; ?>";
		</script>
	</head>
	
	<body>
		<?php if ($this -> _['topMenu']) { ?>
			<div id="topMenu">
				<div class="bar">
					<div class="content">
						<ul><?php
						
						foreach($this -> _['topMenus'] as $key => $value) {
							echo "<li tag=\"{$key}\"" . ($value['bold'] ? " class=\"bold\"" : "") . ">{$value['text']}</li>";
						}
						
						?></ul>
					</div>
					<div class="hider"><div class="background"></div></div>
				</div>
				<div class="menu">
					<div>
						<?php
							foreach($this -> _['topMenus'] as $key => $value) {
								echo "<ul id=\"tm_{$key}\" class=\"hidden\">";
								
								foreach($value['content'] as $ukey => $uvalue) {
									if ($ukey != "-")
										echo "<li tag=\"{$ukey}\">{$uvalue['text']}</li>";
									else
										echo "<li class=\"spacer\"><hr /></li>";
								}
								
								echo "</ul>";
							}
						?>
					</div>
				</div>
			</div>
		<?php } ?>
		<center id="center">
