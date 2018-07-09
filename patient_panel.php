<head>
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <?php
        session_start();
        include_once("functions.php");
        
        if(empty($_SESSION['identity'])) header("location:index.php");
        $identity = $_SESSION['identity'];
        $patient = getPatient($identity);
        if($patient===false) header("location:index.php");
    ?>
    
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: right;
            background-color: #4CAF50;
            color: white;
        }
    </style>

    <script language="javascript">
        function submitForm(){
            let melli = document.getElementById('inp_identity').value;
            let name = document.getElementById('inp_name').value;
            let phone = document.getElementById('inp_phone').value;
            let adress = document.getElementById('inp_address').value;
            let disease = document.getElementById('inp_disease').value;
            let blood = document.getElementById('inp_blood').value;
            let pass = document.getElementById('inp_pass').value;
            let passConf = document.getElementById('inp_pass_conf').value;

            if(!melli){alert("کد ملی را وارد کنید!"); return false;}
            if(!name){alert("نام و نام خوانوادگی را وارد کنید!"); return false;}
            if(!phone){alert("شماره تماس را وارد کنید!"); return false;}
            if(!adress){alert("آدرس را وارد کنید!"); return false;}
            
            if( !(blood==="A+" || blood==="A-" ||
                    blood==="O+" || blood==="O-" ||
                    blood==="B+" || blood==="B-" ||
                    blood==="AB+" || blood==="AB-" || !blood) ){ alert("گروه خونی نامعتبر است!"); return false;}
            if(isNaN(melli)){ alert("کد ملی نامعتبر است!"); return false;}
            if(isNaN(phone)){ alert("شماره تلفن نامعتبر است"); return false;}
            if(!(pass === passConf)){ alert("عدم تطابق رمز عبور!"); return false;}
        }
        
        function cancelReserve(reserveId){
            if(confirm("آیا مطمئن هستید؟") == false) return false;
            document.getElementById('delreserve').value = reserveId;
            return true;
        }
    </script>

    <link rel="stylesheet" href="assets/css/c_patient_panel.css">
    <title>پنل بیمار</title>
</head>
<body style="direction: rtl;">
    <div class="container" >
        <?php
            include_once("navbar.php");
        ?>
    </div>
    <div class="find_main">
        <div class="find_box">
            <?php
                if(isset($_POST['submit'])){
                    $conn = db_connect();
                    $name = $_POST['inp_name'];
                    $phone = $_POST['inp_phone'];
                    $address = $_POST['inp_address'];
                    $disease = $_POST['inp_disease'];
                    $blood_type = $_POST['inp_blood'];
                    $password = $_POST['inp_pass'];
                    $newIdentity = $_POST['inp_identity'];

                    $sql="update patients set name='$name', phone='$phone', address='$address', disease='$disease',"
                            . "blood_type='$blood_type', ";
                            if($password!="") $sql .= "password='$password', ";
                            $sql .= "identity='$newIdentity' WHERE identity='$identity'";

                    if ($conn->query($sql) === TRUE) {
                        boldEcho("اطلاعات با موفقیت بروز شد!", "green",0,2);
                        $_SESSION['identity']=$newIdentity;
                        $identity=$newIdentity;
                        $patient = getPatient($identity);
                        if($patient===false) header("location:index.php");
                    }
                    else {
                        boldEcho("خطا در بروزرسانی!", "red",0,2);
                    }
                }

                else if(isset($_POST['delreserve'])){
                    $reserveId = $_POST['delreserve'];
                    $patientId = $patient['id'];
                    cancelReserve($patientId, $reserveId);
                }
            ?>
            <div class="find_box_content">
                <div class="b_4">
                    <span>تغییر اطلاعات</span><br>
                </div>
                <div class="list_forms">
                            <form method="post">
                                <div class="b_1">
                                    <p>کد ملی:</p>
                                     <input class="b_2" type="text" id="inp_identity" name="inp_identity" value="<?php echo $patient['identity'] ?>" /><br>
                                </div>
                                <div class="b_1">
                                    <p>نام و نام خانوادگی:</p>
                                    <input class="b_2" type="text" id="inp_name" name="inp_name" value="<?php echo $patient['name'] ?>" /><br>
                                </div>
                                <div class="b_1">
                                    <p> شماره تماس:</p>
                                    <input class="b_2" type="text" id="inp_phone" name="inp_phone" value="<?php echo $patient['phone'] ?>" /><br>
                                </div>
                                <div class="b_1">
                                    <p> آدرس:</p>
                                    <input class="b_2" type="text" id="inp_address" name="inp_address" value="<?php echo $patient['address'] ?>" /><br>
                                </div>
                                <div class="b_1">
                                    <p> بیماری خاص:</p>
                                    <input class="b_2" type="text" id="inp_disease" name="inp_disease" value="<?php echo $patient['disease'] ?>" /><br>
                                </div>
                                <div class="b_1">
                                    <p> گروه خونی:</p>
                                    <input class="b_2" type="text" id="inp_blood" name="inp_blood" value="<?php echo $patient['blood_type'] ?>" /><br>
                                </div>
                                <div class="b_1">
                                    <p>رمز عبور:</p>
                                    <input class="b_2" type="password" id="inp_pass" name="inp_pass" /><br>
                                </div>
                                <div class="b_1">
                                    <p> تایید رمز عبور:</p>
                                    <input class="b_2" type="password" id="inp_pass_conf" name="inp_pass_conf" /><br>
                                </div>
                                <div class="submit">
                                    <input class="b_3" type="submit" value="ثبت تغییرات" name="submit" onclick="return submitForm();">
                                </div>
                            </form>
                </div>
            </div>
        </div>
        <div class="pic_find">
            <img src="assets/pics/paint_account.png">
            <h2>پنل کاربری بیمار</h2>
        </div>

            <?php
                $patReserves = getPatientAllReserves($patient['id']);
                if($patReserves === false || count($patReserves)==0) die;
            ?>

            <br>
        <div class="clear"></div>
        <div class="patient_table">
            <div class="b_5">
                <span style="font-weight: bold; font-size: 20px;">لیست رزرو های شما تا کنون</span><br>
            </div>
            <div id="patient_reserved_times">
                <form method="post">
                    <table id="customers" style="width: 70%;">
                        <tr>
                        <th>تاریخ</th>
                        <th>زمان</th>
                        <th>نام پزشک</th>
                        <th>کلینیک</th>
                        <th>لغو</th>
                        </tr>

                        <input id="delreserve" name="delreserve" type="hidden" value="">
                        <?php
                            for($i=0; count($patReserves)>$i; $i++){
                                $reserve = $patReserves[$i];
                                echo "<tr>";
                                echo "<td>".$reserve['date']."</td>";
                                echo "<td>".$reserve['time']."</td>";
                                echo "<td>".$reserve['doctor_name']."</td>";
                                echo "<td>".$reserve['clinik_name']."</td>";
                                echo "<td>";
                                if(canCancelReserve($reserve)){
                                    echo '<input type="submit" value="لغو" id="bb" '
                                    . 'onclick="return cancelReserve(\''.$reserve['reserve_id'].'\');">';
                                }
                                echo"</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

