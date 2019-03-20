#!/usr/bin/php
<?PHP
	include("day01/ex08/ft_is_sort.php");

	$tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
	$tab[] = "What are we doing now ?";
	//$tab = array("1", "2", "3");
	if (ft_is_sort($tab))
		echo "The array is sorted\n";
	else
		echo "The array is not sorted\n";
?>