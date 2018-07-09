<?php
    session_start();
    require_once ('functions.php');
    
    if(empty($_SESSION['identity'])) header("location:index.php");
    $identity = $_SESSION['identity'];
    $doctor = getDoctor($identity);
    if($doctor===false) header("location:index.php");
    
    $dateStr = getJdateStr();
    
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
    
    if(isset($_POST['submit_addfree'])){
        addDoctorFreeTimes($doctor['id'], $_POST['adddate'], $_POST['addfree']);
    }
    
    if(isset($_POST['submit_delfree'])){
        deleteDoctorFreeTimes($doctor['id'], $_POST['deldate'], $_POST['delfree']);
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
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/js-persian-cal.css">
    <script type="text/javascript" src="assets/js/js-persian-cal.min.js"></script>
    
    <style>
        .customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .customers tr:nth-child(even){background-color: #f2f2f2;}
        .customers tr {background-color: #ccc;}
        .customers tr:hover {background-color: #aaa;}

        .customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: right;
            background-color: #4CAF50;
            color: white;
        }
    </style>
    
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
        
        function addFree(){
            let sum="";
            for(let i=0; document.getElementById('cbaddfree'+i)!=null; i++){
                let cb = document.getElementById('cbaddfree'+i);
                if(!cb.checked) continue;
                if(sum != "") sum += "-";
                sum += (cb.value.toString());
            }
            document.getElementById('addfree').value = sum;
            return true;
        }
        
        function delFree(){
            let sum="";
            for(let i=0; document.getElementById('cbdelfree'+i)!=null; i++){
                let cb = document.getElementById('cbdelfree'+i);
                if(!cb.checked) continue;
                if(sum != "") sum += "-";
                sum += (cb.value.toString());
            }
            document.getElementById('delfree').value = sum;
            return true;            
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
    
    <form method="get">
        <div class="date">
            <p style="color: white;font-size: 25px;margin-right: -250px;margin-bottom: -15">: زمان</p>
            <input type="text" id="pcal" name="date" class="pdate" readonly="true" value="<?php echo $dateStr; ?>"><br>


            <script type="text/javascript">
            var objCal = new AMIB.persianCalendar('pcal');
            </script>
        </div>
        
        <input type="submit" value="ثبت" name="submdate" style="padding-left: 10px; padding-right: 10px">
    </form>
    
    <?php
        if(!isset($_REQUEST['submdate'])) die;
        $date = $_REQUEST['date'];
        $dbDate = getDbDateFromJdateStr($date);
        $enableTimes = getDoctorEnableTimeSlots($dbDate, $doctor['id']);
        $disableTimes = getDoctorDisableTimeSlots($dbDate, $doctor['id']);
    ?>

    
    <div id="doctor_disable_times" style="margin: 20px;">
        <form method="post">
            <table class="customers" style="width: 70%;">
                <tr>
                <th>تاریخ</th>
                <th>زمان</th>
                <th>فعال کردن</th>
                </tr>
                
                <input id="addfree" name="addfree" type="hidden" value="">
                <input id="adddate" name="adddate" type="hidden" value="<?php echo $dbDate; ?>">
                
                <?php
                    for($i=0; count($disableTimes)>$i; $i++){
                        $disable = $disableTimes[$i];
                        echo "<tr>";
                        echo "<td>".$dbDate."</td>";
                        echo "<td>".$disable['time']."</td>";
                        echo "<td>".'<input type="checkbox" id="cbaddfree'.$i.'" value="'.$disable['id'].'"'.
                                ' onchange="checkReserve(this.id);">'."</td>";
                        
                        echo"</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            
            <input type="submit" value="ثبت" name="submit_addfree" 
                   style="padding-left: 10px; padding-right: 10px;" onclick="return addFree();">
        </form>
    </div>

    <div id="doctor_enable_times" style="margin: 20px;">
        <form method="post">
            <table class="customers" style="width: 70%;">
                <tr>
                <th>تاریخ</th>
                <th>زمان</th>
                <th>لغو کردن</th>
                </tr>
                
                <input id="delfree" name="delfree" type="hidden" value="">
                <input id="deldate" name="deldate" type="hidden" value="<?php echo $dbDate; ?>">
                
                <?php
                    for($i=0; count($enableTimes)>$i; $i++){
                        $enable = $enableTimes[$i];
                        echo "<tr>";
                        echo "<td>".$dbDate."</td>";
                        echo "<td>".$enable['time']."</td>";
                        echo "<td>".'<input type="checkbox" id="cbdelfree'.$i.'" value="'.$enable['id'].'"'.
                                ' onchange="checkReserve(this.id);">'."</td>";
                        
                        echo"</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            
            <input type="submit" value="ثبت" name="submit_delfree" 
                   style="padding-left: 10px; padding-right: 10px;" 
                   onclick="return delFree();">
        </form>
    </div>

</body>


