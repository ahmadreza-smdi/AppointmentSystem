<?php
    require_once("functions.php");
    session_start();
?>
<nav class="navbar navbar-default" style="background-color:#7c84e8; z-index: 9999">
                <div class="container-fluid" style="padding-right: 10%; padding-left: 10%; margin-right: auto; margin-left: auto; margin-top: 5px; margin-bottom: 5px; z-index: 9999">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="color: white " href="index.php">خانه </a>
                    </div>

                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">جستجو</button>
                    </form>
                    
                    <?php
                        if(!isset($_SESSION['identity'])){
                    ?>
                    <ul class="nav navbar-nav navbar-right"
                        style="
                            text-align: center;
                            width: 120px;
                            color: black;
                            border-radius:20px;
                            height:35px;
                            padding-bottom: 10px;
                            /*margin-right: 6px;*/
                            /*margin-right: 10%;*/
                            margin-top: 7px;
                            border-style:solid;
                            border-width: 1px;
                            border-width: 1px;
                            border-radius: 50px;
                            border-color: #001b6e;
                            background-color: white;
                             ">
                        <li><a  class="nav navbar-nav navbar-right" style="margin-left: 2px; margin-bottom: 1em;font-size: 1.5em;font-family:Font_I;" href="lr.php">ورود/ثبت نام</a></li>
                    </ul>
                    <?php
                        }else{?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="logic.php?job=session_des">خروج</a></li>
                        </ul>
                       <?php }
                    ?>
                    <?php 
                        if(isset($_SESSION['type']) && $_SESSION['type']=='patient'){
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="patient_panel.php">پنل کاربری</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="searchexp.php">رزرو وقت دکتر</a></li>
                    </ul>
                    <?php }else{
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a  style="color: white " href="doctor_panel.php">پنل کاربری</a></li>
                    </ul>
                    <?php }
                    ?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>