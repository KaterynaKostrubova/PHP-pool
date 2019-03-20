<?php require_once('main.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="description" content="Best Farm Products ever!">
	<title>Cat's shop</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/new-style.css">
</head>

<body>
	<div class="wrapper">
		<div class="top-part">
			<?php include('header.php'); ?>

			<?php if (!$_GET) {
				echo '<div class="coverimg"><h1>You can<br>make the cat<br>happier!</h1></div>';
			}?>
		</div>
		<div class="content ms-small">
			<div class="products-row">
				<?php foreach($products as $product) {?>
					<div class="product-card">
						<div class="product-thumbnail">
							<img src="<?php echo $product['img'];?>" alt="">
							<div class="caption">
								<div class="product-price"><h2>&dollar;<?php echo $product['price'];?></h2></div>
								<div class="product-title"><h1><?php echo $product['title'];?></h1></div>
								<div class="product-intro"><h4><?php echo $product['intro'];?></h4></div>
								<div class="button">
								<a href="cart.php?item=<?php echo $product['id']; ?>"><button class="buy">BUY</button></a>
								<a href="cart.php?additem=<?php echo $product['id']; ?>"><button class="buy">Add to cart</button></a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>

</html>
