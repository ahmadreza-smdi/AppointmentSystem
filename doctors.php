<?php
    session_start();
    require_once ('functions.php');

    $doctor_identity = $_GET["id"];
    $doctor = getDoctor($doctor_identity);
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>پروفایل دکتر</title>
    <link rel="stylesheet" href="assets/css/c_doctors.css">

</head>

<body  style="direction: rtl;>
    <div class="container" >
        <?php
        include_once("navbar.php");
        ?>
    </div>
    <div class="find_main">
        <div class="find_box">
            <div class="find_box_content" >
                        <!--        align='center'-->
                <div class="b_4">
                    <span>اطلاعات دکتر</span><br>
                </div>
                <div class="list_forms">
                        <div class="b_1">
                            <p>اسم دکتر:</p>
                            <div class="b_2"><?php echo $doctor['name']; ?></div><br>
                        </div>

                        <div class="b_1">
                            <p><b>آدرس:</b></p>
                            <div class="b_2"><?php echo $doctor['address'] ?></div><br>
                        </div>

                        <div class="b_1">
                            <p><b>شماره تلفن:</b></p>
                            <div class="b_2"><?php echo $doctor['phone'] ?></div><br>
                        </div>

                        <div class="b_1">
                            <p><b>تخصص:</b></p>
                            <div class="b_2"><?php echo $doctor['expertise_name'] ?></div><br>
                        </div>
                </div>
            </div>
        </div>

        <div class="pic_find">
            <img src="assets/pics/doctor.png">
            <h2>پروفایل دکتر</h2>
        </div>

        <div class="success">
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
                    <option value="4">۴</option>
                    <option value="5">۵</option>
                    <option value="6">۶</option>
                    <option value="7">۷</option>
                    <option value="8">۸</option>
                    <option value="9">۹</option>
                    <option value="10">۱۰</option>
                </select>
                <div><input name='sub' type="submit" value="ثبت نظر"></div>
            </form>
        </div>
        <div class="comments" align='center'>
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


    </div>
</body>