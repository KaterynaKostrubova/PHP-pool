<?php require_once('main.php'); ?>
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
		<?php if (!$products) { ?>
			<h2>There are no products, master :((</h2>
		<?php } ?>

		<div class="drop-down-list ms-small ms-hover">
			<table class="hidd-table">
				<th>Image</th>
				<th>Category</th>
				<th>Title</th>
				<th>Price</th>
				<th>Intro</th>
				<?php foreach($products as $product) { ?>
					<!-- <?php echo '<pre>';
					print_r($product);
					echo '</pre>'; ?> -->
					<tr>
						<td><img src="<?php echo $product['img']; ?>" /></td>
						<td><?php echo $product['category']; ?></td>
						<td><?php echo $product['title']; ?></td>
						<td class="price">&dollar;<?php echo $product['price']; ?></td>
						<td><?php echo $product['intro']; ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>

	<footer>
		<script src="js/orders.js"></script>
	</footer>

</body>

</html>
