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
				<div class="content">
					<ul class="bar">
						<li value="ucp"><b>UCP</b></li>
						<li value="connections">Verbindungen</li>
						<li value="help">Hilfe</li>
					</ul>
				</div>
				<div class="menu">
					<div></div>
				</div>
				<div class="hider"><div class="background"></div></div>
			</div>
		<?php } ?>
		<center>
