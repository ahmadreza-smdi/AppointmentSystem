<?php
    require_once('functions.php');
    //$exp_id = $_REQUEST['exp_id'];
    $exp_id = 1;
    $res = select_doctor($exp_id,$city);?>
    <div class="form-group">
        <label for="doctors">دکتر مورد نظر را انتخاب کنید</label>
        <select class="form-control" id="doctors">
        <?php
        while($row = mysqli_fetch_array($res)){?>
            <option value="<?=$row['id']?>"><?=$row['name']?>
                
                
        <?php } ?>
        </select>
    </div> 