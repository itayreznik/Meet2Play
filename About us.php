
<?php
session_start();
if(isset($_SESSION['id'])) {
include("gk_inc_title_connected.php"); }
else {
include("gk_inc_title.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../../../Users/Itay/AppData/Local/Temp/Rar$DIa6448.45270/gk_inc.css">

<title>אודות</title>


<script src="../../../Users/Itay/AppData/Local/Temp/Rar$DIa6448.45270/gk_inc.js"></script>
<style>
.bg {
    /* The image used */
    background-image: url("AboutUs.jpg");
    

    /* Full height */
	height:auto;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
     p {
        color: black;
        font-family: "Adobe Caslon Pro", "Hoefler Text", Georgia, Garamond, Times, serif;
 letter-spacing:0.1em;
 text-align:center;
 text-transform: lowercase;
 font-size: 2vw;
 font-variant: small-caps;
 font-weight:bold;

        }
    
.gershon{
 opacity: 0.8;

	 background-color:#edebe6;
	 color: black;
 font-family: "Adobe Caslon Pro", "Hoefler Text", Georgia, Garamond, Times, serif;
 letter-spacing:0.1em;
 text-align:center;
 margin: 2vw auto;
 text-transform: lowercase;
 line-height: 145%;
 font-size: 2vw;
 font-variant: small-caps;
 padding: 2vw 2vw 2vw 2vw;
 font-weight:bold;
 background-color:#edebe6;
 width:50%;
 length:30%:
}
@media only screen and (max-width : 950px) {
  .gershon {
  width:100px;
  length:100px;
   opacity: 0.8;

	 background-color:#edebe6;
	 color: black;
 font-family: "Adobe Caslon Pro", "Hoefler Text", Georgia, Garamond, Times, serif;
 letter-spacing:0.1vm;
 text-align:center;

 text-transform: lowercase;
 line-height: 145%;
 font-size: 5vw;
 font-variant: small-caps;
 padding: 2vw 2vw 2vw 2vw;
 font-weight:bold;
 margin: 5vm 5vm;

     }
 }

table {
	font-family:Arial;
	font-size:x-large;

}

    
    
</style>
</head>

<body class="bg">

		<div align="center">
		<h1 style="font-size:5vw;">
               עלינו&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h1>

	
			
					<p><div class="gershon">מצא לי קבוצה הינה מערכת למציאת קבוצות כדורסל באזור שלך לפי אילוצי זמן, העדפות אישיות ורמת המשחק בעזרת אלגוריתם מתקדם שנבנה במיוחד עבור המערכת. המערכת נבנתה על מנת לאפשר לשחקנים מתחילים ומקצועיים למצוא קבוצה איכותית בקלות ובמהירות תוך חווית משתמש טובה וממשק קל לשימוש.</div></p>


</div>
</body>

</html>
