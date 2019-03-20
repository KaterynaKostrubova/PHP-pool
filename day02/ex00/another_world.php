#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $str = trim($argv[1]);
        $replace = preg_replace("/ {2,}/", ' ', $str);
        $replace = preg_replace("/\t{1,}/", ' ', $replace);
        echo $replace."\n";
    }
?>