<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ('config.php');

function db_connect(){
    global $host,$db,$user,$pass;
    $link = new mysqli($host, $user, $pass,$db);
    if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }else{
        return $link;
   }
}
function db_dis($link){
    $link->close();
}
function session_des(){
    session_destroy();
}
function select_doctor($exp_id){
    $link = db_connect();
    $query = "select * from doctors where expertise_id='".$exp_id."'";
    $res = $link->query($query);
    return $res;
}
