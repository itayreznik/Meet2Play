<html dir="rtl">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<?php
	session_start();
			
	include("connect_db.php");
           
	 
	$id=$_SESSION['id'];  
		$SelectTime ="";
	if(isset($_REQUEST['SelectTime'])) {
		$SelectTime =$_REQUEST['SelectTime'];
 		$_SESSION['SelectTime']=$SelectTime; 
	}
	echo "gggg".$SelectTime;
           
	//$_SESSION['y']	= $_SESSION['y'] ; 
	//$_SESSION['m'] =  $_SESSION['m'] ;
	//$_SESSION['d']	=  $_SESSION['d'] ;
	$_SESSION['year'] = $_SESSION['year'];
	$_SESSION['month'] = $_SESSION['month'];
	$_SESSION['day'] = $_SESSION['day'];
	$day_selected = $_SESSION['year']."/".$_SESSION['month']."/".$_SESSION['day'];
	//echo "what ".$SelectTime;
		
date_default_timezone_set('Asia/Jerusalem');

	


	
	$query2 = "SELECT * FROM availability WHERE player_id=\"$id\" ";
	$result2 = $conn->query($query2);
	
	if (!isset($_REQUEST['SelectTime'])){
	$_SESSION['error'] = "ביום זה אין שעות בהן המגרש פעיל";
	
	//header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day']); 
	}
	else if ($result2->num_rows > 100) {
	$_SESSION['error'] = "לא ניתן לבחור יותר מ 5 אילוצים";
	echo "hereeeeeee";
		//header('location: Filters Page.php?year='.date('Y').'&month='.date('m').'&day='.date('d'));
		//header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day']);
		die();	}
		
	else {

			
			$SelectTime= explode(',', $SelectTime);
for ($x = 0; $x <= sizeof($SelectTime)-1; $x++) {
$datetime=$day_selected." ".$SelectTime[$x].":00";
echo $datetime;
		$query1 = "SELECT player_id,datetime FROM availability WHERE player_id=\"$id\" AND datetime=\"$datetime\" ";
		$result1 = $conn->query($query1);
	
		if ($result1->num_rows > 0) {
			$_SESSION['error'] = "מועד זה כבר נבחר כאילוץ";
			header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day']);
			die();	}
		else {


		$query = "INSERT into availability (player_id,datetime,city) VALUES (\"$id\",\"$datetime\",'Herzliya')";
		$result = $conn->query($query);
		echo $datetime."raz ";
	
		}
		}
			//header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day']); 
			header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day']);	
	}
	
		
?>