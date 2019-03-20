<?php 
function ft_split($str)
{
	$str = trim($str);
	while ((strpos($str, "  ")))
	{
		$str = str_replace("  ", " ", $str);
	}
	$arr = explode(" ", $str);
	sort($arr);
	return($arr);
}
?>