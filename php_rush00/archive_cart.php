<?php
	require_once('main.php');

	$id_ord = rand(0, 2147483647);
	foreach ($users as $val) {
		if ($val['username'] == $_SESSION['loggued_on_user']) {
			// Создаем таблицу заказов
			$sql = "CREATE TABLE IF NOT EXISTS orders (
					id_ord INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
					username VARCHAR(255) NOT NULL,
					email VARCHAR(255),
					address VARCHAR(255)
			)";
			if (!mysqli_query($conn, $sql)) {
				die("Error creating order: " . mysqli_error($conn));
			}

			$sql = "INSERT INTO orders (id_ord, username, email, address)
					VALUES ($id_ord, '" . $val['username'] . "', '" . $val['email'] . "', '" . $val['address'] . "')";
			if (!mysqli_query($conn, $sql)) {
				die("Error filling users: " . mysqli_error($conn));
			}
			break ;
		}
	}

	$ord_name = "orderno_$id_ord";

	$sql = "CREATE TABLE $ord_name (
		id_ord INT(11) UNSIGNED NOT NULL,
		title VARCHAR(255) NOT NULL,
		price VARCHAR(255) NOT NULL,
		quantity INT(11) NOT NULL)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating order: " . mysqli_error($conn));
	}

	foreach($_SESSION['cart'] as $key => $val) {
		$title = $products[$key]['title'];
		$price = $products[$key]['price'];
		$quantity = $val['quantity'];
		
		$sql = "INSERT INTO $ord_name (id_ord, title, price, quantity)
		VALUES ($id_ord, '$title', '$price', $quantity)";
		if (!mysqli_query($conn, $sql)) {
			die("Error creating order: " . mysqli_error($conn));
		}
	}
	$_SESSION['cart'] = "";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Cart</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/cart.css">
</head>

<body>
	<?php require_once('header.php'); ?>

	<div class="cart_main">
		<h2>Your cart has been succesfully validated!</h2>
		<h3>You can watch out your orders via <a href="orders.php"><button class="cart"><img src="https://cdn.onlinewebfonts.com/svg/img_536022.png"></button></a></h3>
		<a href="index.php"><h3>Main Page of our site</h3></a>
	</div>
</body>

</html>
