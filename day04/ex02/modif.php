<?php
if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] === "OK"){
	$data = unserialize(file_get_contents("../private/passwd"));
	if ($data){
		$present = 0;
		foreach ($data as $key => $value){
			$new_pw = hash('whirlpool', $_POST['newpw']);
			$old_pw = hash('whirlpool', $_POST['oldpw']);
			if ($value['login'] == $_POST['login'] && $value['passwd'] === $old_pw){
				$present = 1;
				$data[$key]['passwd'] = $new_pw;
			} 
			if ($present){
				$s_data = serialize($data);
	            file_put_contents('../private/passwd', $s_data);
	            echo "OK\n";
			} else {
				echo "ERROR\n";
			}
		}
	} else {
		echo "ERROR\n";
	}
} else{
	echo "ERROR\n";
}
?>