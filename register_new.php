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
<?php include("gk_inc_title.php") ?>


<!DOCTYPE html>
<html dir="rtl">

<head>
<b><?php echo $error ?></b>
<b><?php echo $birth_date ?></b>
<style>

.bg {
    /* The image used */
    background-image: url("Register.jpg");
    

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
<title>הרשמה</title>



</head>


<body class="bg">
<div class="content_section" align="right">
            <h1 style="color:black;">
                <span style="color: white">הרשמה למערכת </span> <br /> 
            </h1>
            <div class="content_group form_tv">
                <div>
<form action="checkRegister.php" method="post">
<input class="tv_form_field w-input" id="name" name="name" type=text placeholder="שם פרטי"  required="" oninvalid="this.setCustomValidity('אנא הכנס שם פרטי')" oninput="setCustomValidity('')" />
<input class="tv_form_field w-input" id="fname" name="fname" type=text placeholder="שם משפחה"  required="" oninvalid="this.setCustomValidity('אנא הכנס שם משפחה')" oninput="setCustomValidity('')" />
<input class="tv_form_field w-input" id="email" name="login" type=email placeholder="דואר אלקטרוני (שם משתמש)"  required="" oninvalid="this.setCustomValidity('אנא הכנס מייל חוקי')" oninput="setCustomValidity('')"/>
<input class="tv_form_field w-input" id="password" name="password" type="password" pattern=".{8,}"   required="" title="יש לבחור סיסמא עם לפחות 8 תווים" placeholder="סיסמא (8 תווים לפחות)"  oninvalid="this.setCustomValidity('אנא בחר סיסמא עם לפחות 8 תווים')" oninput="setCustomValidity('')"/>
<input class="tv_form_field w-input" id="height" name="height" type=number placeholder='הכנס גובה(בס"מ)'  required="" oninvalid="this.setCustomValidity('אנא הכנס את הגובה שלך')" oninput="setCustomValidity('')" min="150" max="210" value=""/> 
<input class="tv_form_field w-input" id="weight" name="weight" type=number placeholder='משקל (ק"ג)'  required="" oninvalid="this.setCustomValidity('אנא הכנס את המשקל שלך')" oninput="setCustomValidity('')" min="45" max="150" value="" /> 
<input class="tv_form_field w-input" id="yearsExp" name="yearsExp" type="number" placeholder="שנות ניסיון"  required="" oninvalid="this.setCustomValidity('אנא הכנס מספר שנות ניסיון')" oninput="setCustomValidity('')" min="0" value="">                
 <select class="tv_form_field w-input" id="SelectExp" name="SelectExp" oninvalid="this.setCustomValidity('אנא הכנס מספר שנות ניסיון')" oninput="setCustomValidity('')">
				<option style="color:green;" disabled="disabled" selected="selected" value="0">סוג ניסיון</option>
				<option>מתחיל</option>
				<option>חובבן</option>
				<option>נערים-נוער</option>
				<option>בוגרים - עד ליגה א'</option>
				<option>בוגרים - ליגות גבוהות </option>
			</select>
<select class="tv_form_field w-input" id="fitLevel" name="fitLevel">
				<option style="color:green;" disabled="disabled" selected="selected" value="0">רמת כושר</option>
				<option>לא מתאמן</option>
				<option>מתאמן פעם בשבוע</option>
				<option>מתאמן פעמיים בשבוע</option>
				<option>מתאמן 3-4 פעמים בשבוע</option>
				<option>מתאמן מעל 4 פעמים בשבוע</option>
							</select>

 <div class="tv_form_group">
                            <div style="color:black;">תאריך לידה:</div>
                        </div>
                        <div class="tv_form_group">
                            <select class="tv_form_field sm w-select" id="day" name="day"><option disabled="disabled" selected="selected" value="0">יום</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
                            <div class="tv_formgroup_txt">-</div>
                            <select class="tv_form_field sm w-select" id="month" name="month"><option disabled="disabled" selected="selected" value="0">חודש</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
                            <div class="tv_formgroup_txt">-</div>
                            <select class="tv_form_field sm w-select" id="year" name="year"><option disabled="disabled" selected="selected" value="0">שנה</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
</select>
                        </div>
                        <div style="background-color:white; text-align:center; width:46%; border-radius:6px;"  class="tv_form_group sex">
                  
                            <div class="tv_form_radiobutton w-clearfix w-radio">
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" id="radio1" value="זכר" name="radioGender" class="tv_radio_button w-radio-input" />
                                &nbsp;&nbsp;<label style="color:black;font-size:x-large" for="radio" class="w-form-label">זכר</label>
                            </div>
                            <div class="tv_form_radiobutton w-clearfix w-radio">
                                <input type="radio" id="radio2" value="נקבה" name="radioGender" class="tv_radio_button w-radio-input" />
                               &nbsp;&nbsp; <label style="color:black;font-size:x-large" for="radio-2" class="w-form-label">נקבה</label>
                            </div>
                        </div>
                                     
                                 <input type="submit" value="הרשמה" class="top_reg_button form_tv w-button" style="margin-bottom:60px;">
            
  
                       
                        
           
</form>                </div>
            </div>
        </div>

</body>


</html>
