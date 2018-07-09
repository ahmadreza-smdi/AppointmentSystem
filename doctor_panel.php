<?php
    session_start();
    require_once ('functions.php');
    
    if(empty($_SESSION['identity'])) header("location:index.php");
    $identity = $_SESSION['identity'];
    $doctor = getDoctor($identity);
    if($doctor===false) header("location:index.php");
    
    if(isset($_POST['submit'])){
        $conn = db_connect();
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $newIdentity = $_POST['melli'];

        $sql="update doctors set name='$name', phone='$phone', address='$address', ";
                if($password!="") $sql .= "password='$password', ";
                $sql .= "identity='$newIdentity' WHERE identity='$identity'";

        if ($conn->query($sql) === TRUE) {
            boldEcho("اطلاعات با موفقیت بروز شد!", "green",0,2);
            $_SESSION['identity']=$newIdentity;
            $identity=$newIdentity;
            $doctor = getDoctor($identity);
            if($doctor===false) header("location:index.php");
        }
        else {
            boldEcho("خطا در بروزرسانی!", "red",0,2);
        }
    }
?>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<title>Login and Registration Form with HTML5 and CSS3</title>
<?php
    include_once("css_links.php");
    include_once("js_links.php");
?>
<link rel="stylesheet" type="text/css" href="./assets/css/lr.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
    <script language="javascript">
        function submitForm(){
            let melli = document.getElementById('melli').value;
            let name = document.getElementById('name').value;
            let phone = document.getElementById('phone').value;
            let adress = document.getElementById('address').value;
            let pass = document.getElementById('password').value;
            let passConf = document.getElementById('password_conf').value;

            if(!melli){alert("کد ملی را وارد کنید!"); return false;}
            if(!name){alert("نام و نام خوانوادگی را وارد کنید!"); return false;}
            if(!phone){alert("شماره تماس را وارد کنید!"); return false;}
            if(!adress){alert("آدرس را وارد کنید!"); return false;}

            if(isNaN(melli)){ alert("کد ملی نامعتبر است!"); return false;}
            if(isNaN(phone)){ alert("شماره تلفن نامعتبر است"); return false;}
            if(!(pass === passConf)){ alert("عدم تطابق رمز عبور!"); return false;}
        }
    </script>
</head>

<body style="direction: rtl;">
    <form method="post">
        <div id="doctor_info">
            <label for="identity">کد ملی</label>
            <input type="text" id="melli" name="melli" value="<?php echo $doctor['identity']; ?>">
            <br/>
            <label for="name">نام</label>
            <input type="text" id="name" name="name" value="<?php echo $doctor['name']; ?>">
            <br/>
            <label for="address">آدرس</label>
            <input type="text" id="address" name="address" value="<?php  echo $doctor['address']; ?>">
            <br/>
            <label for="phone">شماره تلفن</label>
            <input type="text" id="phone" name="phone" value="<?php echo $doctor['phone'] ?>">
            <br/>
            <label for="password">پسورد</label>
            <input type="password" id="password" name="password">
            <br/>
            <label for="password">پسورد</label>
            <input type="password" id="password_conf" name="password_conf">
            <br/>
        </div>
        
        <input type="submit" value="ثبت تغییرات" name="submit" onclick="return submitForm();">
    </form>

    <div id="doctor_clinik_info">
        <br>
        <label for="phone">تخصص: </label>
        <?php echo $doctor['expertise_name']; ?>
        <br>
        <label for="phone">کلینیک: </label>
        <?php
            $clinik = getDoctorClinik($doctor['id']);
            if(($clinik!=false)){
                echo $clinik['city_name'] . ' - ' . $clinik['address'] . ' - ' . $clinik['clinik_name'] . '<br>';
            }
        ?>
        <br>
    </div>

    <div id="doctor_free_times">
        <?php
            /*echo '<table>';
                if($res_3->num_rows > 0){
                    echo "<tr>";
                            echo "<td>شناسه</td>";
                            echo "<td>تاریخ</td>";
                            echo "<td>زمان آغاز</td>";
                            echo "<td>زمان پایان</td>";
                    echo "</tr>";
                    while ($row = $res_3->fetch_assoc()){
                        $id = $row["id"];
                        $date = $row["date"];
                        $start_time = $row["start_time"];
                        $end_time = $row["end_time"];
                        echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$date</td>";
                            echo "<td>$start_time</td>";
                            echo "<td>$end_time</td>";
                        echo "</tr>";
                    }
                }
            echo '</table>';*/
        ?>
    </div>

    <div id="doctor_reserved_times">
        <?php
            /*echo '<table>';
                if($res_4->num_rows > 0){
                    echo "<tr>";
                            echo "<td>شناسه</td>";
                            echo "<td>شناسه بیمار</td>";
                            echo "<td>تاریخ</td>";
                            echo "<td>زمان آغاز</td>";
                            echo "<td>زمان پایان</td>";
                    echo "</tr>";
                    while ($row = $res_4->fetch_assoc()){
                        $id = $row["id"];
                        $patient_id = $row["patient_id"];
                        $date = $row["date"];
                        $start_time = $row["start_time"];
                        $end_time = $row["end_time"];
                        echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$date</td>";
                            echo "<td>$start_time</td>";
                            echo "<td>$end_time</td>";
                        echo "</tr>";
                    }
                }
            echo '</table>';*/
        ?>
    </div>

</body>


