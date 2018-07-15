<?php
    require_once("functions.php");
?>
<nav class="navbar navbar-default" style="background-color:#ad1457; z-index: 9999">
    <div class="container-fluid" style="padding-right: 10%; padding-left: 10%; margin-right: auto; margin-left: auto; margin-top: 5px; margin-bottom: 5px; z-index: 9999">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="color: white; font-family:Font_I; font-size: 25px;" href="index.php">خانه</a>
        </div>

        <form class="navbar-form navbar-left" dire>
            <div class="form-group" style="direction: rtl;">
            <input type="text" class="form-control" placeholder="عبارت مدنظر خود را وارد کنید..." style="float: right">
            </div>
            <button type="submit" class="btn btn-default" style="color: brown; font-family:Font_I; font-size: 15px;">جستجو</button>
        </form>

        <?php
            if(!isset($_SESSION['identity'])){
        ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a  class="nav navbar-nav navbar-right" style="color:white; font-size: 1em; font-family:Font_I;" href="lr.php">ورود/ثبت نام</a></li>
        </ul>
        <?php
            }else{?>
            <ul class="nav navbar-nav navbar-right">
                <li><a style="color: white; font-family:Font_I; font-size: 25px;font-family:Font_I; font-size: 25px;" href="logic.php?job=session_des">خروج</a></li>
            </ul>
           <?php }
        ?>
        <?php
            if(isset($_SESSION['type']) && $_SESSION['type']=='patient'){
        ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a style="color: white; font-family:Font_I; font-size: 25px;" href="patient_panel.php">پنل کاربری</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a style="color: white; font-family:Font_I; font-size: 25px;" href="searchexp.php">رزرو وقت دکتر</a></li>
        </ul>

        <div class="btn btn-default" style="margin-top: 8px;float: left">
            <div>
                <?php 
                    //getApi();
                    echo '0000';
                ?>
            </div>
        </div>

         <?php }else{
        ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a  style="color: white; font-family:Font_I; font-size: 25px;" href="doctor_panel.php">پنل کاربری</a></li>
        </ul>
        <?php }
        ?>
    </div>
</nav>