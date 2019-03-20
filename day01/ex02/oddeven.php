#!/usr/bin/php
<?php
	$stdin = fopen('php://stdin', 'r');
	while ($stdin)
	{
		echo "Enter a number: ";
		$line = fgets($stdin);
		$n = trim($line);
		if (is_numeric($n)) {
			if ($n % 2 == 0) {
				echo "The number ".$n." is even\n";
			} else { 
				echo "The number ".$n." is odd\n";
			}
		} else {
			if (feof($stdin))
			{
				echo "\n";
				exit();
			}
			echo "'".$n."'"." is not a number\n";
		}
	}
	fclose($stdin);
	echo "\n";
 ?>