<?php
    session_start();
    require_once('functions.php');
    
    if(isset($_REQUEST['exp_id']) && isset($_REQUEST['city_name'])){
        $exp_id = $_REQUEST['exp_id'];
        $city_name = $_REQUEST['city_name'];
        $insurance_id = $_REQUEST['insurance_id'];
        if ($insurance_id) {
            $doctors = selectDoctor($exp_id,$city_name,$insurance_id);
        }
        else{
            $doctors = selectDoctor($exp_id,$city_name);
        }
    }
    else{
        $doctors = getAllDoctors();
    }

    $dateStr = getJdateStr();
    
    if(!empty($_SESSION['identity'])) $patient = getPatient($_SESSION['identity']);
    else $patient=false;
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-language" content="fa-IR">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>انتخاب دکتر</title>
    <link rel="shortcut icon" type="image/png" href="assets/pics/icon.png"/>

    <link rel="stylesheet" href="assets/css/js-persian-cal.css">
    <link rel="stylesheet" href="assets/css/c_select_doctor.css">
    <link rel="stylesheet" type="text/css" href="assets/css/c_search.css"/>
    <script type="text/javascript" src="assets/js/js-persian-cal.min.js"></script>
    
    <script language="javascript">
        function selectChanged(){
            let docsArray = <?php echo json_encode($doctors); ?>;
            let docsSelect = document.getElementById('doctors');
            let a = document.getElementById('proflink');
            
            for(let i=0; docsArray.length>i; i++){
                let doctor = docsArray[i];
                if(doctor['id'] == docsSelect.value)
                    a.href = 'doctors.php?id=' + doctor['identity'];
            }
        }
    </script>
</head>

<body style="text-align: center; direction: rtl; font-family: 'B Nazanin';">
    <div class="container" >
        <?php
        include_once("navbar.php");
        ?>
    </div>
    <div class="find_main">
        <div class="pic_find">
            <img src="assets/pics/select.svg">
            <h2>دکتر مورد نظرتان را انتخاب کنید</h2>
        </div>

        <div class="find_box">
            <div class="f_box">
                <form method="get" action="reserve.php">
                    <!--                <label for="doctors">دکتر مورد نظر را انتخاب کنید</label><br>-->
                    <div class="control">
                        <p style="color: white; font-size: 30px; font-weight: bold; margin-right: -250px; margin-bottom: -50">دکتر: </p>
                        <span>
                            <select name="doctor" class="form-control" id="doctors" onchange="selectChanged();" style="border-radius:20px;font-size: 20px; margin-top: 50px ;width: 80%;height: 40px; margin-right: 10%">

                            <?php
                                for($i=0; count($doctors)>$i; $i++){
                                    $doctor = $doctors[$i];
                                    echo '<option value="'.$doctor['id'].'">'.$doctor['name'].'</option>';
                                }
                            ?>
                                
                            </select>
                            
                            <a id="proflink" href="
                                <?php
                                    if(count($doctors)>0) echo 'doctors.php?id='.$doctors[0]['identity']; 
                                ?>
                               " target="_blank">
                                <img src="assets/pics/doctor.png" style="height: 60px; width: auto; margin-top: 15px;">
                            </a>
                        </span>
                    </div>
                    <div class="date">
                        <p style="color: white; font-size: 30px; font-weight: bold; margin-right: -250px;margin-bottom: -15; margin-top: 20px;">زمان: </p>
                        <input type="text" id="pcal" class="pdate" name="date" readonly="true" style="color:black; border-radius:20px; font-size: 25px; margin-top: 20px; width: 80%; height: 35px; margin-right: 3px;" value="<?php echo $dateStr; ?>"><br>


                        <script type="text/javascript">
                        var objCal = new AMIB.persianCalendar( 'pcal', {
                        /*onchange: function( pdate ){
                            if( pdate ) {
                                    alert( pdate.join( '/' ) );
                            } else {
                                    alert( 'تاریخ واردشده نادرست است' );
                            }
                        }*/
                        });
                        </script>
                    </div>

                    <div class="sabt">
                            <input type="submit" value="ثبت" name="submit" style="border-radius:20px;font-size: 25px; color:white; margin-top: 20px; height:35px;width:45%; font-size: 80%; margin-right: 17%;background-color: darkred;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>