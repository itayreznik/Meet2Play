<?php
	session_start();
	
	$_SESSION['game_id']=$_SESSION['game_id'];
	$game_id=$_SESSION['game_id'];
	$id=$_SESSION['id'];
	
	include("connect_db.php");

	$query = "SELECT player_id,game_id FROM players_games WHERE player_id=\"$id\" AND game_id=\"$game_id\" ";
		$result = $conn->query($query);
	
		if ($result->num_rows > 0) {
			$_SESSION['error1'] = "הינך משתתף במשחק זה";
			header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day'].'&error1='.$error1);
			die();	}
		else {
		$query1 = "INSERT into players_games (player_id,game_id) VALUES (\"$id\",\"$game_id\")";
		$result1 = $conn->query($query1);
		$_SESSION['error1'] = "בוצעה כניסה למשחק בהצלחה";
		header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day'].'&error1='.$error1); }
		
	?>
	
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

