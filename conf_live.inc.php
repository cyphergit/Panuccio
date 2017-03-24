<?php
$db_user = "u1905_pAdmin"; // Username
$db_pass = "okcacp)4nlelei.kstrem"; // Password
$db_database = "db1905_panuccio"; // Database Name
$db_host = "192.168.45.182"; // Server Hostname

$db_connect = mysql_connect ($db_host, $db_user, $db_pass); // Connects to the database.
$db_select = mysql_select_db ($db_database); // Selects the database.

$images_dir = 'images_preowned';
$article_dir = 'images_articles';
$files_dir = 'files';
$site_host = "http://www.panuccioautos.com.au";
//$site_host = "http://localhost/Panuccio";

function form($data) { // Prevents SQL Injection
    global $db_connect;
    $data = ereg_replace("[\'\")(;|`,<>]", "", $data);
    $data = mysql_real_escape_string(trim($data), $db_connect);
    
    return stripslashes($data);
}

function br2space($string) {
    $string = strip_tags($string,'<br>');
    $string = preg_replace('/<br[^>]*>/',' ',$string);
    $string = preg_replace('/[\ ]+/',' ',$string);
    
    return $string;
}

function FetchExtension ($filename) {
    $filename = strtolower($filename) ; 
    $exts = split("[/\\.]", $filename) ; 
    $n = count($exts)-1; 
    $exts = $exts[$n]; 
    
    return $exts;
}
?>