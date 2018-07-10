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
    <title> پزشکان پر مخاطب </title>
    <?php
    include_once("css_links.php");
    include_once("js_links.php");
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/c_search.css"/>
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
</head>
<body>
<div class="t" align="center">
        <div class="b_5">
            <span style="font-weight: bold; font-size: 20px;">جدیدترین پزشکان</span><br>
        </div>
        <div class="patient_table">
            <div id="newest_doctors">
                <table id="customers" style="width: 70%;">
                    <tr>
                    <th>نام پزشک</th>
                    <th>آدرس</th>
                    <th>شماره تلفن</th>
                    </tr>

                    <?php
                        for($i=0; count($newestDoctors)>$i; $i++){
                            $newDoctor = $newestDoctors[$i];
                            echo "<tr>";
                            echo "<td>".$newDoctor['name']."</td>";
                            echo "<td>".$newDoctor['address']."</td>";
                            echo "<td>".$newDoctor['phone']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
</div>

        <br/>
        <br/>

<div class="t" align="center">

    <div class="b_5">
        <span style="font-weight: bold; font-size: 20px;">محبوب ترین  پزشکان</span><br>
    </div>
    <div class="patient_table">
        <div id="most_popular_doctors">
            <table id="customers" style="width: 70%;">
                <tr>
                <th>نام پزشک</th>
                <th>آدرس</th>
                <th>شماره تلفن</th>
                </tr>

                <?php
                    for($i=0; count($mostPopularDoctors)>$i; $i++){
                        $mostPopularDoctor = $mostPopularDoctors[$i];
                        echo "<tr>";
                        echo "<td>".$mostPopularDoctor['name']."</td>";
                        echo "<td>".$mostPopularDoctor['address']."</td>";
                        echo "<td>".$mostPopularDoctor['phone']."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</div>
</body>

.patient_table{
margin-top: 10px;
padding-top: 50px;
height: 400px;
background-color: darkgray;
width: 100%;
}

#customers{
/*float: right;*/
margin-right: 15%;
}