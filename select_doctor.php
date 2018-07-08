<?php
    require_once('functions.php');
    require_once('jdf.php');
    if(isset($_REQUEST['exp_id']) && isset($_REQUEST['city'])){
        $exp_id = $_REQUEST['exp_id'];
        $city = $_REQUEST['city'];
        $res = select_doctor($exp_id,$city);
    }
    else{
        $res = getAllDoctors();
    }
    
    $day_number = tr_num(jdate('j'), 'en');
    $month_number = tr_num(jdate('n'), 'en');
    $year_number = tr_num(jdate('y'), 'en');
    $dateStr = $year_number . "/" . $month_number . "/" . $day_number;
    
    if(!empty($_SESSION['identity'])) $patient = getPatient($_SESSION['identity']);
    else $patient=false;
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-language" content="fa-IR">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>جست و جوی نوبت دکتر</title>
    
    <link rel="stylesheet" href="assets/css/js-persian-cal.css">
    <script type="text/javascript" src="assets/js/js-persian-cal.min.js"></script>
</head>

<body style="text-align: center">
    <div class="form-group">
        <form method="get" action="reserve.php">
            <label for="doctors">دکتر مورد نظر را انتخاب کنید</label><br>
            <select name="doctor" class="form-control" id="doctors">
            <?php
            while($row = mysqli_fetch_array($res)){?>
                <option value="<?=$row['id']?>"><?=$row['name']?>

            <?php } ?>
            </select>
            
            <br><br>
            
            <div>
                <input type="text" id="pcal" class="pdate" name="date" readonly="true" value="<?php echo $dateStr; ?>"><br>
            </div>
            
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
            
            <input type="submit" value="ثبت" name="submit">
        </form>
    </div>
</body>