<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ('config.php');

function db_connect(){
    global $host,$db,$user,$pass;
    $link = new mysqli($host, $user, $pass,$db);
    $link->query("SET NAMES 'utf8'");
    $link->query("SET CHARACTER SET 'utf8'");
    $link->query("SET character_set_connection = 'utf8'");
    
    if ($link->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        return $link;
   }

}

function db_dis($link){
    $link->close();
}

function session_des(){
    session_destroy();
}

function getExpertises(){
    $conn = db_connect();
    $sql = "SELECT id, expertise_name FROM expertise";
    $result = $conn->query($sql);
    $out=Array();
    $index=0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    
    $conn->close();
    return $out;
}

function getCliniksCities(){
    $conn = db_connect();
    $sql = "SELECT city_name FROM cliniks inner join cities on cliniks.city_id = cities.id";
    $result = $conn->query($sql);
    $out=Array();
    $index=0;

    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row['city_name'];
    
    $conn->close();
    return $out;
}

function select_doctor($exp_id){
    $link = db_connect();
    $query = "select * from doctors where expertise_id='".$exp_id."'";
    $res = $link->query($query);
    return $res;
}

function getPatient($identity){
    $conn = db_connect();
    $sql = "SELECT * FROM patients WHERE identity='$identity'";
    $result = $conn->query($sql);
    if($result===false) return false;
    $out = mysqli_fetch_array($result);
    
    $conn->close();
    return $out;
}

function getDoctor($identity){
    $conn = db_connect();
    $sql = "SELECT * FROM doctors WHERE identity='$identity'";
    $result = $conn->query($sql);
    if($result===false) return false;
    $out = mysqli_fetch_array($result);
    
    $conn->close();
    return $out;
}

function getReserve($id){
    $conn = db_connect();
    $sql = "SELECT * FROM reserves WHERE id='$id'";
    $result = $conn->query($sql);
    if($result===false) return false;
    $out = mysqli_fetch_array($result);
    
    $conn->close();
    return $out;
}

function getPatientAllReserves($patientId){
    $conn = db_connect();
    $sql = "SELECT reserves.id as reserve_id, reserves.doctor_id,"
            . " doctors.name as doctor_name, cliniks.clinik_name, date, time"
            . " FROM reserves inner join free_times on reserves.free_time_id = free_times.id"
            . " inner join time_slots on free_times.time_slot_id = time_slots.id"
            . " inner join cliniks_doctors on cliniks_doctors.doctor_id = reserves.doctor_id"
            . " inner join cliniks on cliniks_doctors.clinik_id = cliniks.id"
            . " inner join doctors on reserves.doctor_id = doctors.id"
            . " WHERE patient_id='$patientId'";
    
    $result = $conn->query($sql);
    if($result===false) return false;
    
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    
    $conn->close();
    return $out;
}

function boldEcho($str,$color,$beforeBR=1,$afterBR=0){
    for($i=0; $beforeBR>$i; $i++) echo '<br>';
    echo '<b><font color="'.$color.'">'.$str.'</font></b>';
    for($i=0; $afterBR>$i; $i++) echo '<br>';
}
