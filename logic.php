<?php
    session_start();
    require_once ('functions.php');
    
    $job=$_REQUEST['job'];
    if($job == 'session_des'){
        session_des();
        header("location:index.php?msg='you are now sign out'");
    }
    if($job=='register'){
        $identity = $_REQUEST['r_identity'];
        $phone = $_REQUEST['r_phone'];
        $address = $_REQUEST['r_address'];
        $name = $_REQUEST['r_name'];
        $password = $_REQUEST['r_password'];
        
        $blood_type = $_REQUEST['r_blood_type'];
        $disease = $_REQUEST['r_disease'];
        
        $vispay = $_REQUEST['r_vispay'];
        $expId = $_REQUEST['r_exp_id'];
        
        $type = $_REQUEST['r_type'];
        $link=db_connect();
        
        if($type == 'doctor'){
            $query1="select * from doctors where identity='".mysqli_real_escape_string($link,$identity)."'";
            $query2="insert into doctors set identity='".mysqli_real_escape_string($link,$identity).
                    "',vispay='".mysqli_real_escape_string($link,$vispay).
                    "',expertise_id='".mysqli_real_escape_string($link,$expId).
                    "',name='".mysqli_real_escape_string($link,$name).
                    "',address='".mysqli_real_escape_string($link,$address).
                    "',phone='".mysqli_real_escape_string($link,$phone).
                    "',password='".mysqli_real_escape_string($link,$password)."'";
        }
        else{
            $query1="select * from patients where identity='".mysqli_real_escape_string($link,$identity)."'";
            $query2="insert into patients set identity='".mysqli_real_escape_string($link,$identity).
                    "',blood_type='".mysqli_real_escape_string($link,$blood_type).
                    "',disease='".mysqli_real_escape_string($link,$disease).
                    "',name='".mysqli_real_escape_string($link,$name).
                    "',address='".mysqli_real_escape_string($link,$address).
                    "',phone='".mysqli_real_escape_string($link,$phone).
                    "',password='".mysqli_real_escape_string($link,$password)."'";
        }
        $res=$link->query($query1);
        if(mysqli_num_rows($res)==0){
            if($link->query($query2)){
                header('location:index.php?msg=well done');
            }
            else{
                //header('location:lr.php?msg=faild');
                echo "Error: " . $query2 . "<br>" . $link->error;
                die;
            }
        }
        else{
            header('location:lr.php?msg=user are registered');
        }
        db_dis($link);
        
    }
    if($job=='login'){
        $identity=$_REQUEST['identity'];
        $password=$_REQUEST['password'];
        $type = $_REQUEST['type'];
        $link=db_connect();
        if($type == "patient"){
            $query="select * from patients where identity='".mysqli_real_escape_string($link,$identity)."' and password='".mysqli_real_escape_string($link,$password)."'";
        }
        else{
            $query="select * from doctors where identity='".mysqli_real_escape_string($link,$identity)."' and password='".mysqli_real_escape_string($link,$password)."'";
        }
        
        $res=$link->query($query);
        if(mysqli_num_rows($res)==1){
            $row=mysqli_fetch_array($res);
            $_SESSION['identity']=$row['identity'];
            $_SESSION['type'] = $type;
            $_SESSION['name']=$row['name'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['address']=$row['address'];
            $_SESSION['password']=$row['password'];
            header("location:index.php?msg=well done");
        }
        else{
           header('location:lr.php?msg=user are not exist');
        }
    }
