<?php
	session_start();
	$error = "";
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
?>	

<!DOCTYPE html>
<html dir="rtl">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Register</title>

<link rel="stylesheet" href="gk_inc.css">
<script src="gk_inc.js"></script>

</head>


<body>
<?php include("gk_inc_title.php") ?>

<?php include("menu.php") ?>

<?php include("picture_top.html") ?>
<table style="border-width: 0;background-image:url('Register.jpeg'); width: 100%; height:410px;margin-bottom:0;margin-top:0">
	<tr>
		<td style="border-width: 0">
		* יש לשים לב, כל השדות הן שדות חובה!

		<div align="center">
		<form method="post" action="checkRegister.php" >
		<div align="center" class="table1" style="width:55%;background-color:#C0C0C0">
		<b><?php echo $error ?></b>
		<table align="center" style="border-width: 0;border-color:silver; background-color:#C0C0C0" >
			<tr>
			<td style="border-width: 0; text-align: right; height: 12px; width: 252px;">
			שם פרטי<br>
			<input name="name" type=text placeholder="הכנס שם פרטי"  required="" oninvalid="this.setCustomValidity('אנא הכנס שם פרטי')" oninput="setCustomValidity('')" style="width: 160px; margin-right: 0px; height: 42px >
		</td>
					<td style="border-width: 0; text-align: right; height: 12px; width: 252px;">
			שם משפחה<br>
			<input name="fname" type=text placeholder="הכנס שם משפחה"  required="" oninvalid="this.setCustomValidity('אנא הכנס שם משפחה')" oninput="setCustomValidity('')" style="width: 160px; margin-right: 0px; height: 42px;">
		</td>
		<td style="border-width: 0; text-align: right; height: 12px; width: 252px;">
			תאריך לידה<br>
			<input name="dbirth" type=date placeholder="הכנס תאריך לידה"  required="" oninvalid="this.setCustomValidity('אנא הכנס תאריך לידה')" oninput="setCustomValidity('')" style="width: 160px; margin-right: 0px; height: 42px;">
		</td>
			<td style="border-width: 0; text-align: right; height: 12px; width: 252px;">
			שם משתמש<br>
			<input name="login" type=text placeholder="הכנס שם משתמש"  required="" oninvalid="this.setCustomValidity('אנא הכנס שם משתמש')" oninput="setCustomValidity('')" style="width: 160px; margin-right: 0px; height: 42px;">
		</td>	
	</tr>
	<tr style="height:100px">
		<td style="border-width: 0; text-align: right; width: 252px;">
			שנות ניסיון<br>
			<input name="yearsExp" type="number" placeholder="בחר שנות ניסיון"  required="" oninvalid="this.setCustomValidity('אנא הכנס מספר שנות ניסיון')" oninput="setCustomValidity('')" min="0" value="" style="width: 160px; height: 42px;"></td>
			<td style="border-width: 0; text-align: right; height: 12px; width: 265px;">
			&nbsp;סוג ניסיון<br><select name="SelectExp" oninvalid="this.setCustomValidity('אנא הכנס מספר שנות ניסיון')" oninput="setCustomValidity('')" style="width: 160px">
				<option></option>
				<option>מתחיל</option>
				<option>חובבן</option>
				<option>נערים-נוער</option>
				<option>בוגרים - עד ליגה א'</option>
				<option>בוגרים - ליגות גבוהות </option>
			</select></td>
			<td style="border-width: 0; height: 12px; width: 160px; text-align: right;">
			רמת כושר<br>
			<select name="fitLevel" style="width: 160px; margin-left: 0">
				<option></option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
							</select>
			</td>
			<td style="border-width: 0; text-align: right; height: 12px; width: 252px;">
			סיסמה<br>
			<input name="password" type="password" pattern=".{0}|.{8,}"   required title="יש לבחור סיסמא עם לפחות 8 תווים" placeholder="בחר סיסמא עם 8 תוום לפחות"  oninvalid="this.setCustomValidity('אנא בחר סיסמא עם לפחות 8 תווים')" oninput="setCustomValidity('')" value="" style="width: 160px; margin-right: 0px; height: 42px;">
		</td>	

	</tr>
	<tr>
			<td style="border-width: 0; text-align: right; height: 32px; width: 252px;">
			גובה (ס"מ)<br>
			<input name="height" type=number placeholder="הכנס גובה"  required="" oninvalid="this.setCustomValidity('אנא הכנס את הגובה שלך')" oninput="setCustomValidity('')" min="150" max="210" value="" style="width: 160px; margin-right: 0px; height: 42px;">
		</td>
			<td style="border-width: 0; text-align: right; height: 32px; width: 160px;">
			משקל (ק"ג)<br>
			<input name="weight" type=number placeholder="הכנס משקל"  required="" oninvalid="this.setCustomValidity('אנא הכנס את המשקל שלך')" oninput="setCustomValidity('')" min="45" max="150" value="" style="width: 160px; height: 42px;">
		</td>

			<td style="border-width: 0; height: 12px; width: 160px; text-align: right;">
			מין<br><select name="SelectGender" style="width: 160px">
				<option></option>
				<option>זכר</option>
				<option>נקבה</option>
			</select></td>
	</tr>

</table>
</div>

<input class="td1" name="Reset1" type="reset" value="איפוס">&nbsp;&nbsp;&nbsp;
<button class="registerbtn" name="Submit1" type="submit" value="אישור" />אישור



</form>
<style>

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 17px 6px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width:150px
}
.registerbtn:hover {
  opacity:1;
}
</style>
</body>

</html>
