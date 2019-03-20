<!DOCTYPE html>
<html>

<head>
	<title>Database setup form</title>
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/new-style.css">
</head>

<body>
	<div class="form ms-small">
		<div class="top-bar">Database setup</div>
		<p class="main_text">Set-up your own eshop!</p>
		<p class="middle_text"></p>
		<p class="error"></p>
		<form action="install.php" method="post">
			<input class="ms-small ms-hover-modal" type="text" name="msqlogin" value="<?php echo $_GET['msqlogin']; ?>" placeholder="Mysql Login" /><br />
			<input class="ms-small ms-hover-modal" type="password" name="msqpasswd" value="<?php echo $_GET['msqpasswd']; ?>" placeholder="Mysql Password" /><br />
			<input class="ms-small ms-hover-modal" type="text" name="dbname" value="" placeholder="Name of the new Mysql database" /><br />
			<input class="ms-small ms-hover-modal" id="butt" type="submit" name="submit" value="OK" />
		</form>
	</div>
</body>

</html>
