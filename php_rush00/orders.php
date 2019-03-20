<?php
	require_once('main.php');

	$orders = array();
	$sql = 'SELECT * FROM `orders` WHERE `username` = "' . $_SESSION['loggued_on_user'] . '"';
	if ($result = mysqli_query($conn, $sql)) {
		while ($tmp = mysqli_fetch_assoc($result)) {
			$orders[] = $tmp;
		}
		mysqli_free_result($result);
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Cart</title>
	<link rel="stylesheet" href="css/new-style.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/cart.css">
	<script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
	<?php require_once('header.php'); ?>

	<div class="content">
		<?php if (!$orders) { ?>
			<h2>Seems like you have not do any orders in our store before :(((</h2>
			<h3>Please visit: <a href="index.php">Main Page of our site</a> and correct this injustice!</h3>
		<?php } ?>


		<?php foreach($orders as $order) { ?>
			<div class="drop-down-list ms-small ms-hover">
				<span>&#9654;</span><!-- &#9660; -->
				<p><?php print("Order No " . $order['id_ord'] . ' to ' . $order['address']); ?></p>
				<div class="pro-info">
					<?php
						$ord = array();
						$sql = 'SELECT * FROM orderno_' . $order['id_ord'];
						if ($result = mysqli_query($conn, $sql)) {
							while ($tmp = mysqli_fetch_assoc($result)) {
								$ord[] = $tmp;
							}
							mysqli_free_result($result);
						}
					?>

					<table>
						<th>Title</th>
						<th>Price per piece</th>
						<th>Quantity</th>
						<th>Total price</th>
						<?php foreach($ord as $val) { ?>
							<tr>
								<td><?php echo $val['title']; ?></td>
								<td><?php echo $val['price']; ?></td>
								<td><?php echo $val['quantity']; ?></td>
								<td><?php echo $val['price'] * $val['quantity']; ?></td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		<?php } ?>
	</div>

	<footer>
		<script src="js/orders.js"></script>
	</footer>

</body>

</html>
<!-- echo '<pre>';
print_r($val);
echo '</pre>'; -->
