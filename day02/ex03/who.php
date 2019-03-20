#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Kiev');
$file = fopen("/var/run/utmpx", "r");
$typedef   = "a256usr/a4s/a32dev/ipid/itype/I2time/a256host/i16pad";
while ($utmpx = fread($file, 628))
{
    $arr = unpack($typedef, $utmpx);
    if (array_search(7, $arr))
    {
        $name = substr(trim($arr['usr']), 0, 8);
        $dev = substr(trim($arr['dev']), 0, 8);
        $date1 = date("M", $arr["time1"]);
        $date2 = date("j", $arr["time1"]);
        $time = date("H:i", $arr["time1"]);
        echo $name." ".$dev."  ".$date1."  ".$date2." ".$time."\n";
    }
}
?>