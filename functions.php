<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ('config.php');

function db_connect(){
    global $host,$db,$user,$pass;
    $link=mysqli_connect($host,$user,$pass,$db);
    return $link;
}
function db_dis($link){
    $link->close();
}