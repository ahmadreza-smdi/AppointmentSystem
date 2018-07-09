<?php    
    require_once ('functions.php');
    session_start();
    if(empty($_SESSION['identity'])) header("location:index.php");
    $identity = $_SESSION['identity'];
    $patient = getPatient($identity);
    if($patient===false) header("location:index.php");
   

    if(isset($_POST['comm'])){
        $conn = db_connect();    
        $comment = $_REQUEST['comment'];
        $rate = $_REQUEST['menu'];

        $sql="insert into doctors_comments set patient_id='$patient',doctor_id = '$doctor_id',comment_text = '$comment',comment_score='$menu' " ;
        $conn->query($sql);
    }
?>