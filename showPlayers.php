	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<?php
	session_start();
	
	
	
	$_SESSION['game_id']=$_GET['game_id'];
	$game_id=$_SESSION['game_id'];
	$id=$_SESSION['id'];
	

	include("connect_db.php");

	
	$query="SELECT user_id,year(birth_date) as birthYear,height,weight,exp_years,exp_type,users.name as name,users.Level as level FROM players_games JOIN users ON players_games.player_id=users.user_id WHERE players_games.game_id=\"$game_id\" ";
	$result = $conn->query($query);
	
	$str = "משתתפים במשחק:<table id=\"table1\" border=\"1\">";
	$str.= "<tr><th>שחקן</th><th>רמה</th></tr>";
	
	while ($row = $result->fetch_array(MYSQLI_ASSOC))   {
	    //$id = $row["user_id"];
	  	$name = $row["name"];	
	  	$level = $row["level"];
	  	if ($level=="P"){
	  	$level="מקצוען";}
	  	else if ($level=="M"){
	  	$level="בינוני";}
	  	else {
	  	$level="מתחיל";}
	  	$height = $row["height"];
	  	$weight = $row["weight"];
	  	$age = date("Y")-$row["birthYear"];
	  	$exp_years = $row["exp_years"];
	  	$exp_type = $row["exp_type"];
	  	
	  	// $str10 = "<table id=\"table1\" border=\"1\">";
	  	// $str10.= "<tr><th>גיל</th><th>גובה</th><th>משקל</th></tr>";
	  	// $str10.= "<tr><td>$age</td><td>$height</td><td>$weight</td></tr>";
	  	// $str10.= "</table>";
	  	 
	  	 $str.= "<tr id='id1'><td><div class='tooltip'>$name<span class='tooltiptext'>גיל: $age<br>גובה: $height<br>משקל: $weight<br>שנות נסיון: $exp_years<br>סוג נסיון: $exp_type</span></div></td><td>$level</td></tr>";
	  	//$str.= "<tr id='id1'><td onmouseover='showDetails($age,$height,$weight)' onmouseout='dontShowDetails()'>$name</td></div><td>$level</td></tr>";
	  	}
	 $str.= "</table>";
	 $query111 = "SELECT player_id from players_games WHERE game_id = \"$game_id\" AND player_id= \"$id\"";
	 $result111 = $conn->query($query111);
	 if ($result111->num_rows > 0) {
	 	$str4= "<input type='button' value='צא מהמשחק' onclick=\"location.href='leave_game.php'\" style='width:80%'/>";}
	 else {
	 	//$str.= "<input class='td1' name='Button' type='button' value='Join game' onclick='location.href='join_game.php'' style='width:20%'/>";
	 	$str4= "<input type='button' value='הצטרף למשחק' onclick=\"location.href='join_game.php'\" style='width:80%'/>"; }
	 						
						//<input class="td1" name="Button2" type="button" value="נקה אילוצים" onclick="location.href='delete_all_availability.php'" style="width: 20%" />
	 
	 header('location: Filters Page.php?year='.$_SESSION['year'].'&month='.$_SESSION['month'].'&day='.$_SESSION['day'].'&playersTable='.$str.'&JoinGameButton='.$str4);	
	?>
	


