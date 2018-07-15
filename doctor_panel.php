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
        $vispay = $_POST['vispay'];
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
    <title> پنل کاربری پزشک</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login and Registration Form with HTML5 and CSS3</title>
    <link rel="stylesheet" href="assets/css/c_doctor_panel.css">
    <link rel="stylesheet" href="assets/css/lr.css">

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
            font-family: 'B Nazanin';
            font-size: 20px;
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
            let vispay = document.getElementById('vispay').value;
            let pass = document.getElementById('password').value;
            let passConf = document.getElementById('password_conf').value;

            if(!melli){alert("کد ملی را وارد کنید!"); return false;}
            if(!name){alert("نام و نام خوانوادگی را وارد کنید!"); return false;}
            if(!phone){alert("شماره تماس را وارد کنید!"); return false;}
            if(!adress){alert("آدرس را وارد کنید!"); return false;}
            if(!vispay){alert("هزینه ویزیت را وارد کنید!"); return false;}

            if(isNaN(melli)){ alert("کد ملی نامعتبر است!"); return false;}
            if(isNaN(phone)){ alert("شماره تلفن نامعتبر است!"); return false;}
            if(isNaN(vispay)){ alert("هزینه ویزیت نامعتبر است!"); return false;}
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

    <div class="container1" style="height: " >
        <?php
        include_once("navbar.php");
        ?>
    </div>
    <div class="find_main">
        <div class="find_box">
            <div class="find_box_content">
                <div id="doctor_clinik_info">
                    <div class="list_forms">
                        <div class="b_4">
                            <span style="font-family:Font_I;">اطلاعات پزشک</span><br>
                        </div>
                        <form method="post">
                            <div id="doctor_info">
                                <div class="b_1">
                                    <p for="identity" class="ptitr">کد ملی</p>
                                    <input class="b_2_p" type="text" id="melli" name="melli" value="<?php echo $doctor['identity']; ?>"><br>
                                </div>
                                <div class="b_1">
                                    <p for="name" class="ptitr">نام</p>
                                    <input class="b_2_p" type="text" id="name" name="name" value="<?php echo $doctor['name']; ?>"><br>
                                </div>
                                <div class="b_1">
                                    <p for="address" class="ptitr">آدرس</p>
                                    <input class="b_2_p" type="text" id="address" name="address" value="<?php  echo $doctor['address']; ?>"><br>
                                </div>
                                <div class="b_1">
                                    <p for="phone" class="ptitr">شماره تلفن</p>
                                    <input class="b_2_p" type="text" id="phone" name="phone" value="<?php echo $doctor['phone'] ?>"><br>
                                </div>
                                <div class="b_1">
                                    <p for="phone" class="ptitr">هزینه ویزیت</p>
                                    <input class="b_2_p" type="text" id="vispay" name="vispay" value="<?php echo $doctor['vispay'] ?>"><br>
                                </div>
                                <div class="b_1">
                                    <p for="password" class="ptitr">رمز عبور </p>
                                    <input class="b_2_p" type="password" id="password" name="password"><br>
                                </div>
                                <div class="b_1">
                                    <p for="password" class="ptitr">تایید رمز عبور</p>
                                    <input class="b_2_p_" type="password" id="password_conf" name="password_conf">
                                </div>
                            </div>
                            <div class="submit">
                                <input class="b_2_p" style="background-color: darkred ;color: white; margin-top: 20px; text-align: center;" type="submit" value="ثبت تغییرات" name="submit" onclick="return submitForm();">
                            </div>
                        </form> <br>
                        
                        <div class="b_1">
                            <p for="phone" class="ptitr">تخصص: </p>
                            <div class="b_2" style="padding:5px; margin-top: 20px ; border-style: solid; border-color: gold; background-color:#f2f2f2 "> <?php echo $doctor['expertise_name']; ?> </div>
                        </div>
                        
                        <br>
                        <div class="b_1">
                            <p for="phone" class="ptitr">کلینیک: </p>
                            <div class="b_2" style="font-size:15px; padding:5px; height:100px;margin-top: 20px ; border-style: solid; border-color: gold; background-color:#f2f2f2 ">
                                <?php
                                $clinik = getDoctorClinik($doctor['id']);
                                if(($clinik!=false)){

                                    echo $clinik['city_name'] . ' - ' . $clinik['address'] . ' - ' . $clinik['clinik_name'] . '<br>';
                                }
                                ?>
                            </div>
                        </div>
                        
                        <form method="get">
                            <div class="b_1 date">
                                <p class="ptitr">زمان: </p>
                                <input class="b_2" type="text" id="pcal" name="date" class="pdate" readonly="true" style="background-color: #262626; text-align: center;" value="<?php echo $dateStr; ?>"><br>


                                <script type="text/javascript">
                                var objCal = new AMIB.persianCalendar('pcal');
                                </script>
                            </div>

                            <input type="submit" value="ثبت" name="submdate"  class="b_2_p"  style="background-color: darkred ;color: white; margin-top: 20px; text-align: center;">
                        </form>
                    </div>
                </div>
            </div>

        <br>
        </div>
        
        
        
        
        
        
        
        
        
        
        <div class="pic_find">
            <?php
                if(!isset($_REQUEST['submdate'])){
                    echo '<img src="assets/pics/doctor_account.png">';
                    die;
                }
                $date = $_REQUEST['date'];
                $dbDate = getDbDateFromJdateStr($date);
                $enableTimes = getDoctorEnableTimeSlots($dbDate, $doctor['id']);
                $disableTimes = getDoctorDisableTimeSlots($dbDate, $doctor['id']);
            ?>

            <div id="doctor_disable_times" style="width: 70%; margin: auto;">
                <form method="post">
                    <p class="ptable" style="margin-bottom:20px;color:white; font-family: 'B Nazanin'; margin-top: 280px; font-size: 25px; font-weight: bold;">زمان های فعال</p>
                    <table class="customers">
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
                           class="cbutton" onclick="return addFree();">
                </form>
            </div>

            <div id="doctor_enable_times" style="width: 70%; margin: auto;">
                <form method="post">
                    <p style="margin-bottom:20px;color:white;font-family: 'B Nazanin'; margin-top: 5%; font-size: 25px; font-weight: bold;">زمان های غیرفعال</p>
                    <table class="customers">
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

                    <input  type="submit" value="ثبت" name="submit_delfree"
                           class="cbutton" onclick="return delFree();">
                </form>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
</body>


