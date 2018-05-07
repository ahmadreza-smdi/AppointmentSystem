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
function session_des(){
    session_destroy();
}
function select_doctor($exp_id){
    $link = db_connect();
    $query = "select * from doctor where expertise_id='".$exp_id."'";
    $res = $link->query($query);
    return $res;
}