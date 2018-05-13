<?php
    require_once ('functions.php');
    include_once("css_links.php");
    include_once("js_links.php");
    session_start();
    $doctor_id = $_GET["doctor_id"];
    $conn=db_connect();
    $query_1 = "select * from doctors inner join expertise on doctors.expertise_id = expertise.id where doctors.id =$doctor_id;";
    $query_2 = "select * from cliniks_doctors inner join cliniks on cliniks_doctors.clinik_id = cliniks.id where doctor_id =$doctor_id;";
    $query_3 = "select * from free_times inner join time_slots on free_times.time_slot_id = time_slots.id where doctor_id =$doctor_id;";
    $query_4 = "select * from reserves  inner join free_times on reserves.free_time_id = free_times.id inner join time_slots on free_times.time_slot_id = time_slots.id where free_times.doctor_id =$doctor_id;";

    $res_1=$conn->query($query_1);
    $res_2=$conn->query($query_2);
    $res_3=$conn->query($query_3);
    $res_4=$conn->query($query_4);
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
</head>

<body>
<div id="doctor_info">
    <?php
        $identity="";
        $name="";
        $address="";
        $phone="";
        $password="";
        $expertise_name="";
        if($res_1->num_rows > 0){
            $row = $res_1->fetch_assoc();
            $identity = $row["identity"];
            $name = $row["name"];
            $address = $row["address"];
            $phone = $row["phone"];
            $password = $row["password"];
            $expertise_name = $row["expertise_name"];
        }
    ?>
    <label for="identity">کد ملی</label>
    <input type="text" value=<?php echo $identity; ?> >
    <br/>
    <label for="name">نام</label>
    <input type="text" value=<?php echo $name; ?> >
    <br/>
    <label for="address">آدرس</label>
    <input type="text" value=<?php  echo $address; ?> >
    <br/>
    <label for="phone">شماره تلفن</label>
    <input type="text" value=<?php echo $phone; ?> >
    <br/>
    <label for="password">پسورد</label>
    <input type="password" value=<?php echo $password; ?> >
    <br/>
    <label for="expertise_name">تخصص</label>
    <input type="text" value=<?php echo $expertise_name; ?> >
    <br/>
</div>

<div id="doctor_clinik_info">
  
</div>

<div id="doctor_free_times">
    <?php
        echo '<table>';
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
        echo '</table>';
    ?>
</div>

<div id="doctor_reserved_times">
    <?php
        echo '<table>';
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
        echo '</table>';
    ?>
</div>

</body>


