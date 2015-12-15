<div class="w3-center">
	<h3>This is the registration page</h3>
	<form action="<?php echo $register; ?>" method="POST">
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
