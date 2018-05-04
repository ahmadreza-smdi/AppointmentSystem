
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <?php
            include_once("css_links.php");
            include_once("js_links.php");
        ?>


        <title>Login and Registration Form with HTML5 and CSS3</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/lr.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                            <form  action="logic.php" autocomplete="on"> 
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
									<input type="submit" value="ورود"/> 
								</p>
                                <p class="change_link">
									هنوز ثبت نام نکرده ام ?
									<a href="#toregister" class="to_register">ثبت نام</a>
								</p>
                            </form>
                            
                        </div>

                        <div id="register" class="animate form">
                            <form  action="logic.php" autocomplete="on"> 
                                <input type="hidden" name="job" value="register"/>
                                <h1> ثبت نام </h1> 
                                <p> 
                                    <label for="r_identity" class="uname" >شماره ملی</label>
                                    <input id="r_identity" name="r_identity" required="required" type="text" placeholder="شماره ملی خود را وارد کنید" />
                                </p>
                                <p> 
                                    <label for="r_name" class="uname"  > نام ونام خانوادگی</label>
                                    <input id="r_name" name="r_name" required="required" type="text" placeholder="نام و نام خانوادگی خود را وارد کنید"/> 
                                </p>
                                <p> 
                                    <label for="r_phone" class="uname" >شماره تلفن </label>
                                    <input id="r_phone" name="r_phone" required="required" type="text" placeholder="شماره تلفن خود را وارد نمایید"/>
                                </p>
                                <p> 
                                    <label for="ًr_address" class="uname" >آدرس </label>
                                    <input id="r_address" name="r_address" required="required" type="text" placeholder="آدرس خود را وارد نمایید"/>
                                </p>
                                <p> 
                                    <label for="r_password" class="youpasswd" >رمز عبور</label>
                                    <input id="r_password" name="r_password" required="required" type="password" placeholder=" رمز عبور خود را وارد نمایید"/>
                                </p>
                                <p> 
                                    <label for="ًr_password_confirm" class="youpasswd" >تایید رمز عبور </label>
                                    <input id="ًr_password_confirm" name="ًr_password_confirm" required="required" type="password" placeholder=" یک بار دیگر رمز را وارد نمایید"/>
                                </p>
                                <p> 
                                    <label for="r_blood_type" class="youpasswd" >گروه خونی </label>
                                    <input id="r_blood_type" name="r_blood_type" required="required" type="text" placeholder=" گروه خونی خود را وارد نمایید"/>
                                </p>
                                <p> 
                                    <label for="r_type" class="uname" >بیمار</label>
                                    <input id="r_type" name="r_type" value="patient" required="required" type="radio"/>
                                </p>
                                <p>
                                    <label for="r_type" class="uname" >دکتر</label>
                                    <input id="r_type" name="r_type" value="doctor" required="required" type="radio"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="ثبت نام"/> 
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