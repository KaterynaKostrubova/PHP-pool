#!/usr/bin/php
<?php 
if($argc > 1){
	for($i = 1; $i < $argc; $i++) {
		$str .= " ".$argv[$i];
	}
	$str = trim($str);
	while (strpos($str, "  "))
	{
		$str = str_replace("  ", " ", $str);
	}
	$arr = explode(" ", $str);
	sort($arr);
	foreach ($arr as $el) {
		echo trim($el)."\n";
	}
}
?>