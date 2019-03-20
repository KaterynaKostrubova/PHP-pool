#!/usr/bin/php
<?php 
	$text = $argv[2];
	for($i = 3; $i < $argc; $i++) {
		$text .= "&".$argv[$i];
	}
	$str_replace = str_replace(":", "=", $text);
	parse_str($str_replace, $arr);
	if (array_key_exists($argv[1], $arr))
	 	echo $arr[$argv[1]]."\n";
?>