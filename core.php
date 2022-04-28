<?php

use ArPHP\I18N\Arabic;

include('I18N/Arabic.php');
$Arabic = new Arabic('ArGlyphs');
function gettextwidth($str,$size){
    global $Arabic;
    $str = $Arabic->utf8Glyphs($str,10000,false);
    $local = $_SERVER['SCRIPT_FILENAME'];
    $pos   = strrpos($local, '/');
    $path  = substr($local, 0, $pos);
    $font  = $path.'/a.ttf';
    //$font  = $path.'/Tajawal-Bold.ttf';
    $g = imageftbbox($size,0,$font,$str);
    return $g[2]-$g[0];
}
function gettextheight($str,$size){
    global $Arabic;
    $str = $Arabic->utf8Glyphs($str,10000,false);
    $local = $_SERVER['SCRIPT_FILENAME'];
    $pos   = strrpos($local, '/');
    $path  = substr($local, 0, $pos);
    $font  = $path.'/a.ttf';
    //$font  = $path.'/Tajawal-Bold.ttf';
    $g = imageftbbox($size,0,$font,$str);
    return $g[3]-$g[5];
}

function writetext($image,$x,$y,$str,$size,$color){
    global $Arabic;
    $str = $Arabic->utf8Glyphs($str,10000,false);
    $local = $_SERVER['SCRIPT_FILENAME'];
    $pos   = strrpos($local, '/');
    $path  = substr($local, 0, $pos);
    $font  = $path.'/a.ttf';
    //$font  = $path.'/Tajawal-Bold.ttf';
    $g = imageftbbox($size,0,$font,$str);
    imagefttext($image,$size,0,$x - $g[6],$y - $g[7],$color,$font,$str);
    return $g[2]-$g[0];
}

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="neatschedule";

/*
$db_host="sql110.epizy.com";
$db_user='epiz_26421459';
$db_pass='AvjO8tAHlJdh';
$db_name="epiz_26421459_scheduledb";
*/
?>