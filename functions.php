<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('config.php');
include_once("css_links.php");
include_once("js_links.php");
include_once('jdf.php');

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

function selectDoctor($exp_id,$city_name,$insurance_id=0){
    $conn = db_connect();
    if($insurance_id){
        $sql = "select doctors.id,doctors.identity,doctors.name,doctors.address,doctors.phone from doctors INNER JOIN cliniks_doctors INNER JOIN cliniks INNER JOIN cities INNER JOIN doctors_insurances ON (doctors.id = cliniks_doctors.doctor_id AND cliniks_doctors.clinik_id = cliniks.id AND cliniks.city_id = cities.id AND doctors_insurances.doctor_id = doctors.id ) where expertise_id='".$exp_id."' AND cities.city_name='".$city_name."' AND doctors_insurances.insurance_id ='".$insurance_id."'";
    }else{
        $sql = "select doctors.id,doctors.identity,doctors.name,doctors.address,doctors.phone from doctors INNER JOIN cliniks_doctors INNER JOIN cliniks INNER JOIN cities ON (doctors.id = cliniks_doctors.doctor_id AND cliniks_doctors.clinik_id = cliniks.id AND cliniks.city_id = cities.id) where expertise_id='".$exp_id."' AND cities.city_name ='".$city_name."'";
    }
    
    $result = $conn->query($sql);  
    if($result===false) return false;
    
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    $conn->close();
    return $out;
}

function getAllDoctors(){
    $link = db_connect();
    $query = "select * from doctors";
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

function getDoctorClinik($doctorId){
    $conn = db_connect();
    $sql = "SELECT clinik_id, clinik_name, address, city_name "
            . "FROM cliniks_doctors inner join cliniks on cliniks.id = cliniks_doctors.clinik_id "
            . "inner join cities on cliniks.city_id = cities.id WHERE cliniks_doctors.doctor_id='$doctorId'";
    $result = $conn->query($sql);
    if($result===false) return false;
    $out = mysqli_fetch_array($result);
    
    $conn->close();
    return $out;    
}

function getClinik($id){
    $conn = db_connect();
    $sql = "SELECT * FROM cliniks inner join cities on cliniks.city_id = cities.id WHERE id='$id'";
    $result = $conn->query($sql);
    if($result===false) return false;
    $out = mysqli_fetch_array($result);
    
    $conn->close();
    return $out;
}

function getDoctor($identity){
    $conn = db_connect();
    $sql = "SELECT doctors.id as id, name, address, phone, password, expertise_name, identity, vispay"
            . " FROM doctors inner join expertise on doctors.expertise_id = expertise.id"
            . " WHERE identity='$identity'";
    $result = $conn->query($sql);
    if($result===false) return false;
    $out = mysqli_fetch_array($result);
    
    $conn->close();
    return $out;
}

function getDoctorWithId($id){
    $conn = db_connect();
    $sql = "SELECT doctors.id as id, name, address, phone, password, expertise_name, identity, vispay"
            . " FROM doctors inner join expertise on doctors.expertise_id = expertise.id"
            . " WHERE doctors.id='$id'";
    $result = $conn->query($sql);
    if($result===false) return false;
    $out = mysqli_fetch_array($result);
    
    $conn->close();
    return $out;
}

function getFreeTime($id){
    $conn = db_connect();
    $sql = "SELECT * FROM free_times WHERE id='$id'";
    $result = $conn->query($sql);
    if($result===false) return false;
    $out = mysqli_fetch_array($result);
    
    $conn->close();
    return $out;
}

function getReserve($id){
    $conn = db_connect();
    $sql = "SELECT reserves.id as reserve_id, doctors.id as doctor_id,"
            . " doctors.name as doctor_name, cliniks.clinik_name, date, time"
            . " FROM reserves inner join free_times on reserves.free_time_id = free_times.id"
            . " inner join time_slots on free_times.time_slot_id = time_slots.id"
            . " inner join cliniks_doctors on cliniks_doctors.doctor_id = free_times.doctor_id"
            . " inner join cliniks on cliniks_doctors.clinik_id = cliniks.id"
            . " inner join doctors on free_times.doctor_id = doctors.id"
            . " WHERE reserves.id='$id'";
    $result = $conn->query($sql);
    if($result===false) return false;
    $out = mysqli_fetch_array($result);
    
    $conn->close();
    return $out;
}

function getDoctorFreeTimes($doctorId, $date){
    $conn = db_connect();
    $sql = "SELECT free_times.id, free_times.doctor_id, free_times.date, time_slots.time "
            . "FROM free_times inner join time_slots on free_times.time_slot_id = time_slots.id "
            . "WHERE doctor_id = '$doctorId' AND date = '$date' AND "
            . "free_times.id not in (SELECT reserves.free_time_id FROM reserves)";
    $result = $conn->query($sql);  
    if($result===false) return false;
    
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    $conn->close();
    return $out;
}
function getAllDoctorComments($doctorId){
    $conn = db_connect();
    $sql = "SELECT * FROM doctors_comments INNER JOIN patients ON doctors_comments.patient_id = patients.id "
            . "WHERE doctors_comments.doctor_id = '$doctorId'";
    $result = $conn->query($sql);  
    if($result===false) return false;
    
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    $conn->close();
    return $out;
}

function getPatientAllReserves($patientId){
    $conn = db_connect();
    $sql = "SELECT reserves.id as reserve_id, doctors.id as doctor_id,"
            . " doctors.name as doctor_name, cliniks.clinik_name, date, time"
            . " FROM reserves inner join free_times on reserves.free_time_id = free_times.id"
            . " inner join time_slots on free_times.time_slot_id = time_slots.id"
            . " inner join cliniks_doctors on cliniks_doctors.doctor_id = free_times.doctor_id"
            . " inner join cliniks on cliniks_doctors.clinik_id = cliniks.id"
            . " inner join doctors on free_times.doctor_id = doctors.id"
            . " WHERE patient_id='$patientId' ORDER BY date ASC";
    
    $result = $conn->query($sql);
    if($result===false) return false;
    
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    
    $conn->close();
    return $out;
}

function getNewestDoctors(){
    $conn = db_connect();
    $sql_newst_doctors = "SELECT * FROM doctors ORDER BY id DESC";
    $result = $conn->query($sql_newst_doctors);
    if($result===false) return false;
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    $conn->close();
    return $out;
}


function getMostPopularDoctors(){
    $conn = db_connect();
    $sql_mostـpopular_doctors = "SELECT doctors_comments.doctor_id as id, AVG(doctors_comments.comment_score) as avg_score,doctors.name,doctors.address,doctors.phone,doctors.identity FROM doctors_comments INNER JOIN doctors ON doctors_comments.doctor_id = doctors.id GROUP BY doctors_comments.doctor_id ORDER BY avg_score DESC";
    $result = $conn->query($sql_mostـpopular_doctors);
    if($result===false) return false;
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    $conn->close();
    return $out;
}

function getInsurances(){
    $conn = db_connect();
    $sql_all_insurances = "SELECT insurances.id,insurances.insurance_name FROM insurances";
    $result = $conn->query($sql_all_insurances);
    if($result===false) return false;
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    $conn->close();
    return $out;
}

function reserveFreeTime($freeTimeId, $patientId){
    $conn = db_connect();
    $sql = "INSERT INTO reserves (patient_id, free_time_id) VALUES ('$patientId', '$freeTimeId')";
    
    if($conn->query($sql)) return true;
    echo "Error: " . $sql . "<br>" . $conn->error;
    return false;
}

function cancelReserve($patientId, $reserveId){
    $conn = db_connect();
    $sql = "DELETE FROM reserves WHERE id='$reserveId' AND patient_id='$patientId'";
    
    if($conn->query($sql)){
        echo 'رزرو شما با موفقیت لغو شد!' . '<br><br>';
        return true;
    }
    echo "Error: " . $sql . "<br>" . $conn->error;
    return false;
}

function canCancelReserve($reserve){
    $day = tr_num(jdate('j'), 'en');
    $month = tr_num(jdate('n'), 'en');
    $year = "13" . tr_num(jdate('y'), 'en');

    $pieces = explode("-", $reserve['date']);
    $resYear = tr_num($pieces[0], 'en');
    $resMonth = tr_num($pieces[1], 'en');
    $resDay = tr_num($pieces[2], 'en');

    if($resYear > $year || $resMonth > $month || $resDay > $day) return true;
    return false;
}

function getJdateStr(){
    $day_number = tr_num(jdate('j'), 'en');
    $month_number = tr_num(jdate('n'), 'en');
    $year_number = tr_num(jdate('y'), 'en');
    $dateStr = $year_number . "/" . $month_number . "/" . $day_number;
    return $dateStr;
}

function getDoctorEnableTimeSlots($dbDate, $doctorId){
    $conn = db_connect();
    $sql = "SELECT time_slots.id, time_slots.time"
            . " FROM free_times inner join time_slots on free_times.time_slot_id = time_slots.id"
            . " WHERE free_times.doctor_id='$doctorId' AND free_times.date='$dbDate'"
            . " ORDER BY time_slots.id ASC";
    
    $result = $conn->query($sql);
    if($result===false) return false;
    
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    $conn->close();
    return $out;    
}

function getDoctorDisableTimeSlots($dbDate, $doctorId){
    $conn = db_connect();
    $sql = "SELECT time_slots.id, time_slots.time"
            . " FROM time_slots"
            . " WHERE time_slots.id not in (SELECT time_slots.id"
            . " FROM free_times inner join time_slots on free_times.time_slot_id = time_slots.id"
            . " WHERE free_times.doctor_id='$doctorId' AND free_times.date='$dbDate')"
            . " ORDER BY time_slots.id ASC";
    
    $result = $conn->query($sql);
    if($result===false) return false;
    
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)) $out[$index++] = $row;
    $conn->close();
    return $out;    
}

function getDoctorReservedTimeSlots($dbDate, $doctorId){
    $conn = db_connect();
    echo 'sdrwfcwrververv<br>wrcfwedfcwefcwfe<br>';
    $sql = "SELECT free_times.time_slot_id"
            . " FROM reserves INNER JOIN free_times ON reserves.free_time_id = free_times.id"
            . " WHERE free_times.doctor_id='$doctorId' AND free_times.date='$dbDate'";
    
    $result = $conn->query($sql);
    if($result===false) return false;
    
    $out = Array();
    $index = 0;
    while ($row = mysqli_fetch_array($result)){
        echo $row['time_slot_id'].'<br>';
        $out[$index++] = $row['time_slot_id'];
    }
    $conn->close();
    return $out;    
}

function getDbDateFromJdateStr($jdateStr){
    $pieces = explode("/", $jdateStr);
    if(strlen($pieces[0]) == 2) $year = '13' . $pieces[0];
    else $year = $pieces[0];
    if($pieces[1]>9) $month = $pieces[1];
    else $month = "0".$pieces[1];
    if($pieces[2]>9) $day = $pieces[2];
    else $day = "0".$pieces[2];
    $reqDate = $year.'-'.$month.'-'.$day;
    return $reqDate;
}

function addDoctorFreeTimes($doctorId, $dbdate, $timeSlotsStr){
    $pieces = explode("-", $timeSlotsStr);
    for($i=0; count($pieces)>$i; $i++) 
        addDoctorFreeTime ($doctorId, $dbdate, $pieces[$i]);
}

function deleteDoctorFreeTimes($doctorId, $dbdate, $timeSlotsStr){
    $pieces = explode("-", $timeSlotsStr);
    for($i=0; count($pieces)>$i; $i++) 
        deleteDoctorFreeTime ($doctorId, $dbdate, $pieces[$i]);
}

function addDoctorFreeTime($doctorId, $dbdate, $tsId){
    $conn = db_connect();
    $sql = "INSERT INTO free_times (date, doctor_id, time_slot_id) VALUES ('$dbdate', '$doctorId', '$tsId')";
    
    if($conn->query($sql)) return true;
    echo "Error: " . $sql . "<br>" . $conn->error;
    return false;    
}

function deleteDoctorFreeTime($doctorId, $dbdate, $tsId){
    $conn = db_connect();
    $sql = "DELETE FROM free_times WHERE date='$dbdate' AND doctor_id='$doctorId' AND time_slot_id='$tsId'";
    
    if($conn->query($sql)) return true;
    echo "Error: " . $sql . "<br>" . $conn->error;
    return false;    
}

function boldEcho($str,$color,$beforeBR=1,$afterBR=0){
    for($i=0; $beforeBR>$i; $i++) echo '<br>';
    echo '<b><font color="'.$color.'">'.$str.'</font></b>';
    for($i=0; $afterBR>$i; $i++) echo '<br>';
}

function getApi(){
    $service_url = 'https://www.amdoren.com/api/timezone.php?api_key=mEBc7PAURFANUfjmiyxg7J9qLDvfp5&loc=Tehran';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);
    $decoded = json_decode($curl_response);
    if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
        die('error occured: ' . $decoded->response->errormessage);
    }
    
    var_export($decoded->time);
}
?>