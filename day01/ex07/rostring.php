#!/usr/bin/php
<?php
	if ($argc > 1){
		$str = trim($argv[1]);
		while (strpos($str, "  "))
		{
			$str = str_replace("  ", " ", $str);
		}
		$arr = explode(" ", $str);
		$n = count($arr);
		for($i = 1; $i < $n; $i++)
		{
			echo $arr[$i]." ";
		}
		echo $arr[0]."\n";
	}
	
?>