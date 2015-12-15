<div class="w3-center">
	<h3>This is the log in page</h3>
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
