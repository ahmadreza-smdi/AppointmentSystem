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
function select_doctor($exp_id,$city){
    $link = db_connect();
    $query = "select * from doctor 
        inner join cliniks_doctors on doctor.id = cliniks_doctors.doctor_id
        inner join cliniks on cliniks.id = cliniks_doctors.cliniks_id
        where expertise_id='".$exp_id."' and city='".$city."'";
    $res = $link->query($query);
    return $res;
}