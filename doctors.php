<?php
    session_start();
    require_once ('functions.php');
    include_once("css_links.php");
    include_once("js_links.php");
    $doctor_id = $_GET["id"];
    $doctor = getDoctor($doctor_id);
?>

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<title>Doctor</title>

<body>
    <div id='doctor_information'>
        <h1>Doctor name :</h1>
        <h4><?php $doctor['name'] ?></h4>

        <h1>Address :</h1>
        <h4><?php $doctor['address'] ?></h4>

        <h1>Phone :</h1>
        <h4><?php $doctor['phone'] ?></h4>

        <h1>Expertise :</h1>
        <h4><?php $doctor[''] ?></h4>

    </div>
    
    <?php 
        if(empty($_SESSION['identity'])) $patient = False;
        else {
            $identity = $_SESSION['identity'];
            $patient = getPatient($identity);
        }
        
        if(isset($_POST['sub'])){
            $patientId = $patient['id'];
            $doctorId = $doctor['id'];
            $conn = db_connect();    
            $comment = $_REQUEST['comment'];
            $rate = $_REQUEST['menu'];
    
            $sql="insert into doctors_comments set patient_id='$patientId', doctor_id = '$doctorId',comment_text = '$comment',comment_score='$menu' " ;
            $conn->query($sql);
        }
        if ($patient==false)die;
    ?>
    
    <div id='get_comments'>
        <form action="addcomment.php" method='post' name='comm'>
            <p> 
                <label for="comment"> Comment </label>
                <textarea name="comment" id="" cols="30" rows="10">a</textarea>
            </p>

            <select name="menu">
            <P> Your point</P>
            <option value="0" selected></option>
            <option value="1">one</option>
            <option value="2">two</option>
            <option value="3">three</option>
            </select>
            <div><input name='sub' type="submit" value="submit"></div>
        </form>
    </div>
</body>