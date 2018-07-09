<?php
    session_start();
    require_once('functions.php');
    require_once('jdf.php');
    
    if(!empty($_SESSION['identity'])) $patient = getPatient($_SESSION['identity']);
    else $patient=false;
    
    if(isset($_REQUEST['doctor']) && isset($_REQUEST['date'])){
        $doctorId = $_REQUEST['doctor'];
        $date = $_REQUEST['date'];
    }
    else if(isset($_REQUEST['submit_reserve']) && !($patient===false) && isset($_REQUEST['free_time'])){
        $res = reserveFreeTime($_REQUEST['free_time'], $patient['id']);
        if($res===true) header("location:patient_panel.php");
        else die;
    }
    else header("location:index.php");
    
    $reqDate = getDbDateFromJdateStr($date);
    $freeTimes = getDoctorFreeTimes($doctorId, $reqDate);
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-language" content="fa-IR">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>رزرو نوبت دکتر</title>
    
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
            <?php
                if($patient===false){
                    echo 'alert("برای رزرو نوبت ابتدا در سیستم لاگین کنید!"); return false;';
                }
            ?>
            if(document.getElementById('free_time').value == ""){
                alert("ابتدا یک زمان را انتخاب کنید!");
                return false;
            }
            if(confirm("آیا مطمئن هستید؟") == false) return false;
            return true;
        }
        
        function checkReserve(id){
            let changedCb = document.getElementById(id);
            let sendingInput = document.getElementById('free_time');
            if(changedCb.checked){
                for(let i=0; document.getElementById("cb"+i)!=null; i++){
                    let cb = document.getElementById("cb"+i);
                    if(changedCb != cb) cb.checked = false;
                }
                sendingInput.value = changedCb.value;
            }
            else sendingInput.value = "";
        }
    </script>
</head>

<body style="direction: rtl;">
    <span style="font-weight: bold; font-size: 20px;">لیست نوبت های موجود</span><br>
    <div id="doctor_free_times">
        <form method="post" action="reserve.php">
            <input id="free_time" name="free_time" type="hidden" value="">
            <table id="customers" style="width: 70%;">
                <tr>
                <th>شماره</th>
                <th>تاریخ</th>
                <th>زمان</th>
                <th>رزرو</th>
                </tr>

                <?php
                    for($i=0; count($freeTimes)>$i; $i++){
                        $freeTime = $freeTimes[$i];
                        echo "<tr>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$freeTime['date']."</td>";
                        echo "<td>".$freeTime['time']."</td>";
                        echo "<td>".'<input type="checkbox" id="cb'.$i.'" value="'.$freeTime['id'].'"'.
                                ' onchange="checkReserve(this.id);">'."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            
            <input type="submit" value="ثبت" name="submit_reserve" onclick="return submitForm();">
        </form>
    </div>
</body>



