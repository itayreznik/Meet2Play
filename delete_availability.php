<?php
	session_start();
		           
	$_SESSION['year'] = $_SESSION['year'];
	$_SESSION['month'] = $_SESSION['month'];
	$_SESSION['day'] = $_SESSION['day'];

	$id=$_SESSION['id'];             
	$_SESSION['datetodelete']=$_GET['datetodelete'];
	$datetodelete=$_SESSION['datetodelete'];

	include("connect_db.php");
		
	$query = "DELETE FROM availability WHERE player_id=\"$id\" AND datetime=\"$datetodelete\"";
	$result = $conn->query($query);


//header('location: Filters Page.php?year='.date('Y').'&month='.date('m').'&day='.date('d'));
header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day']);		
?>