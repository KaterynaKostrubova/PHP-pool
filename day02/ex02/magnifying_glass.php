#!/usr/bin/php
<?php
function replace($parts){
    return $parts[1] . "" . strtoupper($parts[2]) . "" . $parts[3];
}
if ( !file_exists($argv[1]) || $argc < 2){
    return (0);
}
$file = file_get_contents("$argv[1]");
$file = preg_replace_callback("/(title=\")(.*?)(\")/m", "replace", $file);
$file = preg_replace_callback("/(a .*>)(.*?)(<)/m", "replace", $file);
$file = preg_replace_callback("/(a .*?>)(.*?)(<.*?><)/m", "replace", $file);
echo $file;
?>