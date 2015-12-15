<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="<?php echo $SCHEME.'://'.$HOST.':'.$PORT.$BASE.'/'; ?>" />
		<!--<link rel="stylesheet" href="lib/code.css" type="text/css" />
		<link rel="stylesheet" href="ui/css/base.css" type="text/css" />
		<link rel="stylesheet" href="ui/css/theme.css" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></link>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"></link>
		<link rel="stylesheet" href="ui/js/ui/jquery-ui.css"></link>
		<link rel="stylesheet" href="ui/js/ui/jquery-ui.theme.css"></link>
		<script src="ui/js/ui/external/jquery/jquery.js"></script>
		<script src="ui/js/ui/jquery-ui.js"></script>
	
	</head>
	<body>
	<header>
		<nav class="w3-topnav w3-blue w3-padding-left-16">
			<ul>
			<?php foreach (($links?:array()) as $l): ?>
				<a href="<?php echo $l['href']; ?>"><?php echo $l['rel']; ?></a>
			<?php endforeach; ?>
			</ul>
		</nav>
	</header>	
	
		<section>
			<?php echo $this->render($inc,$this->mime,get_defined_vars()); ?>
		</section>
		
	</body>
		
</html>
