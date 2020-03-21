<?php
	session_start();
	$error = "";
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
?>
<?php include("gk_inc_title.php") ?>

	
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="gk_inc.css">

<title>התחברות</title>


<style>

.div {
width:35%;
background-color:#C0C0C0;
height: 140px; 
margin-right: 12px; 
opacity:0.85;	

}

@media only screen and (max-width : 900px) {
.div {
width:250px;
background-color:#C0C0C0;
height: 140px; 
margin-right: 12px; 
opacity:0.85;	

}
}

@media only screen and (max-width : 900px) {
input[type=submit] {
width: 80px;
}
input[type=reset] {
width: 80px;
}

}
.bg {
    /* The image used */
    background-image: url("Login.jpg");
    

    /* Full height */
	height:auto;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }

    
    
</style>
</head>

<body class="bg">



		<div align="center">
		<h1 style="color:black; height: 101px;">
                <span style="color: white">התחברות למערכת</span> <br /> 
            </h1>

		<form method="post" action="gk_check.php" style="height: 348px" >
		<div class ="div" align="center">
<div>
<b><?php echo $error ?></b>
		<table align="center" style="border-width: 0; width:100%">
		<tr>
		<td style="border-width: 0; width: 45%; height: 72px; text-align: center;">שם משתמש</td>
			<td style="border-width: 0; text-align: center; width: 55%; height: 72px;">
			<input name="login" type="text" style="width:80%;">
		</td>
	</tr>
	<tr>
		<td style="border-width: 0; width: 45%; text-align: center;">סיסמא</td>
		<td style="border-width: 0;text-align: center;width: 55%;">
			<input name="password" type="password" style="width:80%;"></td>
	</tr>
			</table>
</div>
			<br>
</div>
<input class="td1" name="Reset1" type="reset" value="איפוס">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
<input class="td1" name="Submit1" type="submit" value="אישור" />


</form>

</div>
</body>

</html>
