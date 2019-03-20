<?php
	if ($_POST['login'] && $_POST['passwd']){
		if ($_POST['submit'] === OK){
			if (!file_exists("../private")){
				mkdir("../private");
			}
			if (!file_exists("../private/passwd")){
				file_put_contents("../private/passwd", null);
			}
			$data = unserialize(file_get_contents("../private/passwd"));
			if ($data) {
				$present = 0;
				foreach ($data as $key => $value) {
					if ($value['login'] == $_POST['login']) {
						$present = 1;
					}
				}
			}
			if ($present == 1){
				echo "ERROR\n";
			} else {
				$save['login'] = $_POST['login'];
	            $save['passwd'] = hash('whirlpool', $_POST['passwd']);
	            $data[] = $save;
	            $s_data = serialize($data);
	            file_put_contents('../private/passwd', $s_data);
	            echo "OK\n";
			}
		} else {
			echo "ERROR\n";
		}
	} else {
		echo "ERROR\n";
	}
?>