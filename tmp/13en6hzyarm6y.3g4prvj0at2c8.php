<!DOCTYPE html>
<html>
<head>
	<?php echo $this->render($head,$this->mime,get_defined_vars()); ?>
</head>
<body>
<header id="main-header">
<?php echo $this->render($mainnav,$this->mime,get_defined_vars()); ?>
</header>

<section id="main-section">

<div class="w3-center">
	<h3>Enter Credentials</h3>
	<form action="<?php echo $login; ?>" method="post">
		<p>
			<input type="email" name="username"></input>
			<label for="username">username</label>
		</p>
		<p>
			<input type="password" name="password"></input>
			<label for="password">password</input>
		</p>
		<button type="submit">Login</button><a href="<?php echo $reset; ?>" class="w3-tiny">forgot password</a>
	</form>
</div>

</section>

<footer id="main-footer">
	<?php echo $this->render($foot,$this->mime,get_defined_vars()); ?>
</footer>
</body>
</html>
