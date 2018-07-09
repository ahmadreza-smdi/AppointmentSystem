<?php
    require_once("functions.php");
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
                    <ul class="nav navbar-nav navbar-right">
                        <li><a  class="nav navbar-nav navbar-right" style="color:white;font-size: 1em;font-family:Font_I;" href="lr.php">ورود/ثبت نام</a></li>
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