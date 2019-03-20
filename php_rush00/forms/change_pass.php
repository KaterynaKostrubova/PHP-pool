<!DOCTYPE html>

<html>
<head>
	<title>Change password!</title>
	<link rel="stylesheet" href="../css/form.css">
	<link rel="stylesheet" href="../css/new-style.css">
</head>

<body>
	<div class="form ms-small">
		<div class="top-bar">
			<span><a href="../index.php" class="close">&#11013;</a></span>
			Change your password
		</div>
		<p class="error">
			<?php
				if ($_GET['loginErr'])
					echo "Check the input fields!";
			?>
		</p>
		<form action="chn_ps.php" method="post">
			<input class="ms-small ms-hover-modal" type="text" name="login" value="" placeholder="Username" /><br />
			<input class="ms-small ms-hover-modal" type="password" name="oldpasswd" value="" placeholder="Old Password" /><br />
			<input class="ms-small ms-hover-modal" type="password" name="passwd" value="" placeholder="New Password" /><br />
			<input class="ms-small ms-hover-modal" type="password" name="newpasswd" value="" placeholder="Type New Password again" /><br />
			<input class="ms-small ms-hover-modal" id="butt" type="submit" name="submit" value="OK" />
		</form>
	</div>
</body>

</html>
