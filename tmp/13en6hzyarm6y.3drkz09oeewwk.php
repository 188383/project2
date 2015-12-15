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
	<h3>Join Our Network</h3>
	<form action="<?php echo $register; ?>" method="post">
		<p>
			<input name="username" type="email"></input><br/>
			<label for="username">username</input>
		</p>
		<p>
			<input name="password"></input><br/>
			<label for="password">password</label>
		</p>
		<p>
			<input name="firstname" type="text"></input><br/>
			<label for="firstname">first name</label>
		</p>
		<p>
			<input name="lastname" type="text"></input><br/>
			<label for="lastname">last name</label>
		</p>
			<button type="submit">register</button>
	</form>
</div>


</section>

<footer id="main-footer">
<?php echo $this->render($foot,$this->mime,get_defined_vars()); ?>
</footer>
</body>
</html>
