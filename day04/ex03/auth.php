<?php
function auth($login, $passwd)
{
    if ($login && $passwd){
		$data = unserialize(file_get_contents("../private/passwd"));
		if ($data){
			foreach ($data as $key => $value) {
				if (($value['login'] == $login) && ($value['passwd'] === hash('whirlpool', $passwd))){
					return true;
				}
			}
		} 
    } 
    return false;
}
?>