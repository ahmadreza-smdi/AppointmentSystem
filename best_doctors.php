<?php
    session_start();
    include_once("functions.php");

    $newestDoctors = getNewestDoctors();
    $mostPopularDoctors = getMostPopularDoctors();
    if(($newestDoctors === false || count($newestDoctors)==0) && ($mostPopularDoctors === false || count($mostPopularDoctors)==0)) die;
?>

<head>
    <link rel="stylesheet" href="assets/css/c_best_dr.css">
    <meta charset="UTF-8" />
    <title>پزشکان پر مخاطب</title>
    <link rel="shortcut icon" type="image/png" href="assets/pics/icon.png"/>
    <?php
    include_once("css_links.php");
    include_once("js_links.php");
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/c_search.css"/>
    
    <style>
        .customers {
            font-family: 'B Nazanin';
            font-size: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .customers td, .customers th {
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
    
</head>

<body style="direction: rtl; font-family: 'B Nazanin';">
    <div class="container" >
        <?php
            include_once("navbar.php");
        ?>
    </div>
    
    <div align="center" style="margin-top: 100px;">
        <div class="patient_table">
            <div class="b_5">
                <span style="font-weight: bold; font-size: 20px;">جدیدترین پزشکان</span><br>
            </div>
            <div style="width: 100%;" id="newest_doctors">
                <table class="customers" style="width: 100%;">
                    <tr>
                    <th>نام پزشک</th>
                    <th>آدرس</th>
                    <th>شماره تلفن</th>
                    </tr>

                    <?php
                        for($i=0; count($newestDoctors)>$i; $i++){
                            $doctor = $newestDoctors[$i];
                            echo '<tr>';
                            echo '<td><a href="doctors.php?id='.$doctor['identity'].'">'.$doctor['name'].'</a></td>';
                            echo '<td>'.$doctor['address'].'</td>';
                            echo '<td>'.$doctor['phone'].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div align="center" style="margin-top: 25px;">
        <div class="patient_table">
            <div class="b_5">
                <span style="font-weight: bold; font-size: 20px;">محبوب ترین  پزشکان</span><br>
            </div>
            <div id="most_popular_doctors">
                <table class="customers" style="width: 100%;">
                    <tr>
                    <th>نام پزشک</th>
                    <th>آدرس</th>
                    <th>شماره تلفن</th>
                    </tr>

                    <?php
                        for($i=0; count($mostPopularDoctors)>$i; $i++){
                            $doctor = $mostPopularDoctors[$i];
                            echo '<tr>';
                            echo '<td><a href="doctors.php?id='.$doctor['identity'].'">'.$doctor['name'].'</a></td>';
                            echo '<td>'.$doctor['address'].'</td>';
                            echo '<td>'.$doctor['phone'].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>