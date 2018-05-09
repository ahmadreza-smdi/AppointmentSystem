    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <?php
            //include_once("css_links.php");
            //include_once("js_links.php");
            include_once("functions.php");
            
            $expertieses = getExpertises();
            $cities = getCliniksCities();
        ?>
        
        <script language="javascript">
            var expArray = <?php echo json_encode($expertieses); ?> ;
            var citiesArray = <?php echo json_encode($cities); ?> ;
            
            function submitForm(){
                let expInp = document.getElementById('txt_exp').value;
                let cityInp = document.getElementById('txt_city').value;
                
                let findId = false;
                for(let i=0; expArray.length>i; i++)
                    if(expInp == expArray[i]['name'])
                        findId=expArray[i]['id'];
                if(findId===false){
                    alert("تخصص مورد نظر یافت نشد!");
                    return false;
                }
                else document.getElementById('exp_id').value = findId; 
                
                let findCity = false;
                for(let i=0; citiesArray.length>i; i++)
                    if(cityInp == citiesArray[i])
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
    
        <form action="select_doctor.php" method="get" style="direction: rtl;">
        
            تخصص: <input id="txt_exp" type="text" list="list_exp" autocomplete="off" /><br>
        <datalist id="list_exp" name="list_exp">
            <?php
                foreach($expertieses as $exp){
                    echo '<option value="'.$exp['name'].'">'.$exp['name'].'</option>';
                }
            ?>
        </datalist>
        
            شهر: <input id="txt_city" type="text" list="list_city" autocomplete="off" /><br>
        <datalist id="list_city" name="list_city">
            <?php
                foreach($cities as $city){
                    echo '<option value="'.$city.'">'.$city.'</option>';
                }
            ?>
        </datalist>
        
        <input type="hidden" id="exp_id" name="exp_id" />
        <input type="hidden" id="city" name="city" />
        
        <input type="submit" value="جستجوی پزشکان" onclick="return submitForm();">
    </form>
        