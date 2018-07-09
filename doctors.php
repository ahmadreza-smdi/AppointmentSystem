<?php
    session_start();
    require_once ('functions.php');

    $doctor_identity = $_GET["id"];
    $doctor = getDoctor($doctor_identity);
?>

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<title>Doctor</title>

<body dir='rtl'>
    <div id='doctor_information' align='center'>
        <p><b>اسم دکتر:</b></p>
        <p><?php echo $doctor['name']; ?></p>
        
        <p><b>آدرس:</b></p>
        <p><?php echo $doctor['address'] ?></p>

        <p><b>شماره تلفن:</b></p>
        <p><?php echo $doctor['phone'] ?></p>

        <p><b>تخصص:</b></p>
        <p><?php echo $doctor['expertise_name'] ?></p>

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
    
            $sql="insert into doctors_comments set patient_id='$patientId', doctor_id = '$doctorId',comment_text = '$comment',comment_score='$rate' " ;
            if($conn->query($sql)) echo 'با موفقیت ثبت شد';
            else;
        }
        if ($patient==false)die;
    ?>
    
<div align='center'>
    <hr>
    <?php 
       $commm = getAllComments();
       for($i=0; $i<count($commm); $i++){     
        echo '<p> '.'<b>' .$commm[$i]['name']. '</b>' .' </p>' ;
        echo '<p> '.$commm[$i]['comment_text']. ' </p>' ;
        echo '<p> '.'امتیاز:' .$commm[$i]['comment_score']. ' </p>' ;
        echo '<hr>';
       }
    ?>
</div>
    <div id='get_comments' align='center'>
        <form method='post' name='comm'>
            <p> 
                <br>
                <br>
                <p>نظر خود را وارد کنید</p>
                <textarea name="comment" id="" cols="30" rows="10"></textarea>
            </p>
            <br>
            <p>به این دکتر چه نمره ای می دهید؟</p>
            <select name="menu">
                <option value="0"></option>
                <option value="1">۱</option>
                <option value="2">۲</option>
                <option value="3">۳</option>
                <option value="3">۴</option>
                <option value="3">۵</option>
                <option value="3">۶</option>
                <option value="3">۷</option>
                <option value="3">۸</option>
                <option value="3">۹</option>
                <option value="3">۱۰</option>
            </select>
            <div><input name='sub' type="submit" value="ثبت نظر"></div>
        </form>
    </div>
</body>