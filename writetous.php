<?php
	session_start();
	$error = "";
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
		$birth_date = "";
	if (isset($_SESSION['birth_date'])) {
		$birth_date= $_SESSION['birth_date'];
		unset($_SESSION['birth_date']);
	}

?>	
<?php 
if(isset($_SESSION['id']) ) {
include("gk_inc_title_connected.php"); }
else {
include("gk_inc_title.php");
}
?>


<!DOCTYPE html>
<html dir="rtl">
<head>
<b style="font-color:black;"><?php echo $error ?></b>
<b><?php echo $birth_date ?></b>
<style>

.bg {
    /* The image used */
    background-image: url("WriteToUs.jpg");
    

    /* Full height */
	height:auto;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }

table {
	font-family:Arial;
	font-size:x-large;

}

</style>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="styletest.css"/>
<title>דף פניות</title>



</head>


<body class="bg">
<div class="content_section" align="center">
            <h1 style="color:black;">
               <span style="color: white">כתבו לנו </span> <br /> 
            </h1>
            <div class="content_group form_tv">
                <div>
<form action="checkwritetous.php" method="post">
<input class="tv_form_field w-input" id="name" name="name" type=text placeholder="שם פרטי"  required="" oninvalid="this.setCustomValidity('אנא הכנס שם פרטי')" oninput="setCustomValidity('')" />
<input class="tv_form_field w-input" id="fname" name="fname" type=text placeholder="שם משפחה"  required="" oninvalid="this.setCustomValidity('אנא הכנס שם משפחה')" oninput="setCustomValidity('')" />
<input class="tv_form_field w-input" id="email" name="login" type=email placeholder="דואר אלקטרוני (שם משתמש)"  required="" oninvalid="this.setCustomValidity('אנא הכנס מייל חוקי')" oninput="setCustomValidity('')"/>
<textarea class="tv_form_field w-input" id="write" name="write" cols="20" rows="2" area placeholder="תוכן ההודעה:"></textarea>
                                                            
                                 <input type="submit" value="שלח" class="top_reg_button form_tv w-button" style="margin-bottom:60px;">
            
  
                       
                        
           
</form>                </div>
            </div>
        </div>

</body>


</html>
