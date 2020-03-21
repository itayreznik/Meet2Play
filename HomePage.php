<?php 
session_start();
 unset($_SESSION['id']);
?>

<!DOCTYPE html>
<html dir="rtl">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width">
<title>דף הבית</title>
<style>
.bt0 {
	vertical-align:top;
	margin: 0 auto;
	border-width:0;
	width:350px;
	 height: 250px;
	 background-color:#F0F0F0;
    opacity:0.7;
    border-radius:30%;
    
}

@media only screen and (max-width : 950px) {
.bt0 {
	vertical-align:top;
	align:center;
	border-width:0;
	width:350px;
	 height: 250px;
	 background-color:#F0F0F0;
    opacity:0.7;
    border-radius:30%;
    margin-right:10px;
}

.bt1 {
    display: block; /* copy for bt2 (the buttons with inline; */
    align:center;
    width:100%;
    margin:5px;
    padding:5px;
    background-color:#F0F0F0;
    opacity:0.7;
    border-radius:20%;
    background-position: center;

}
}

.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #dcecfb;
	-webkit-box-shadow:inset 0px 1px 0px 0px #dcecfb;
	box-shadow:inset 0px 1px 0px 0px #dcecfb;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bddbfa), color-stop(1, #80b5ea));
	background:-moz-linear-gradient(top, #000000 5%, #c0c0c0 100%);
	background:-webkit-linear-gradient(top, #000000 5%, #c0c0c0 100%);
	background:-o-linear-gradient(top, #000000 5%, #c0c0c0 100%);
	background:-ms-linear-gradient(top, #000000 5%, #c0c0c0 100%);
	background:linear-gradient(to bottom, #000000 5%, #c0c0c0 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bddbfa', endColorstr='#80b5ea',GradientType=0);
	background-color:#bddbfa;
	-moz-border-radius:100px;
	-webkit-border-radius:100px;
	border-radius:100px;
	border:1px solid #84bbf3;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:50px;
	font-weight:bold;
	padding:6px 16px;
	text-decoration:none;
	text-shadow:0px 1px 0px #528ecc;
}

.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #80b5ea), color-stop(1, #bddbfa));
	background:-moz-linear-gradient(top, #808080 5%, #bddbfa 100%);
	background:-webkit-linear-gradient(top, #808080 5%, #bddbfa 100%);
	background:-o-linear-gradient(top, #808080 5%, #bddbfa 100%);
	background:-ms-linear-gradient(top, #808080 5%, #bddbfa 100%);
	background:linear-gradient(to bottom, #808080 5%, #bddbfa 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#808080', endColorstr='#bddbfa',GradientType=0);
	background-color:#80b5ea;
}
.myButton:active {
	position:relative;
	top:1px;
}
.myButton1 {
	-moz-box-shadow:inset 0px 1px 0px 0px #dcecfb;
	-webkit-box-shadow:inset 0px 1px 0px 0px #dcecfb;
	box-shadow:inset 0px 1px 0px 0px #dcecfb;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dcecfb), color-stop(1, #80b5ea));
	background:-moz-linear-gradient(top, #ed9c2a 5%, #ed9c2a 100%);
	background:-webkit-linear-gradient(top, #ed9c2a 5%, #ed9c2a 100%);
	background:-o-linear-gradient(top, #dcecfb 5%, #ed9c2a 100%);
	background:-ms-linear-gradient(top, #ed9c2a 5%, #80b5ea 100%);
	background:linear-gradient(to bottom, #dcecfb 5%, #ed9c2a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bddbfa', endColorstr='#80b5ea',GradientType=0);
	background-color:#ed9c2a;
	-moz-border-radius:100px;
	-webkit-border-radius:100px;
	border-radius:100px;
	border:1px solid #84bbf3;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;;
	font-family:Arial;
	font-size:28px;
	font-weight:bold;
	padding:6px 16px;
	text-decoration:none;
	text-shadow:0px 1px 0px #528ecc;
}
.myButton1:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #80b5ea), color-stop(1, #bddbfa));
	background:-moz-linear-gradient(top, #80b5ea 5%, #ed9c2a 100%);
	background:-webkit-linear-gradient(top, #80b5ea 5%, #ed9c2a 100%);
	background:-o-linear-gradient(top, #ed9c2a 5%, #ed9c2a 100%);
	background:-ms-linear-gradient(top, #80b5ea 5%, #bddbfa 100%);
	background:linear-gradient(to bottom, #ed9c2a 5%,#ed9c2a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#80b5ea', endColorstr='#bddbfa',GradientType=0);
	background-color:#80b5ea;
}
.myButton1:active {
	position:relative;
	top:1px;
}


 p.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:8.0pt;
	margin-left:0cm;
	text-align:right;
	line-height:107%;
	direction:rtl;
	unicode-bidi:embed;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	}

table,td {
	font-family:Arial;
	font-size:x-large;
	text-align:center;
	border-collapse:collapse;
}
#td1:hover{background-color:#ebf4f4; height:10%}

.table10{
    opacity:0.7;
    }

.bg {
    /* The image used */
    background-image: url("HomePage.jpg");
    

    /* Full height */
    /*max-width: 100%;*/
   height: 100%;
   margin:0;
    /* Center and scale the image nicely */
    /* background-position: center top;*/
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment:fixed;
    }
    .container {
    display: inline-block;
    cursor: pointer;
}

.bar1, .bar2, .bar3 {
    width: 35px;
    height: 5px;
    background-color: #333;
    margin: 6px 0;
    transition: 0.4s;
}

/* Rotate first bar */
.change .bar1 {
    -webkit-transform: rotate(-45deg) translate(-9px, 6px) ;
    transform: rotate(-45deg) translate(-9px, 6px) ;
}

/* Fade out the second bar */
.change .bar2 {
    opacity: 0;
}

/* Rotate last bar */
.change .bar3 {
    -webkit-transform: rotate(45deg) translate(-8px, -8px) ;
    transform: rotate(45deg) translate(-8px, -8px) ;
}
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}
.show {display: block;}
@media (max-width: 700px) {
    .bg {   
        flex-direction: column;
</style>
<script>
function barFunction(x) {
    x.classList.toggle("change");
}
function dropDownFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

app.listen(5000); 

</script>
</head>


<body class="bg">
<div>
<table  id="table10" style="width:100%; height:100%">
<tr>
<td style="text-align: left">
<div>
	<table style="margin-bottom:0; ">
		<tr>
			<td style="width:25%; border-width: 0; height: 36px;" >
			<img alt="" src="meet2play_logo.png" height="70" width="250" style="float: right"></td>
			<td  style="text-align: left; font-size: large; border-width: 0;color:black; padding-left: 10px; width: 75%; height: 36px;" valign="top">
			<br>שלום,אורח<br><br></td>
		</tr>
		<tr>
			<td style="width:25%; border-width: 0;" >
			<div class="dropdown" style="left: 118px">
			<div class="container" onclick="barFunction(this), dropDownFunction()" style="text-align: right">
			
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  <div id="myDropdown" class="dropdown-content">
    <a href="HomePage.php">בית</a>
    <a href="About us.php">אודות</a>
    <a href="writetous.php">כתבו לנו</a>
  </div>  </div>
</div></td>
			<td  style="width:43%; border-width: 0;  font-size: xx-large; padding-top:15px;  " valign="top">
			&nbsp;</td>
			<td  style="width:33%; border-width: 0;  font-size: xx-large; padding-top:15px;" valign="top">
			&nbsp;</td>
			<td  style="text-align: left; font-size: large; border-width: 0;color:black; padding-left: 10px; width: 20%;" valign="top">
			&nbsp;</td>
		</tr>
	</table>
</div>

<table style="margin-bottom:0;border-width: 0;width: 100%; height: 100px; margin-top: 0px;" cellpadding="0" cellspacing="0">
	<tr id="space">
	
	<script> 
	if(window.innerWidth>"950"){
	console.log("Gershonnnnn");
	var buttons="<td  style='border-color: #FFFFFF; border-width: 0; width: 100%;height:150px'>";
	buttons+="<a class='myButton' href='login_page.php'>התחברות</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;";
buttons+="<a href='register_new.php' class='myButton'>הרשמה</a><br>	</td>";
	document.getElementById("space").innerHTML=buttons;
			}
			else{
			var buttons1="<td  style='border-color: #FFFFFF; border-width: 0; width: 100%;height:150px'>";
	buttons1+="<a class='myButton' href='login_page.php'>התחברות</a>";
buttons1+="<a href='register_new.php' class='myButton'>הרשמה</a><br>	</td>";

document.getElementById("space").innerHTML=buttons1;
			
			}
			</script></tr>
</table>

<table style="border-width: 0; width: 100%;" >
			<tr>
				<td class="bt1"><div class="bt0"><br><img src="connection.png" height="150px" width="150px" style="margin-top: 0px; margin-right: 0px;"  /><br>
				<span style="font-size: large"><strong>תנו לנו למצוא לכם את השותפים <br>
				המתאימים ביותר למשחק עבורכם</strong></span></div></td>
				<td class="bt1"><div class="bt0"><br><img src="calendar.png" height="160px" width="160px" style="margin-top: 0px; margin-right: 0px;"  /><br>
				<span style="font-size: large"><strong>שחקו בזמן שמתאים לכם</strong></span></div></td>
			</tr>
		</table>
		</td>
</tr>
</table>
</div>

</body>

</html>
