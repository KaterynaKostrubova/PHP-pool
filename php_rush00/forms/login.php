<!DOCTYPE html>
<html>

<head>
	<title>Log in!</title>
	<link rel="stylesheet" href="../css/form.css">
	<link rel="stylesheet" href="../css/new-style.css">
</head>

<body>
	<div class="form ms-small">
		<div class="top-bar">
			<span><a href="../index.php" class="close">&#11013;</a></span>
			Logging in
		</div>
		<p class="main_text">Sign in!</p>
		<p class="middle_text">...or you can <a href="create.php">create an account</a><br />
		or <a href="change_pass.php">change password to an existing account</a></p>
		<p class="error">
			<?php
				if ($_GET['loginErr'] == 1)
					echo "Check the input fields!";
			?>
		</p>
		<form action="lg_in.php" method="post">
			<input class="ms-small ms-hover-modal" type="text" name="login" value="<?php echo $_GET['login']; ?>" placeholder="Username" /><br />
			<input class="ms-small ms-hover-modal" type="password" name="passwd" value="" placeholder="Password" /><br />
			<input class="ms-small ms-hover-modal" id="butt" type="submit" name="submit" value="OK" />
		</form>
	</div>
</body>

</html>
