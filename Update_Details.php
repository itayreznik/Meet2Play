<?php
	session_start();
	include("gk_inc_title_connected.php");
	$error = "";
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	

	
	$id = $_SESSION['id'];
	
	$query10= "SELECT last_name,height,weight,exp_years,exp_type,fittness_level FROM users WHERE user_id=\"$id\" ";
	$result10 = $conn->query($query10);
	$row10 = $result10->fetch_array(MYSQLI_ASSOC);
	$fname = $row10["last_name"];
	$weight = $row10["weight"];
	$height = $row10["height"];
	$yearsExp = $row10["exp_years"];
	$SelectExp = $row10["exp_type"];
	$fitLevel = $row10["fittness_level"];
	
	$login = $_SESSION['login'];

?>	
 


<!DOCTYPE html>
<html dir="rtl">

<head>


<style>

.bg {
    /* The image used */
    background-image: url("weekly.jpg");
    

    /* Full height */
	height:auto;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }

</style>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="styletest.css"/>
<title>עדכון פרטים</title>

<script>
function idleLogout() {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer;  // catches touchscreen presses as well      
    window.ontouchstart = resetTimer; // catches touchscreen swipes as well 
    window.onclick = resetTimer;      // catches touchpad clicks as well
    window.onkeypress = resetTimer;   
    window.addEventListener('scroll', resetTimer, true); // improved; see comments
   

    function yourFunction() {
        alert("נותקת מהמערכת עקב חוסר פעילות");
        window.location.href = 'HomePage.php';
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(yourFunction,900000);  // time is in milliseconds
    }
}

/*call the function*/
    idleLogout();
</script>


</head>


<body class="bg">
<div class="content_section" align="center">
            <h1 style="color:black; text-align: center;">
                               <span style="color: white">  עריכת פרטי משתמש</span> <br /> 
            </h1>
            <b style="color:white;font-size:x-large;align:center"><?php echo $error ?></b>
            <div class="content_group form_tv">
                <div>
<form action="checkUpdate.php" method="post">
<input class="tv_form_field w-input" id="name" name="name" type=text placeholder="שם פרטי: <?php echo $name;?>"  oninvalid="this.setCustomValidity('אנא הכנס שם פרטי')" oninput="setCustomValidity('')" />
<input class="tv_form_field w-input" id="fname" name="fname" type=text placeholder="שם משפחה: <?php echo $fname;?>"  oninvalid="this.setCustomValidity('אנא הכנס שם משפחה')" oninput="setCustomValidity('')" />
<input class="tv_form_field w-input" id="email" name="login" type=email placeholder="דואר אלקטרוני (שם משתמש): <?php echo $login;?>"  oninvalid="this.setCustomValidity('אנא הכנס מייל חוקי')" oninput="setCustomValidity('')"/>
<input class="tv_form_field w-input" id="password" name="password" type="password" pattern=".{8,}"    title="יש לבחור סיסמא עם לפחות 8 תווים" placeholder="סיסמא (8 תווים לפחות)"  oninvalid="this.setCustomValidity('אנא בחר סיסמא עם לפחות 8 תווים')" oninput="setCustomValidity('')"/>
<input class="tv_form_field w-input" id="height" name="height" type=number placeholder='גובה(ס"מ): <?php echo $height;?>'  oninvalid="this.setCustomValidity('אנא הכנס את הגובה שלך')" oninput="setCustomValidity('')" min="150" max="210" value=""/> 
<input class="tv_form_field w-input" id="weight" name="weight" type=number placeholder='משקל(ק"ג): <?php echo $weight;?>'  oninvalid="this.setCustomValidity('אנא הכנס את המשקל שלך')" oninput="setCustomValidity('')" min="45" max="150" value="" /> 
<input class="tv_form_field w-input" id="yearsExp" name="yearsExp" type="number" placeholder="שנות ניסיון: <?php echo $yearsExp;?>"  oninvalid="this.setCustomValidity('אנא הכנס מספר שנות ניסיון')" oninput="setCustomValidity('')" min="0" value="">                
 <select class="tv_form_field w-input" id="SelectExp" name="SelectExp" oninvalid="this.setCustomValidity('אנא הכנס מספר שנות ניסיון')" oninput="setCustomValidity('')">
				<option disabled="disabled" selected="selected" value="0">סוג ניסיון : <?php echo $SelectExp?></option>
				<option>מתחיל</option>
				<option>חובבן</option>
				<option>נערים-נוער</option>
				<option>בוגרים - עד ליגה א'</option>
				<option>בוגרים - ליגות גבוהות </option>
			</select>
<select class="tv_form_field w-input" id="fitLevel" name="fitLevel">
				<option style="color:green;" disabled="disabled" selected="selected" value="0">רמת כושר : <?php echo $fitLevel?></option>
				<option>לא מתאמן</option>
				<option>מתאמן פעם בשבוע</option>
				<option>מתאמן פעמיים בשבוע</option>
				<option>מתאמן 3-4 פעמים בשבוע</option>
				<option>מתאמן מעל 4 פעמים בשבוע</option>
							</select>

                                                              
                                 <input type="submit" value="עדכון" class="top_reg_button form_tv w-button" style="margin-bottom:60px;">
            
 
                       
                        
           
</form>                </div>
            </div>
        </div>

</body>


</html>
