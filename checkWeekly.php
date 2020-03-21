<?php
	include("connect_db.php");
	session_start();
	$greens="";
	if(isset($_REQUEST['greens'])) {
		$greens=$_REQUEST['greens'];
 		$_SESSION['greens']=$greens; 
	}
	$year="";
	if(isset($_REQUEST['year'])) {
		$year=$_REQUEST['year'];
 		$_SESSION['year']=$year; 
	}
	$firstMonth="";
	if(isset($_REQUEST['firstMonth'])) {
		$firstMonth=$_REQUEST['firstMonth'];
 		$_SESSION['firstMonth']=$firstMonth; 
	}echo $firstMonth;
	
		$lastMonth="";
	if(isset($_REQUEST['lastMonth'])) {
		$lastMonth=$_REQUEST['lastMonth'];
 		$_SESSION['lastMonth']=$lastMonth; 
	}echo $lastMonth;

$del="";
	if(isset($_REQUEST['del'])) {
		$del=$_REQUEST['del'];
 		$_SESSION['del']=$del; 
	}echo "mmmmmmm ".$del;
$court_num="";
	if(isset($_REQUEST['court_num'])) {
		$court_num=$_REQUEST['court_num'];
 		$_SESSION['court_num']=$court_num; 
	}echo "matannn".$court_num;
	$firstMonth="";
	if(isset($_REQUEST['firstMonth'])) {
		$firstMonth=$_REQUEST['firstMonth'];
 		$_SESSION['firstMonth']=$firstMonth; 
	}echo "matannn".$firstMonth;
	$lastMonth="";
	if(isset($_REQUEST['lastMonth'])) {
		$lastMonth=$_REQUEST['lastMonth'];
 		$_SESSION['lastMonth']=$lastMonth; 
	}echo "matannn".$lastMonth;
$first1="";
	if(isset($_REQUEST['first1'])) {
		$first1=$_REQUEST['first1'];
 		$_SESSION['first1']=$first1; 
	}
$last1="";
	if(isset($_REQUEST['last1'])) {
		$last1=$_REQUEST['last1'];
 		$_SESSION['last1']=$last1; 
	}


$del = explode(',', $del);
for ($x = 0; $x <= sizeof($del); $x++) {
$first=$del[0];
$last=$del[1];
}

echo "xxx ".$first." ".$last;

	$query1 ="DELETE FROM allocations WHERE year(allocation_datetime)=\"$year\" and allocation_datetime between  \"$first\" and DATE_ADD(\"$last\",INTERVAL 1 DAY) and court_num=\"$court_num\"";    
	$result = $conn->query($query1);
	if($query1){
	}



	$stringi="";
	$greens = explode(',', $greens);
	echo "greens ".$greens;
	for ($x = 0; $x <= sizeof($greens); $x++) {
		$query = "INSERT INTO allocations (allocation_datetime,court_num) VALUES (\"$greens[$x]\",\"$court_num\")";
		$result = $conn->query($query);			
		if($result){
		echo "suc";
		}else{
		echo "fail";
		};				
	
	$stringi.= $greens[$x]."\r\n<br>";
	};
	
	


	$conn->close();
header('location:weekly_calendar.php?court_num='.$court_num.'&firstMonth='.$firstMonth.'&lastMonth='.$lastMonth.'&first='.$first.'&last='.$last1.'&first='.$first1);
?>