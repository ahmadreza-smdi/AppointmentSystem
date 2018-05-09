<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ('config.php');

function db_connect(){
    global $host,$db,$user,$pass;
    $link=new mysqli($host,$user,$pass,$db);
    return $link;
}
function db_dis($link){
    $link->close();
}
function session_des(){
    session_destroy();
}

function getExpertises(){
    $conn = db_connect();
    $sql = "SELECT id,name FROM expertise";
    $result = $conn->query($sql);
    $out=Array();
    $index=0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    
    $conn->close();
    return $out;
}

function getCliniksCities(){
    $conn = db_connect();
    $sql = "SELECT DISTINCT city FROM cliniks";
    $result = $conn->query($sql);
    $out=Array();
    $index=0;

    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row['city'];
    
    $conn->close();
    return $out;
}

function select_doctor($exp_id){
    $link = db_connect();
    $query = "select * from doctor where expertise_id='".$exp_id."'";
    $res = $link->query($query);
    return $res;

}