    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <?php
            //include_once("css_links.php");
            //include_once("js_links.php");
            include_once("functions.php");
            getCliniksCities();
        ?>


        <title>Login and Registration Form with HTML5 and CSS3</title>
    </head>
    <body>
    
    <form action="welcome.php" method="get">
        
        <select name="expertise">
        <option value="">-----------------</option>
        <?php
        $expArray = getExpertises();
        foreach($expArray as $exp){
            echo '<option value="'.$exp.'">'.$exp.'</option>';
        }
        ?>
        </select>
        
        <select name="city">
        <option value="">-----------------</option>
        <?php
        $cities = getCliniksCities();
        foreach($cities as $city){
            echo '<option value="'.$city.'">'.$city.'</option>';
        }
        ?>
        </select>
        
        <input type="submit">
    </form>
        