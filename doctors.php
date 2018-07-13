<?php
    session_start();
    require_once ('functions.php');

    $doctor_identity = $_GET["id"];
    $doctor = getDoctor($doctor_identity);
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo 'دکتر '.$doctor['name']; ?></title>
    <link rel="shortcut icon" type="image/png" href="assets/pics/icon.png"/>
    <link rel="stylesheet" href="assets/css/c_doctors.css">

    <script language="javascript">
        function addComment(){
            let comment = document.getElementById('comment').value;
            let score = document.getElementById('score').value;

            if(!comment){alert("متن کامنت را وارد کنید!"); return false;}
            if(!score){alert("امتیاز را وارد کنید!"); return false;}
            return true;
        }
    </script>
</head>

<body  style="direction: rtl; background-color: darkgray;">
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
                $rate = $_REQUEST['score'];

                $sql="insert into doctors_comments set patient_id='$patientId', doctor_id = '$doctorId',comment_text = '$comment',comment_score='$rate' " ;
                if($conn->query($sql)) echo 'با موفقیت ثبت شد';
                else;
            }
            if ($patient==false)die;
        ?>
    </div>
    
    <div class="comments" align='center'>
        <hr>
        <?php
            $commm = getAllDoctorComments($doctor['id']);
            for($i=0; $i<count($commm); $i++){
                echo '<p> '.'<b>' .$commm[$i]['name']. '</b>' .' </p>' ;
                echo '<p> '.$commm[$i]['comment_text']. ' </p>' ;
                echo '<p> '.'امتیاز:' .$commm[$i]['comment_score']. ' </p>' ;
                echo '<hr>';
            }
        ?>
    </div>
    
    <div class="patient_table" align='center'>
        <form method='post' name='comm'>
                <p class="b_6">نظر خود را وارد کنید</p>
                <textarea  class="comment_box" id="comment" name="comment" cols="50" rows="15"></textarea>

            <p class="b_7">به این دکتر چه نمره ای می دهید؟</p>
            <div class="find_box_content">
                <select class="select" id="score" name="score">
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
                <div><input class="b_8" name='sub' type="submit" value="ثبت نظر" onclick="return addComment();"></div>
            </div>
        </form>
    </div>
    
    
</body>