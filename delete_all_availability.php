<?php
	session_start();
		   
   	$_SESSION['year'] = $_SESSION['year'];
	$_SESSION['month'] = $_SESSION['month'];
	$_SESSION['day'] = $_SESSION['day'];
     
	$dateToDelete = $_GET["dateToDelete"];

	$id=$_SESSION['id'];             

	include("connect_db.php");
		
	$query = "DELETE FROM availability WHERE player_id=\"$id\" AND DATE(datetime) = \"$dateToDelete\" ";
	$result = $conn->query($query);


//header('location: Filters Page.php?year='.date('Y').'&month='.date('m').'&day='.date('d'));
header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day']);		
?>