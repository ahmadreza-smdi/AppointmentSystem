<?php
    session_start();
    include_once("functions.php");

    $expertieses = getExpertises();
    $cities = getCliniksCities();
?>

<head>
    <meta charset="UTF-8" />
    <title> جستجوی ‍پزشکان </title>
    <?php
    include_once("css_links.php");
    include_once("js_links.php");
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/c_search.css"/>

    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->

    <script language="javascript">
        var expArray = <?php echo json_encode($expertieses); ?> ;
        var citiesArray = <?php echo json_encode($cities); ?> ;

        function submitForm(){
            let expInp = document.getElementById('txt_exp').value;
            let cityInp = document.getElementById('txt_city').value;

            let findId = false;
            for(let i=0; expArray.length>i; i++)
                if(expInp === expArray[i]['expertise_name'])
                    findId=expArray[i]['id'];
            if(findId===false){
                alert("تخصص مورد نظر یافت نشد!");
                return false;
            }
            else document.getElementById('exp_id').value = findId;

            let findCity = false;
            for(let i=0; citiesArray.length>i; i++)
                if(cityInp === citiesArray[i])
                    findCity=citiesArray[i];
            if(findCity===false){
                alert("شهر مورد نظر یافت نشد!");
                return false;
            }
            else document.getElementById('city').value = findCity;
        }
    </script>


    <title>Login and Registration Form with HTML5 and CSS3</title>
</head>
<body>
    <div class="search_main">
        <div class="container" >
            <?php
            include_once("navbar.php")
            ?>
        </div>
        <div class="search_box">
            <div class="s_box">
                <form action="select_doctor.php" method="get" style="direction: rtl;">

                    <div class="exp">
                        <p>* تخصص:</p>
                        <input id="txt_exp" type="text" list="list_exp" autocomplete="off" style="color: black; border-radius:20px; height:35px;font-size: 65%;margin-right: 10%"/><br>
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
                        <input type="hidden" id="city" name="city" />
                        <p>* شهر :</p>
                        <input id="txt_city" type="text" list="list_city" autocomplete="off" style="color: black;border-radius:20px ;height:35px;font-size: 65%;margin-right: 10%" /><br>
                        <datalist id="list_city" name="list_city">
                            <?php
                            foreach($cities as $city){
                                echo '<option value="'.$city.'">'.$city.'</option>';
                            }
                            ?>
                        </datalist>
                    </div>


                    <div s_bottom>
                    <input type="submit" value="جستجوی پزشکان" style="border-radius:20px;font-size: 25px; color:white; margin-top: 20px; height:35px;width:100%; font-size: 100%;margin-right: 10%;background-color: darkred;" onclick="return submitForm(); ">
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