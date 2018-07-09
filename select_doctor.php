<?php
    session_start();
    require_once('functions.php');
    
    if(isset($_REQUEST['exp_id']) && isset($_REQUEST['city'])){
        $exp_id = $_REQUEST['exp_id'];
        $city = $_REQUEST['city'];
        $res = select_doctor($exp_id,$city);
    }
    else{
        $res = getAllDoctors();
    }

    $dateStr = getJdateStr();
    
    if(!empty($_SESSION['identity'])) $patient = getPatient($_SESSION['identity']);
    else $patient=false;
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-language" content="fa-IR">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>جست و جوی نوبت دکتر</title>

    <link rel="stylesheet" href="assets/css/js-persian-cal.css">
    <link rel="stylesheet" href="assets/css/c_select_doctor.css">
    <link rel="stylesheet" type="text/css" href="assets/css/c_search.css"/>
    <script type="text/javascript" src="assets/js/js-persian-cal.min.js"></script>
</head>

<body style="text-align: center">
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
                    <p style="color: white;font-size: 25px;margin-right: -250px; margin-bottom: -50">: دکتر</p>
                    <select name="doctor" class="form-control" id="doctors" style="border-radius:20px;font-size: 20px; margin-top: 50px ;width: 80%;height: 40px;margin-right: 10%">

                    <?php
                    while($row = mysqli_fetch_array($res)){?>
                    <option value="<?=$row['id']?>"><?=$row['name']?>

                    <?php } ?>
                    </select>

                            <br><br>
                </div>
                <div class="date">
                        <p style="color: white;font-size: 25px;margin-right: -250px;margin-bottom: -15">: زمان</p>
                        <input type="text" id="pcal" class="pdate" name="date" readonly="true" style="border-radius:20px;font-size: 25px; margin-top: 20px;width: 80%;height: 35px" value="<?php echo $dateStr; ?>"><br>


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