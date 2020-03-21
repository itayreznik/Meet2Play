<?php
$id=$_SESSION['id'];
include("connect_db.php");
$query1 = "SELECT name FROM users WHERE user_id=\"$id\"";
$result1 = $conn->query($query1);
$row = $result1->fetch_array(MYSQLI_ASSOC);
$name = $row["name"];
?>

<html dir="rtl">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

	<table style="margin-bottom:0;width: 100%; border-width: 0; background-color:#F0F0F0; direction: rtl; height: 10px;opacity:0.85">
		<tr>
			<td style="font-size:x-large;font-family:Arial; width: 10%; border-width: 0;text-shadow: 5px 5px 10px grey; height: 29px; text-align: center;" align="right">
			
  
			<div class="dropdown">
			<div class="container" onclick="barFunction(this), dropDownFunction()">
  <div class="bar1"></div>		
  <div class="bar2"></div>
  <div class="bar3"></div>
  <div id="myDropdown" class="dropdown-content">
    <a href="Filters Page.php">דף ראשי</a>
    <a href="About us.php">אודות</a>
    <a href="writetous.php">כתבו לנו</a>
  </div>  </div>
</div></td>

			<td style ="font-family:Arial;font-size:x-large;width: 158px" align="right"><?php echo "שלום, ".$name;?>
</td>

<td class ="button" style ="border: medium solid #000000; width:10%; font-family:Arial; font-size:x-large; text-align: center;">
			<a href="Update_Details.php" style="text-decoration: none">
			<span style="color: #000000">ערוך פרטים</span></a>
</td>

			<td style="text-align: left; font-size: x-large; border-width: 0; height: 30px; font-family: Arial;">
			<a href="HomePage.php" style="color:blue; text-decoration: none;" >התנתק</a></td>
		</tr>
	</table>
	
	<style>
	
	.button:hover{
text-shadow: 0 0 2em rgba(255,255,255,1);
color:black;
border-color:gray;
background-color:#0099FF


}
	.chip {
    display: inline-block;
    padding: 0 25px;
    height: 50px;
    font-family:Arial;
	font-size:large;
	text-align:center;
    line-height: 50px;
    border-radius: 25px;
    background-color: #f1f1f1;
}

.chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 50px;
    width: 50px;
    border-radius: 50%;
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
      z-index: -1;
 }

.dropdown-content {

    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: -1;
    font-family:Arial;
	font-size:x-large;
	text-align:center;

}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}
.show {display: block;}

</style>
<script>
function barFunction(x) {
    x.classList.toggle("change");
}
function dropDownFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
function dropDownFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
}


</script>
