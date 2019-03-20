#!/usr/bin/php
<?php 
	function my_sort($str1, $str2)
	{
		$str_order = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
		$s1 = strtolower($str1);
		$s2 = strtolower($str2);
		for ($i = 0; $i < strlen($str1) || $i < strlen($str2); $i++)
		{
			$value1 = strpos($str_order, $s1[$i]);
			$value2 = strpos($str_order, $s2[$i]);
			if ($value1 > $value2){
				return (1);
			}
			else if ($value1 < $value2){
				return (-1);
			}
			else {
				return (0);
			}
		}
	}
	if ($argc > 1)
	{
		$text = $argv[1];
		for($i = 2; $i < $argc; $i++){
			$text .= " ".$argv[$i];
		}
		$cut = trim($text);
		while (strpos($cut, "  ")){
			$cut = str_replace("  ", " ", $cut);
		}
		$arr = explode(" ", $cut);
		usort($arr, "my_sort");
		foreach ($arr as $value){
			echo ("$value\n");
		}
	}
?>