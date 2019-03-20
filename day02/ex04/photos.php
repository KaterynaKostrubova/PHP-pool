#!/usr/bin/php
<?php
	if ($argc == 2){
        $url = preg_replace("/https?:\/\//", "", $argv[1]);
        $url = explode('/', $url);
		$url = $url[0];
		$ch = curl_init($argv[1]);
		if ($ch){
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			if (curl_exec($ch)){
                $arr_img = array();
                preg_match_all("/<img.*? src=[\"'](.*?)[\"'].*?>/mi", curl_exec($ch), $picture);
                foreach ($picture[1] as $el)
                {
                    echo $el;
                    if (preg_match("/^(https?):\/\/*/mi", $el)){
                        array_push($arr_img, $el);
                    } else {
                        if ($el[0] == '/') {
                            array_push($arr_img, $argv[1].$el);
                        } else {
                            array_push($arr_img, $argv[1].'/'.$el);
                        }
                    }   
                }
                if (!file_exists($url)) {
                    mkdir($url);
                }
                foreach ($arr_img as $el){
                    $url_full = $url.'/'.end(explode('/', $el));
                    $ch2 = curl_init($el);
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
                    if (!file_exists($url_full)){
                        $fd = fopen($url_full, 'x');
                        fwrite($fd, curl_exec($ch2));
                        fclose($fd);
                    }
                    curl_close($ch2);
                }
				curl_close($ch);
			}
		}
	}
?>
