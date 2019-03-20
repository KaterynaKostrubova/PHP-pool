<?php
	if ($_POST["msqlogin"] == false || $_POST["msqpasswd"] == false || $_POST["dbname"] == false  || $_POST["submit"] != "OK") {
		exit("BAD INPUT" . PHP_EOL);
	}
	// echo "Connection died(maybe you have already created a new database?)".PHP_EOL;
	$servername = "localhost";
	$username = $_POST['msqlogin'];
	$password = $_POST['msqpasswd']; //Пароль mysql, который ты задавал при установке МАМПА
	$dbname = $_POST['dbname'];

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Удаляем старую БД
	unlink('shopdb.csv');
	$sql = "DROP DATABASE IF EXISTS $dbname";
	mysqli_query($conn, $sql);
	// if (!mysqli_query($conn, $sql)) {
	// 	die("Error dropping db: " . mysqli_error($conn));
	// }
	// Создаем БД
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating database: " . mysqli_error($conn));
	}
	mysqli_close($conn);
	
	//Подключаемся к БД
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// Создаем таблицу категории
	$sql = "CREATE TABLE IF NOT EXISTS categories (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			title VARCHAR(255) NOT NULL
			)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating categories: " . mysqli_error($conn));
	}

	// Наполняем таблицу категорий
	$sql = "INSERT INTO categories (id, title)
			VALUES (1, 'Black'), (2, 'White'), (3, 'Red')";
	if (!mysqli_query($conn, $sql)) {
		die("Error filling categories: " . mysqli_error($conn));
	}

	// Создаем таблицу продуктов
	$sql = "CREATE TABLE IF NOT EXISTS products (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			title VARCHAR(255) NOT NULL,
			img VARCHAR(255) DEFAULT NULL,
			category VARCHAR(255) DEFAULT NULL,
			intro text NOT NULL,
			price DECIMAL(10,0) NOT NULL
			)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating products: " . mysqli_error($conn));
	}

	// Наполняем таблицу продуктов
	$sql = "INSERT INTO products (id, title, img, intro, price, category)
			VALUES (1, 'Dusia', 'https://static.tbdcdn.com/uploads/2016/02/17/sub/75918-large-296708.jpg', 'Very good cat!!!', '15', 'Black'),
			(2, 'Oliver', 'https://avatars.mds.yandex.net/get-pdb/163339/3ed630f1-5781-40dd-8ba2-a3ff7ac1c85b/s1200', 'Mrrrr', '13', 'Black'),
			(3, 'Simba', 'https://i.pinimg.com/originals/55/6a/fc/556afca830d3ee27cf083ada67039f17.jpg', 'I like milk', '50', 'White'),
			(4, 'Tigger', 'https://www.iizcat.com/uploads/2016/06/pt9mg-pb4.JPG', 'I am so cute', '7', 'Red'),
			(5, 'Lucy', 'https://themeowthing.com/wp-content/uploads/2017/11/100-Unique-Black-Cat-Names-To-Know-For-The-First-Time5.jpg', 'I like to sleep', '30', 'Black'),
			(6, 'Shroedinger `s cat', 'https://media.mnn.com/assets/images/2015/02/catinabox.jpg.653x0_q80_crop-smart.jpg', 'I am alive!!!', '20', 'Black'),
			(7, 'Princess', 'https://ae01.alicdn.com/kf/HTB1DqO3NXXXXXbDaXXXq6xXFXXXm/simulation-white-cat-model-plastic-fur-handicraft-21x16-cm-right-prone-cat-with-yellow-head-home.jpg', 'I am princess, It’s obvious', '15', 'White'),
			(8, 'Bella', 'https://vignette.wikia.nocookie.net/roseclan-roleplaying/images/2/29/Red-cat.jpg/revision/latest?cb=20140830030726', 'I princess too!', '42', 'Red'),
			(9, 'Simon', 'https://img.buzzfeed.com/buzzfeed-static/static/2013-10/enhanced/webdr06/29/14/enhanced-buzz-orig-25698-1383070842-15.jpg?downsize=700:*&output-format=auto&output-quality=auto', 'I am happy', '9', 'Black')";
	if (!mysqli_query($conn, $sql)) {
		die("Error filling products: " . mysqli_error($conn));
	}
	// Создаем таблицу категорий продуктов для связи и заполняем ее в формате:
	// (id категории, id товара)
	$sql = "CREATE TABLE IF NOT EXISTS categories_products (
			id_category INT(11) NOT NULL, 
			id_product INT(11) NOT NULL,
			PRIMARY KEY (id_category, id_product)
			)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating categories_products: " . mysqli_error($conn));
	}
	$sql = "INSERT INTO categories_products (id_category, id_product)
			VALUES (1, 1), (2, 2), (3, 3), (1, 6), (2, 4), (3, 5), (1, 7), (2, 9), (3, 8)";
	if (!mysqli_query($conn, $sql)) {
		die("Error filling categories: " . mysqli_error($conn));
	}

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

	// Создаем таблицу юзеров и добавляем админа
	$sql = "CREATE TABLE IF NOT EXISTS users (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			username VARCHAR(255) NOT NULL,
			password TEXT NOT NULL,
			isadmin BOOLEAN NOT NULL,
			email VARCHAR(255),
			address VARCHAR(255)
			)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating users: " . mysqli_error($conn));
	}
	$adminPass = hash('whirlpool', 'admin');
	$sql = "INSERT INTO users (id, username, password, isadmin)
		VALUES (1, 'admin', '" . $adminPass . "', true)";
	if (!mysqli_query($conn, $sql)) {
		die("Error filling users: " . mysqli_error($conn));
	}

	file_put_contents('shopdb.csv', "$username;$password;$dbname");
	mysqli_close($conn);
	session_start();
	foreach ($_SESSION as $key => $value) {
		$_SESSION[$key] = false;
	}
	header('Location: index.php');
?>
