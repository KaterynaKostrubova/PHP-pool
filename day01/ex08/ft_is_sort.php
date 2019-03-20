<?php 
function ft_is_sort($arr) {
	$copy = $arr;
	sort($arr);
	foreach ($arr as $key => $elem) {
		if($elem != $copy[$key]) {
			return(FALSE);
		}
	}
	return(TRUE);
}
?>