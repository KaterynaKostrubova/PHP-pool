#!/usr/bin/php
<?php
if ($argc > 1)
{
    $str = $argv[1];
    $arr = explode(" ", $str);
    if (count($arr) != 5)
    {
        echo "Wrong Format\n";
        return (0);
    }
    $day_of_mounth = $arr[1];
    $year = $arr[3];
    $date = explode(":", $arr[4]);
    $hour = $date[0];
    $minutes = $date[1];
    $seconds = $date[2];
    if ((strlen("$day_of_mounth") != 1 && strlen("$day_of_mounth") != 2)
        || strlen("$year") != 4 || count($date) != 3)
    {
        echo "Wrong Format\n";
        return (0);
    }
    if(!(preg_match("/^[Ll]undi$/", "$arr[0]")) &&
    	!(preg_match("/^[Mm]ardi$/", "$arr[0]")) &&
    	!(preg_match("/^[Mm]ercredi$/", "$arr[0]")) &&
    	!(preg_match("/^[Jj]eudi$/", "$arr[0]")) &&
    	!(preg_match("/^[Vv]endredi$/", "$arr[0]")) &&
    	!(preg_match("/^[Ss]amedi$/", "$arr[0]")) &&
    	!(preg_match("/^[Dd]imanche$/", "$arr[0]")))
    {
    	echo "Wrong Format\n";
        return (0);
    }
    if ((preg_match("/^[0-1][0-9]|2[0-4]$/", "$hour") == 0)
        || (preg_match("/^[0-5][0-9]$/", "$minutes") == 0)
        || (preg_match("/^[0-5][0-9]$/", "$seconds") == 0))
    {
        echo "Wrong Format\n";
        return (0);
    }
    if (preg_match("/^[Jj]anvier$/", "$arr[2]")) {
    	$month = 1;
    } else if (preg_match("/^[Ff][eé]vrier$/", "$arr[2]")) {
        $month = 2;
    } else if (preg_match("/^[Mm]ars$/", "$arr[2]")){
        $month = 3;
    } else if (preg_match("/^[Aa]vril$/", "$arr[2]")){
        $month = 4;
    } else if (preg_match("/^[Mm]ai$/", "$arr[2]")){
        $month = 5;
    } else if (preg_match("/^[Jj]uin$/", "$arr[2]")){
        $month = 6;
    } else if (preg_match("/^[Jj]uillet$/", "$arr[2]")){
        $month = 7;
    } else if (preg_match("/^[Aa]o[ûu]t$/", "$arr[2]")){
        $month = 8;
    } else if (preg_match("/^[Ss]eptembre$/", "$arr[2]")){
        $month = 9;
    } else if (preg_match("/^[Oo]ctobre$/", "$arr[2]")){
        $month = 10;
    } else if (preg_match("/^[Nn]ovembre$/", "$arr[2]")){
        $month = 11;
    } else if (preg_match("/^[Dd][eé]cembre$/", "$arr[2]")){
        $month = 12;
    } else {
        echo "Wrong Format\n";
        return (0);
    }
    date_default_timezone_set("Europe/Paris");
    $time =  mktime($hour, $minutes,  $seconds, $month, $day_of_mounth, $year);
    echo $time."\n";
}
?>