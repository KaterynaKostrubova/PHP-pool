<div class="adm">
	<?php
		$login = true;
		foreach ($users as $val) {
			if ($val[username] == $_SESSION['loggued_on_user']) {
				echo '<span class="h_span">Logged as ' . $_SESSION['loggued_on_user'] . '</span>';
				echo '<a href="forms/logout.php"><button class="headBtn">log out</button></a>';
				if ($val[isadmin]) {
					echo '<a href="adm.php"><button class="headBtn">ADM</button></a>';
					echo '<a href="http://localhost:8080/phpmyadmin/db_structure.php?db=' . $cont[2] . '"><button class="headBtn">phpmyadmin</button></a>';
				}
				$login = false;
				break ;
			}
		}
		if ($login) { ?>
			<a href="forms/login.php"><button class="headBtn">Log in!</button></a>
			<a href="forms/create.php"><button class="headBtn">Create an account</button></a>
		<?php } ?>
		<a href="orders.php"><button class="cart"><img src="https://cdn.onlinewebfonts.com/svg/img_536022.png"></button></a>
		<a href="cart.php"><button class="cart"><img src="http://www.free-icons-download.net/images/shopping-cart-icon-7881.png"></button></a>
</div>

<header> 
	<nav class="navbar" role="navigation">
		<div class="logo">
			<a href="index.php"><p>Cat's Shop</p></a>
		</div>
		<div class="header-categories">
			<?php
				foreach($categories as $category) {
					echo ' <a href="?cat=' . $category['id'] . '" class="list-group-item">' . $category['title'] . '</a>';
				}
			?>
		</div>
	</nav>
</header>
