<?php
    require_once('functions.php');
    require_once("navbar.php");
    //$exp_id = $_REQUEST['exp_id'];
    $exp_id = 1;
    //$city = $_REQUEST['city']
    $city = "esf";
    $res = select_doctor($exp_id , $city);
    $counter=1;
    ?>
    <table class='table'>
        <thead>
            <tr>
                <th>شماره</th>
                <th>نام دکتر</th>
                <th>نام کلینیک</th>
            </tr>
        </thead>
        <tbody>

        <?php
        while($row = mysqli_fetch_array($res)){?>
            <tr>
                <td><?=$counter++?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['clinik']?></td>
            </tr
                
                
        <?php } ?>
        </tbody>
        </table>
    </div> 