<?php
	session_start();
	
	$_SESSION['game_id']=$_SESSION['game_id'];
	$game_id=$_SESSION['game_id'];
	$id=$_SESSION['id'];
	
	include("connect_db.php");

	
		$query1 = "DELETE from players_games WHERE player_id=\"$id\" AND game_id=\"$game_id\" ";
		$result1 = $conn->query($query1);
		$_SESSION['error1'] = "אינך משתתף עוד במשחק זה";
		header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day'].'&error1='.$error1);
		
	?>
	
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
