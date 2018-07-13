<?php
    session_start();
    include_once("functions.php");

    $expertieses = getExpertises();
    $cities = getCliniksCities();
    $insurances = getInsurances();
?>

<head>
    <meta charset="UTF-8" />
    <title>جستجوی پزشکان</title>
    <link rel="shortcut icon" type="image/png" href="assets/pics/icon.png"/>
    <?php
    include_once("css_links.php");
    include_once("js_links.php");
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/c_search.css"/>

    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->

    <script language="javascript">
        var expArray = <?php echo json_encode($expertieses); ?> ;
        var citiesArray = <?php echo json_encode($cities); ?> ;
        var insurancesArray = <?php echo json_encode($insurances); ?>;
        function submitForm(){
            let expInp = document.getElementById('txt_exp').value;
            let cityInp = document.getElementById('txt_city').value;
            let insuranceInp = document.getElementById('txt_insurance').value;
            let findId = false;
            for(let i=0; expArray.length>i; i++)
                if(expInp === expArray[i]['expertise_name'])
                    findId=expArray[i]['id'];
            if(findId===false){
                alert("تخصص مورد نظر یافت نشد!");
                return false;
            }
            else document.getElementById('exp_id').value = findId;

            let findCityId = false;
            for(let i=0; citiesArray.length>i; i++)
                if(cityInp === citiesArray[i]["city_name"])
                    findCityId=citiesArray[i]["city_id"];
            if(findCityId===false){
                alert("شهر مورد نظر یافت نشد!");
                return false;
            }
            else document.getElementById('city_id').value = findCityId;
            if( document.getElementById('txt_insurance').value ){
                let findInsuranceId = false;
                for(let i=0; insurancesArray.length>i; i++)
                    if(insuranceInp === insurancesArray[i]["insurance_name"])
                        findInsuranceId=insurancesArray[i]["id"];
                if(findInsuranceId===false){
                    alert("نام بیمه مورد نظر یافت نشد!");
                    return false;
                }
                else document.getElementById('insurance_id').value = findInsuranceId;
            }
        }
    </script>


    <title>Login and Registration Form with HTML5 and CSS3</title>
</head>
<body style="direction: rtl; font-family: 'B Nazanin';">
    <div class="container" >
        <?php
        include_once("navbar.php")
        ?>
    </div>
    
    <div class="search_main">
        <div class="search_box">
            <div class="s_box">
                <form action="select_doctor.php" method="get" style="direction: rtl;">

                    <div class="exp">
                        <p style="margin-top: 10px;">* تخصص:</p>
                        <input id="txt_exp" type="text" list="list_exp" autocomplete="off" style="color: black; border-radius:20px; height:35px;font-size: 65%; margin-right: 10%; padding: 10px;"/><br>
                        <datalist id="list_exp" name="list_exp">
                        <?php
                            foreach($expertieses as $exp){
                                echo '<option value="'.$exp['expertise_name'].'">'.$exp['expertise_name'].'</option>';
                            }
                        ?>
                        </datalist>
                        <input type="hidden" id="exp_id" name="exp_id"  />
                    </div>


                    <div class="city">
                        <input type="hidden" id="city_name" name="city_name" />
                        <p style="margin-top: 10px;">* شهر :</p>
                        <input id="txt_city" type="text" list="list_city" autocomplete="off" style="color: black;border-radius:20px ;height:35px;font-size: 65%;margin-right: 10%; padding: 10px;" /><br>
                        <datalist id="list_city" name="list_city">
                            <?php
                            foreach($cities as $city){
                                echo '<option value="'.$city.'">'.$city.'</option>';
                            }
                            ?>
                        </datalist>
                        
                        <input type="hidden" id="insurance_id" name="insurance_id" />
                        <p style="margin-top: 10px;">* بیمه :</p>
                        <input id="txt_insurance" type="text" list="list_insurance" autocomplete="off" style="color: black;border-radius:20px ;height:35px;font-size: 65%;margin-right: 10%; padding: 10px;" /><br>
                        <datalist id="list_insurance" name="list_insurance">
                            <?php
                            foreach($insurances as $insurance){
                                echo '<option value="'.$insurance['insurance_name'].'">'.$insurance['insurance_name'].'</option>';
                            }
                            ?>
                        </datalist>
                    </div>

                    <div s_bottom>
                    <input type="submit" value="جستجوی پزشکان" style="border-radius:20px;font-size: 20px; color:white; margin-top: 20px; height:35px; width:100%; margin-right: 10%; background-color: darkred; margin-top: 30px;" onclick="return submitForm(); ">
                    </div>

                </form>
            </div>
        </div>

        <div class="pic_search">
            <img src="assets/pics/search.svg">
                <div class="text">
                    <h2 style="font-size: 2em;">دکتر مورد نظرتان را پیدا کنید</h2>
                </div>
            </div>
    </div>
</body>