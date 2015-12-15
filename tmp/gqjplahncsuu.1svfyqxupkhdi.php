<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="<?php echo $SCHEME.'://'.$HOST.':'.$PORT.$BASE.'/'; ?>" />
		<link rel="stylesheet" href="lib/code.css" type="text/css" />
		<link rel="stylesheet" href="ui/css/base.css" type="text/css" />
		<link rel="stylesheet" href="ui/css/theme.css" type="text/css" />
	</head>
	<body>
	<header>
		
	</header>	
		<div class="content">
			<?php echo $this->render($inc,$this->mime,get_defined_vars()); ?>
		</div>
	</body>
</html>
