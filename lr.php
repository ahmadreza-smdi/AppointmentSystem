<?php
    session_start();
    include_once("css_links.php");
    include_once("js_links.php");
    require_once("functions.php");
    $expertieses = getExpertises();
?>

    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->

        <title>Login and Registration Form with HTML5 and CSS3</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/lr.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
        <script language="javascript">
            function radioChanged(){
                var p1 = document.getElementById("regblood");
                var p2 = document.getElementById("regdis");
                var d1 = document.getElementById("regpay");
                var d2 = document.getElementById("regexp");
                var radp = document.getElementById("r_type_pat");
                var radd = document.getElementById("r_type_doc");
                let type;
                if(radp.checked) type = "patient";
                else type = "doctor";
                
                if(type=="patient"){
                    p1.style.display = "block";
                    p2.style.display = "block";
                    d1.style.display = "none";
                    d2.style.display = "none";
                }
                
                else{
                    p1.style.display = "none";
                    p2.style.display = "none";
                    d1.style.display = "block";
                    d2.style.display = "block";                    
                }
            }
            
            function registerSubmit(){
                let identity = document.getElementById("r_identity").value;
                let name = document.getElementById("r_name").value;
                let phone = document.getElementById("r_phone").value;
                let address = document.getElementById("r_address").value;
                let pass = document.getElementById("r_password").value;
                let passConf = document.getElementById("r_password_confirm").value;
                let blood = document.getElementById("r_blood_type").value;
                let disease = document.getElementById("r_disease").value;
                let vispay = document.getElementById("r_vispay").value;
                let exp = document.getElementById("r_exp").value;
                
                let radp = document.getElementById("r_type_pat");
                let radd = document.getElementById("r_type_doc");
                let type;
                if(radp.checked) type = "patient";
                else type = "doctor";
                
                if(!identity){alert("کد ملی را وارد کنید!"); return false;}
                if(!name){alert("نام و نام خوانوادگی را وارد کنید!"); return false;}
                if(!phone){alert("شماره تماس را وارد کنید!"); return false;}
                if(!address){alert("آدرس را وارد کنید!"); return false;}
                if(!pass){alert("پسورد را وارد کنید!"); return false;}
                
                if(isNaN(identity)){ alert("کد ملی نامعتبر است!"); return false;}
                if(isNaN(phone)){ alert("شماره تلفن نامعتبر است!"); return false;}
                if(!(pass === passConf)){ alert("عدم تطابق رمز عبور!"); return false;}
                
                if(type=="doctor"){
                    if(!vispay){alert("هزینه ویزیت را وارد کنید!"); return false;}
                    
                    let expArray = <?php echo json_encode($expertieses); ?> ;
                    let findId = false;
                    for(let i=0; expArray.length>i; i++)
                        if(exp === expArray[i]['expertise_name'])
                            findId=expArray[i]['id'];
                    if(findId===false){
                        alert("تخصص مورد نظر یافت نشد!");
                        return false;
                    }
                    else document.getElementById('r_exp_id').value = findId; 
                }
                
                else{
                    if( !(blood==="A+" || blood==="A-" ||
                        blood==="O+" || blood==="O-" ||
                        blood==="B+" || blood==="B-" ||
                        blood==="AB+" || blood==="AB-" || !blood) ){ alert("گروه خونی نامعتبر است!"); return false;
                    }                    
                }
                
                return true;
            }
            
            function loginSubmit(){
                return true;
            }
        </script>
        
    </head>
    <body>
        <div class="container">
           
            <header>
                <h1>فرم ورود و ثبت نام</h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="logic.php" method="post" autocomplete="on"> 
                                <input type="hidden" name="job" value="login"/>
                                <h1>ورود</h1> 
                                <p> 
                                    <label for="identity" class="uname" > شماره ملی </label>
                                    <input id="identity" name="identity" required="required" type="text" placeholder="شماره ملی خود را وارد فرمایید"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd">رمز عبور</label>
                                    <input id="password" name="password" required="required" type="password" placeholder="رمز عبور خود را وارد نمایید" /> 
                                </p>
                                <p> 
                                    <label for="type" class="uname" >بیمار</label>
                                    <input id="type" name="type" value="patient" required="required" type="radio"/>
                                </p>
                                <p>
                                    <label for="type" class="uname" >دکتر</label>
                                    <input id="type" name="type" value="doctor" required="required" type="radio"/>
                                </p>
                                
                                <p class="signin button"> 
                                    <input id="logsub" name="logsub" type="submit" value="ورود" onclick="return loginSubmit();"/> 
				</p>
                                <p class="change_link">
									هنوز ثبت نام نکرده ام ?
									<a href="#toregister" class="to_register">ثبت نام</a>
								</p>
                            </form>
                            
                        </div>

                        <div id="register" class="animate form">
                            <form  action="logic.php" method="post" autocomplete="on"> 
                                <input type="hidden" name="job" value="register"/>
                                <h1> ثبت نام </h1> 
                                <p> 
                                <label for="r_identity" class="uname" >شماره ملی</label>
                                <input id="r_identity" name="r_identity" type="text" placeholder="شماره ملی خود را وارد کنید" />
                                </p>
                                
                                <p> 
                                    <label for="r_name" class="uname"  > نام ونام خانوادگی</label>
                                    <input id="r_name" name="r_name" type="text" placeholder="نام و نام خانوادگی خود را وارد کنید"/> 
                                </p>
                                <p> 
                                    <label for="r_phone" class="uname" >شماره تلفن </label>
                                    <input id="r_phone" name="r_phone" type="text" placeholder="شماره تلفن خود را وارد نمایید"/>
                                </p>
                                <p> 
                                    <label for="ًr_address" class="uname" >آدرس </label>
                                    <input id="r_address" name="r_address" type="text" placeholder="آدرس خود را وارد نمایید"/>
                                </p>
                                <p> 
                                    <label for="r_password" class="youpasswd" >رمز عبور</label>
                                    <input id="r_password" name="r_password" type="password" placeholder=" رمز عبور خود را وارد نمایید"/>
                                </p>
                                <p> 
                                    <label for="r_password_confirm" class="youpasswd" >تایید رمز عبور </label>
                                    <input id="r_password_confirm" name="ًr_password_confirm" type="password" placeholder=" یک بار دیگر رمز را وارد نمایید"/>
                                </p>
                                
                                <div id="regblood" style="margin-top: 10px;">
                                    <p> 
                                        <label for="r_blood_type" class="uname" >گروه خونی </label>
                                        <input id="r_blood_type" name="r_blood_type" type="text" placeholder=" گروه خونی خود را وارد نمایید"/>
                                    </p>
                                </div>
                                
                                <div id="regdis" style="margin-top: 15px;">
                                    <p> 
                                        <label for="r_blood_type" class="uname" >بیماری خاص </label>
                                        <input id="r_disease" name="r_disease" type="text" placeholder="در صورت داشتن بیماری خاص وارد نمایید "/>
                                    </p>
                                </div>
                                
                                <div id="regpay" style="margin-top: 15px; display: none">
                                    <p> 
                                        <label for="r_blood_type" class="uname" >هزینه ویزیت </label>
                                        <input id="r_vispay" name="r_vispay" type="text" placeholder="هزینه ویزیت را وارد نمایید "/>
                                    </p>
                                </div>
                                
                                <div id="regexp" style="margin-top: 15px; display: none;">
                                    <p> 
                                        <label for="r_blood_type" class="uname" >تخصص </label>
                                        <input id="r_exp" type="text" list="list_exp" autocomplete="off" style="color: black; border-radius:20px; height:35px;font-size: 65%;margin-right: 10%"/><br>
                                         <datalist id="list_exp" name="list_exp">
                                         <?php
                                             foreach($expertieses as $exp){
                                                 echo '<option value="'.$exp['expertise_name'].'">'.$exp['expertise_name'].'</option>';
                                             }
                                         ?>
                                         </datalist>
                                         <input type="hidden" id="r_exp_id" name="r_exp_id"  />
                                    </p>
                                </div>
                                
                                <p style="margin-top: 15px;"> 
                                    <label for="r_type" class="uname" >بیمار</label>
                                    <input id="r_type_pat" name="r_type" value="patient" checked="true" type="radio" onchange="radioChanged();" />
                                </p>
                                <p>
                                    <label for="r_type" class="uname" >دکتر</label>
                                    <input id="r_type_doc" name="r_type" value="doctor" type="radio" onchange="radioChanged();" />
                                </p>
                                
                                <p class="signin button"> 
                                    <input type="submit" id="regsub" name="regsub" value="ثبت نام" onclick="return registerSubmit();"/> 
                                </p>
                                
                                <p class="change_link">  
									قبلا ثبت نام کرده ام ?
									<a href="#tologin" class="to_register"> ورود </a>
								</p>
                            </form>
                            
                        </div>
						
                    </div>
                    
                </div>  
            </section>
        </div>
    </body>
</html>