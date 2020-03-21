<?php
header('X-XSS-Protection:0');
session_start();
//if (isset($_SESSION['str'])) {
//$_SESSION['str']=NULL;
//$str=$_SESSION['str'];
//}
//else {
//$str11=$_SESSION['str11'];


if (isset($_GET['playersTable'])) {
$_SESSION['str']=$_GET['playersTable'];
$str=$_SESSION['str']; }
else {
$str=NULL;}

if (isset($_GET['JoinGameButton'])) {
$_SESSION['str4']=$_GET['JoinGameButton'];
$str4=$_SESSION['str4']; }
else {
$str4=NULL;}

//}
//else {
//$str="ok";}
if (isset($_GET['year'])) {
$_SESSION['year']=$_GET['year'];
$year1=$_SESSION['year']; }
else { 
$year1=$_SESSION['year'];}

if (isset($_GET['month'])) {
$_SESSION['month']=$_GET['month'];
$month1=$_SESSION['month']; }
else {
$month1=$_SESSION['month']; }

if (isset($_GET['day'])) {
$_SESSION['day']=$_GET['day'];
$day1=$_SESSION['day']; }
else {
$day1=$_SESSION['day']; }
 
$error = "";
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	
$error1 = "";
	if (isset($_SESSION['error1'])) {
		$error1 = $_SESSION['error1'];
		unset($_SESSION['error1']);
	}


if (isset($_SESSION['y'])) {
	$_SESSION['y']=$_SESSION['y'];
	$_SESSION['m']=$_SESSION['m'];
	$_SESSION['d']=$_SESSION['d'];
	}	
	
//include("connect_db.php");
$id=$_SESSION['id'];
$date=date("Y-m-d");
$date = explode('-', $date);
$year=$date[0];
$month=$date[1];
$day=$date[2];

$id=$_SESSION['id'];
if (isset($_REQUEST['y'])) {
	$_SESSION['y']=$_REQUEST['y'];
	$_SESSION['m']=$_REQUEST['m'];
	$_SESSION['d']=$_REQUEST['d'];
	}
else
{
	$_SESSION['y']=$year;
	$_SESSION['m']=$month;
	$_SESSION['d']=$day;
	}
	
?>
<?php include("filters page css.css") ?>

<!DOCTYPE html>
<html dir="rtl">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width">
<title>דף ראשי</title>

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
        t = setTimeout(yourFunction, 5000);  // time is in milliseconds
    }
}

/*call the function*/
    idleLogout();
</script>


<script>

function delete1(hour,year,month,day)
	{
	dateToDelete=year+"-"+month+"-"+day+" "+hour;
	var r=window.confirm("האם ברצונך למחוק את האפשרות?");
	if (r == true) {
        window.location.href = "delete_availability.php?datetodelete="+dateToDelete;
         }
	}
	
	function delete_all(year,month,day) {
	dateToDelete=year+"-"+month+"-"+day;
	
		var r=window.confirm("האם ברצונך למחוק את כל האפשרויות ביום זה?");
	if (r == true) {
       window.location.href = "delete_all_availability.php?dateToDelete="+dateToDelete;
         }
	}

	
function showPlayers(game_id) {
//var r=window.confirm(game_id); 
return window.location.href = "showPlayers.php?game_id="+game_id;
}

//function showDetails(age,height,weight) {
//var r=window.confirm(id); 
// var details = "גיל : "+age+"<br>"+"גובה : "+height+"cm"+"<br>"+"משקל : "+weight+"kg";
// document.getElementById('Details').innerHTML = details;}

//function dontShowDetails() {
//document.getElementById('Details').innerHTML = "";}



				
				
</script>


</head>

<body class="bg">
<div style="position:relative; z-index:999"><?php include("gk_inc_title_connected.php") ?>
</div>
<div style="position:relative; z-index:0">

<table style="width: 100%;height:50px; border-width: 0; " align="center">
	<tr>
		<td class="bt0" >
		
		<?php
include 'calendar.php';
 
/*$calendar = new Calendar();*/
 
/*echo $calendar->show();*/
?>

		</td>
		<td class="bt0">
			<form method="post" action="add_availability.php">
			<div id="data">
			<table align="right" >
<tr><td style="font-size:medium; height: 40px;" align="center">

	<?php
$query = "SELECT concat(hour(datetime),':00') as hour FROM availability WHERE player_id=\"$id\" AND year(datetime)=\"$year1\" AND month(datetime)=\"$month1\" AND day(datetime)=\"$day1\" ";	
	$result = $conn->query($query);
	
	
$counter=0;
if ($result->num_rows > 0) 
{
$str2 = "<table id=\"table1\" border=\"1\">";
$str2.= "<tr><th>אפשרות</th><th>שעה</th></tr>";
while ($row = $result->fetch_array(MYSQLI_ASSOC))   {
	  	$hour = $row["hour"];	
	  	$counter=$counter+1;
		
	if (isset($_SESSION['datetodelete'])) {
	$datetodelete=$_SESSION['datetodelete'];}
else $_SESSION['datetodelete']="";

		$str2.= "<div class='tooltip'><tr data-toggle='tooltip' title='לחץ למחיקת אפשרות' id='id1' onclick=\"delete1('$hour','$year1','$month1','$day1')\"><td>$counter</td><td>$hour</td></tr></div>";
		
}
$str2.= "</table>";
}

else {
$str2="אין אפשרויות"; }
?>


 <div align="center" style="background-color:#C0C0C0;">
 <?php
 echo $day1,"/",$month1,"/",$year1," :";
  echo $str2;
  echo  nl2br ("\n");
  echo $error;
 ?>
 </div>
</td><td style="height: 40px">
			<table align="right" >
<tr><td colspan="3" align="center" style="font-size:medium">

<?php
$query11 = "SELECT Level FROM users WHERE user_id=\"$id\"";
$result11 = $conn->query($query11);
$row = $result11->fetch_array(MYSQLI_ASSOC); 
$level= $row["Level"];

if ($level=='P') {
 
	$query1 = "SELECT games.game_id,game_time as time,court_num FROM (games JOIN players_games ON games.game_id=players_games.game_id) JOIN users ON users.user_id=players_games.player_id WHERE game_status=0 AND year(game_date)=\"$year1\" AND month(game_date)=\"$month1\" AND day(game_date)=\"$day1\" AND Level in ('P','M') GROUP BY games.game_id";	
	$result1 = $conn->query($query1);
	
$counter1=0;
if ($result1->num_rows > 0) 
{
$str3 = "<table id=\"table1\" border=\"1\">";
$str3.= "<tr><th>משחק</th><th>שעה</th><th>מספר מגרש</th><th>מספר שחקנים</th></tr>";
while ($row = $result1->fetch_array(MYSQLI_ASSOC))   {
	  	$hour1 = $row["time"];
	  	$courtnum = $row['court_num'];	
	  	$counter1=$counter1+1;
		$game_id=$row['game_id'];
		
		$query2 = "SELECT count(player_id) as Num FROM (games JOIN players_games ON games.game_id=players_games.game_id) WHERE games.game_id=\"$game_id\" ";
		$result2 = $conn->query($query2);
		$row1 = $result2->fetch_array(MYSQLI_ASSOC);
		$NumOfPlayers=$row1['Num'];
//	if (isset($_SESSION['datetodelete'])) {
//	$datetodelete=$_SESSION['datetodelete'];}
//else $_SESSION['datetodelete']="";

		$str3.= "<tr onclick=showPlayers($game_id) id='id1'><td>$counter1</td><td>$hour1</td><td>$courtnum</td><td>$NumOfPlayers</td></tr>";
		
}
$str3.= "</table>";
}


else {
$str3="אין משחקים ביום זה"; }

}

if ($level=='M') {
 
	$query1 = "SELECT games.game_id,game_time as time,court_num FROM (games JOIN players_games ON games.game_id=players_games.game_id) JOIN users ON users.user_id=players_games.player_id WHERE game_status=0 AND year(game_date)=\"$year1\" AND month(game_date)=\"$month1\" AND day(game_date)=\"$day1\" AND Level in ('B','M','P') GROUP BY games.game_id";	
	$result1 = $conn->query($query1);
	
$counter1=0;
if ($result1->num_rows > 0) 
{
$str3 = "<table id=\"table1\" border=\"1\">";
$str3.= "<tr><th>משחק</th><th>שעה</th><th>מספר מגרש</th><th>מספר שחקנים</th></tr>";
while ($row = $result1->fetch_array(MYSQLI_ASSOC))   {
	  	$hour1 = $row["time"];
	  	$courtnum = $row['court_num'];	
	  	$counter1=$counter1+1;
		$game_id=$row['game_id'];
		
		$query2 = "SELECT count(player_id) as Num FROM (games JOIN players_games ON games.game_id=players_games.game_id) WHERE games.game_id=\"$game_id\" ";
		$result2 = $conn->query($query2);
		$row1 = $result2->fetch_array(MYSQLI_ASSOC);
		$NumOfPlayers=$row1['Num'];

//	if (isset($_SESSION['datetodelete'])) {
//	$datetodelete=$_SESSION['datetodelete'];}
//else $_SESSION['datetodelete']="";

		$str3.= "<tr id='id1' onclick=showPlayers($game_id)><td>$counter1</td><td>$hour1</td><td>$courtnum</td><td>$NumOfPlayers</td></tr>";
		
}
$str3.= "</table>";
}


else {
$str3="אין משחקים ביום זה"; }

}

if ($level=='B') {
 
	$query1 = "SELECT games.game_id,game_time as time,court_num FROM (games JOIN players_games ON games.game_id=players_games.game_id) JOIN users ON users.user_id=players_games.player_id WHERE game_status=0 AND year(game_date)=\"$year1\" AND month(game_date)=\"$month1\" AND day(game_date)=\"$day1\" AND Level in ('B','M') GROUP BY games.game_id";	
	$result1 = $conn->query($query1);
	
$counter1=0;
if ($result1->num_rows > 0) 
{
$str3 = "<table id=\"table1\" border=\"1\">";
$str3.= "<tr><th>משחק</th><th>שעה</th><th>מספר מגרש</th><th>מספר שחקנים</th></tr>";
while ($row = $result1->fetch_array(MYSQLI_ASSOC))   {
	  	$hour1 = $row["time"];
	  	$courtnum = $row['court_num'];	
	  	$counter1=$counter1+1;
	  	$game_id=$row['game_id'];
	  	
	  	$query2 = "SELECT count(player_id) as Num FROM (games JOIN players_games ON games.game_id=players_games.game_id) WHERE games.game_id=\"$game_id\" ";
		$result2 = $conn->query($query2);
		$row1 = $result2->fetch_array(MYSQLI_ASSOC);
		$NumOfPlayers=$row1['Num'];

//	if (isset($_SESSION['datetodelete'])) {
//	$datetodelete=$_SESSION['datetodelete'];}
//else $_SESSION['datetodelete']="";

		$str3.= "<tr id='id1' onclick=showPlayers($game_id)><td>$counter1</td><td>$hour1</td><td>$courtnum</td><td>$NumOfPlayers</td></tr>";
		
}
$str3.= "</table>";
}


else {
$str3="אין משחקים ביום זה"; }

}
?>
<div align="center" style="background-color:#C0C0C0;">
<?php
 echo "משחקים המתאימים לרמה שלי:";
echo $str3;
?>
</div>
	</td>
	</tr>
					
					</table>
					</td><td style="font-size:medium; height: 40px;">
					<div align="center" style="background-color:#C0C0C0;">

<?php echo $str;
echo  nl2br ("\n");
echo $str4;
echo  nl2br ("\n");
echo $error1;?>
</div>
</td></tr>
<tr><br><br></tr>
	<tr><td colspan="3" style="height: 55px" align="left">
		<div id="Details" align="center" style="background-color:#C0C0C0;width:17%;font-size:medium"></div></td></tr>
	

					<tr>
					
																	<th style="height: 52px; font-size:x-large; width: 1670px;" colspan="3">
																	שעה:&nbsp; 						
				<?php
								$query1 = "select DISTINCT a.hour from (SELECT DISTINCT hour(allocation_datetime) AS hour from allocations WHERE year(allocation_datetime)=\"$year1\" and month(allocation_datetime)=\"$month1\" and day(allocation_datetime)=\"$day1\" order by hour asc) a where a.hour not in (select HOUR(availability.datetime) from availability where availability.player_id=\"$id\" AND year(availability.datetime)=\"$year1\" and month(availability.datetime)=\"$month1\" and day(availability.datetime)=\"$day1\" )  ";
								$result1 = $conn->query($query1);
								$hourarr="";
								$hour_array=array(); 
								$id=60;
								while ($row = $result1->fetch_array(MYSQLI_ASSOC))   {
								$hour=$row["hour"];
								$hourarr.=",".$row["hour"];
								array_push($hour_array,$hour);
								$len=sizeof($hour_array);						
 								}
 								
								foreach ($hour_array as $h){
										echo '&nbsp;<input type="button" id="'.$id.'" class="button4" onclick="clicked('.(int)$h.",".$id.')"  value="'.$h.':00'.'"/>';
																			$id=$id+1;
										}
									$result1->free();
									
			

	
			
						
							?>
							
						</th>
						

	</tr>
					<tr><td style="width: 1670px" colspan="3"></td>
					</tr>
					
					<tr>
						<td style="width: 1670px; text-align: center;" colspan="3">
						<input id="SelectTime" name="SelectTime" type="hidden" >
						<input class="button5"  name="button1" type="submit" value="הוסף אפשרות" style="width: 20%" />&nbsp;&nbsp;
						<?php $clearButton="<input class='button5' name='Button2' type='button' value='נקה אפשרויות' onclick=delete_all($year1,$month1,$day1) style='width: 20%' />";
						echo $clearButton;?>
						</td>
					
					</tr>
					
					</table>
					</div>
					</form>
					</td>
					<td></td>
					</tr>
					
					</table>
	</div>					
					
</body>
<script>
var flags3=[];
						var hours_clicked=[];
						for(var i=0; i<8;i++){
						flags3[i]=true;
						}
						function clicked(hour,id){
						if(flags3[id-60]==true){
						hours_clicked.push(hour);
						 document.getElementById(id).style.backgroundColor='orange';
						flags3[id-60]=false;
						}else{
						var index = hours_clicked.indexOf(hour);
  						console.log("index: "+index);
     				    hours_clicked.splice(index, 1);
     				     document.getElementById(id).style.backgroundColor='white';
						flags3[id-60]=true;
						
						}
						var SelectTime=hours_clicked.toString();
console.log("h"+ SelectTime);
						
						console.log("hours "+hours_clicked);
						
document.getElementById("SelectTime").value = SelectTime;

							console.log("h"+ hours_clicked);
							
						console.log(flags3);
						}
		
						

</script>
