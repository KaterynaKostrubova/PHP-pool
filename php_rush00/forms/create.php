<!DOCTYPE html>
<html>

<head>
	<title>Create an account!</title>
	<link rel="stylesheet" href="../css/form.css">
	<link rel="stylesheet" href="../css/new-style.css">
</head>

<body>
	<div class="form ms-small">
		<div class="top-bar">
			<span><a href="../index.php" class="close">&#11013;</a></span>
			Account setup
		</div>
		<p class="error">
			<?php
				if ($_GET['loginErr'] == 1)
					echo "Check the input fields!";
				else if ($_GET['loginErr'] == 2)
					echo "User with same account login exists. Please change your login!";
			?>
		</p>
		<form action="na_creation.php" method="post">
			<input class="ms-small ms-hover-modal" type="text" name="login" value="<?php echo $_GET['login']; ?>" placeholder="Username" /><br />
			<input class="ms-small ms-hover-modal" type="password" name="passwd" value="" placeholder="Password" /><br />
			<input class="ms-small ms-hover-modal" type="text" name="address" value="<?php echo $_GET['address']; ?>" placeholder="&Delta; address" /><br />
			<input class="ms-small ms-hover-modal" type="email" name="email" value="<?php echo $_GET['email']; ?>" placeholder="&commat; email" /><br />
			<input class="ms-small ms-hover-modal" id="butt" type="submit" name="submit" value="OK" />
		</form>
	</div>
</body>

</html>
