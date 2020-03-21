<?php

	include("connect_db.php");
		
		
		//Insert players by position.
		function insert_by_pos($pos, $num, $game_id, $hour, $level, $conn, $rep){
				//echo 'pos:'.$pos.' num:'.$num.' gid:'.$game_id.' hr:'.$hour.' lvl:'.$level;
				if ($rep==1){
				$query_by_lvl = "select users.user_id player_id, users.last_used, users.Level Lvl, users.Position, availability.datetime from users JOIN availability ON availability.player_id = users.user_id WHERE HOUR(availability.datetime) = \"".$hour."\" and users.Level = \"".$level."\" and users.Position=\"".$pos."\" order by last_used";
				}
				else
				{
				$query_by_lvl = "select users.user_id player_id, users.last_used, users.Level Lvl, users.Position, availability.datetime from users JOIN availability ON availability.player_id = users.user_id WHERE (HOUR(availability.datetime) = \"".$hour."\" or HOUR(availability.datetime) = \"".(string)($hour+2)."\" or HOUR(availability.datetime) = \"".(string)($hour-2)."\") and users.Level = \"".$level."\" and users.Position=\"".$pos."\" order by last_used";
				}
				$result_by_lvl = $conn->query($query_by_lvl);
				if ($result_by_lvl->num_rows<$num)
				{
				//echo $result_by_lvl->num_rows;
					$num = $result_by_lvl->num_rows;
				}
				$row_by_lvl = $result_by_lvl->fetch_assoc();
				
				for ($i=1; $i<=$num; $i++){
				
					$query_insert_player = "INSERT INTO `players_games`(`game_id`, `player_id`) VALUES (\"".$game_id."\",\"".$row_by_lvl["player_id"]."\")";
					$conn->query($query_insert_player);				
					$row_by_lvl = $result_by_lvl->fetch_assoc();
			}
		}

	$counter=1;
	$query = "SELECT distinct HOUR(allocation_datetime) as hours, allocation_datetime as date FROM allocations Where DATE(allocation_datetime) = DATE_ADD(DATE(NOW()), INTERVAL 1 DAY) order by allocation_datetime ASC";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
    // Getting all the hours for today +1
    while($row = $result->fetch_assoc()) {
        echo "hour_".$counter.": " . $row["hours"].$row["date"]. nl2br("\n");
        //checking how many players are for the same hour and getting their details
        $query_check_players = "select users.user_id player_id,users.Level, availability.datetime from users JOIN availability ON availability.player_id = users.user_id WHERE DATE(availability.datetime) = DATE_ADD(DATE(NOW()), INTERVAL 1 DAY) and HOUR(availability.datetime) = ".$row["hours"]." ";
        $result_check_players = $conn->query($query_check_players);
        echo $result_check_players->num_rows;
        $query_enter_game_players = "INSERT INTO `games` (`game_id`, `game_date`, `game_time`, `court_num`, `game_status`) VALUES (NULL, DATE(\"".$row['date']."\"), \"".$row["hours"].":00:00\", '1', '0')";
		$conn->query($query_enter_game_players);
		$query_check_game_num = "select game_id from games where game_date = DATE_ADD(DATE(NOW()), INTERVAL 1 DAY) and game_time = \"".$row["hours"].":00:00\"";
		$result_game_id=$conn->query($query_check_game_num);
		$row_game_id = $result_game_id->fetch_assoc();
		$game_id = $row_game_id["game_id"];
		$query_num_per_level="select a.Level Level, COUNT(a.player_id) num from (select users.user_id player_id,users.Level, availability.datetime from users JOIN availability ON availability.player_id = users.user_id WHERE DATE(availability.datetime) = DATE_ADD(DATE(NOW()), INTERVAL 1 DAY) and HOUR(availability.datetime) = \"".$row["hours"]."\" ) as a group by a.Level order by 2 DESC limit 1";
       	$row_num_per_level=$conn->query($query_num_per_level)->fetch_assoc();

        if ($result_check_players->num_rows < 9)
        { //if there are only 6 players or less with the same availability, devide them by levels and positions
        	//if there are 6 or more, but less than 9 players with the same availability and Level.	
        	insert_by_pos("Center", 2, $game_id, $row["hours"], $row_num_per_level["Level"], $conn, 1);
			insert_by_pos("Forward", 2, $game_id, $row["hours"], $row_num_per_level["Level"], $conn, 1);
			insert_by_pos("Guard", 2, $game_id, $row["hours"], $row_num_per_level["Level"], $conn, 1);
        }
        else if($result_check_players->num_rows == 0)
        {//if none of the players entered this time move on to the next hour in the allocations
        	continue;
		}
		else
        {	
        
        //if there are 9 or more players with the same availability, devide them by levels and positions
				insert_by_pos("Center", 3, $game_id, $row["hours"], $row_num_per_level["Level"], $conn, 1);
				insert_by_pos("Forward", 3, $game_id, $row["hours"], $row_num_per_level["Level"], $conn, 1);
				insert_by_pos("Guard", 3, $game_id, $row["hours"], $row_num_per_level["Level"], $conn, 1);
		}
        $counter+=1;
    }
} else {
    echo "0 results";
}
/*
// Getting all the hours for +12 hours from allocations

$query12 = "SELECT HOUR(allocation_datetime) as hours_remain, DATE(allocation_datetime) allocation_date FROM allocations Where allocation_datetime<= DATE_ADD((NOW()), INTERVAL 12 HOUR)";
$result12 = $conn->query($query12);


if ($result12->num_rows > 0) {
    // Getting all the games for today +12 hours
    //echo "X";
    while($row12 = $result12->fetch_assoc()) {
    	$query12_games = "select games.game_id as game_id, count(player_id) num from players_games right join games on games.game_id=players_games.game_id where DATE(games.game_date)=\"".$row12['allocation_date']."\" and HOUR(games.game_time) = \"".$row12['hours_remain']."\" ";
    	//echo "select games.game_id as game_id, count(player_id) num from players_games right join games on games.game_id=players_games.game_id where DATE(games.game_date)=\"".$row12['allocation_date']."\" and HOUR(games.game_time) = \"".$row12['hours_remain']."\" ";
		$result12_games = $conn->query($query12_games);
		$row12_games = $result12_games->fetch_assoc();
			 $game_id = $row12_games["game_id"];
			 echo $row12_games["game_id"];
			 //checking if there are games that can be closed
			 	if (($row12_games["num"]==6) || ($row12_games["num"]==9)){
    				$query_close_game = "UPDATE games SET game_status=1 WHERE game_id=\"".$row12_games["game_id"]."\"";
					$result12_close_game = $conn->query($query_close_game);
					echo "N";
				
			 	}
			 	else
			 	{
			 	if ($row12_games["num"]==0){
			 		$arr_lvl = array("P","M","B");
			 		for ($i=0; $i<=2; $i++){
			 		insert_by_pos("Center", 2, $game_id, $row12['hours_remain'], $arr_lvl[$i], $conn, 2);
					insert_by_pos("Guard", 2, $game_id, $row12['hours_remain'], $arr_lvl[$i], $conn, 2);
					insert_by_pos("Forward", 2, $game_id, $row12['hours_remain'], $arr_lvl[$i], $conn, 2);
					}
			 	}
			 	else{
			 	echo "D";
			 		// checking what the positions of the players that are already in the game
			 		$query_check_game_pos= "select Level ,Position, count(Position) num_in_pos from players_games JOIN users on players_games.player_id=users.user_id where game_id =\"".$row12_games["game_id"]."\" group by Position";
			 		$result_check_game_pos= $conn->query($query_check_game_pos);
			 		echo "C";
			 		while($row_check_game_pos = $result_check_game_pos->fetch_assoc())
			 		{
		
			 			//if a game of 6 is not full
			 			if ($row12_games["num"] < 6){
			 				// if this position is full
			 				if ($row_check_game_pos["num_in_pos"]==2)
			 				{
			 				continue;
			 				}
			 				else
			 				{
			 				insert_by_pos($row_check_game_pos["Position"], 2, $game_id, $row12['hours_remain'], $row_check_game_pos["Level"], $conn, 2);
			 				}
			 			}
			 			else{
			 			echo "C";
			 				if ($row_check_game_pos["num_in_pos"]==3)
			 				{
			 				continue;
			 				}
			 				else
			 				{
			 				insert_by_pos($row_check_game_pos["Position"], 3, $game_id, $row12['hours_remain'], $row_check_game_pos["Level"], $conn, 2);
			 				}
			 		}
			 			}
			 		}
			 	}
			 }
		}
else {
    echo "no results";
}
	


/*
			 		

			 	//if the game didn't close, find players with with the same availability or player with availability of +/-2 from the game_time.
			 	$query_check_players_12 = "select users.user_id player_id,users.Level, availability.datetime from users JOIN availability ON availability.player_id = users.user_id WHERE DATE(availability.datetime) = ".$row12['allocation_date']." and (HOUR(availability.datetime) = ".$row12['hours_remain']." or HOUR(availability.datetime) = ".(string)$row12['hours_remain']+2." or HOUR(availability.datetime) = ".(string)$row12['hours_remain']-2.") ";
			 	$result_check_players_12 = $conn->query($query_check_game_pos);
        		echo $result_check_players_12->num_rows;
				}
		
		
		if ($result12->num_rows == 0) {

    
        echo "hour_".$counter.": " . $row["hours"].$row["date"]. nl2br("\n");
        //checking how many players are for the same hour and getting their details
        $query_check_players = "select users.user_id player_id,users.Level, availability.datetime from users JOIN availability ON availability.player_id = users.user_id WHERE DATE(availability.datetime) = DATE_ADD(DATE(NOW()), INTERVAL 12 HOUR) and HOUR(availability.datetime) = ".$row["hours_remain"]." ";
        $result_check_players = $conn->query($query_check_players);
        echo $result_check_players->num_rows;
        if (($result_check_players->num_rows == 6) || ($result_check_players->num_rows == 9))
        { //if there are only 6 players with the same availability put them together in a team and close the game
			$query_enter_game_players = "INSERT INTO `games` (`game_id`, `game_date`, `game_time`, `court_num`, `game_status`) VALUES (NULL, DATE(\"".$row['allocation_date']."\"), \"".$row["hours_remain"].":00:00\", '1', '1')";
			$conn->query($query_enter_game_players);
			$query_check_game_num = "select game_id from games where game_date = DATE_ADD(DATE(NOW()), INTERVAL 12 HOUR) and game_time = \"".$row["hours_remain"].":00:00\"";
				$result_game_id=$conn->query($query_check_game_num);
				$row_game_id = $result_game_id->fetch_assoc();
				$game_id = $row_game_id["game_id"];
			while ($row_check_players = $result_check_players->fetch_assoc()) {
				$query_insert_player = "INSERT INTO `players_games`(`game_id`, `player_id`) VALUES (\"".$game_id."\",\"".$row_check_players["player_id"]."\")";

				$conn->query($query_insert_player);
        	}


// Getting all the hours for +12 hours where no game for one or more hours from allocations

$query11 = "SELECT HOUR(allocation_datetime) as hours_remain, allocation_datetime allocation_date FROM allocations Where allocation_datetime<= DATE_ADD((NOW()), INTERVAL 12 HOUR)";
$result11 = $conn->query($query11);


if ($result11->num_rows > 0) {
    // Getting all the hours for today +1
    while($row11 = $result11->fetch_assoc()) {
    	$query12 = "SELECT HOUR(game_time) as hours_remain, game_date FROM games Where DATE(game_date) = ".$row11['allocation_date']." and HOUR(game_time) = ".$row11['hours_remain']." ";
		$result12 = $conn->query($query12);
		
		if ($result12->num_rows == 0) {

    
        echo "hour_".$counter.": " . $row["hours"].$row["date"]. nl2br("\n");
        //checking how many players are for the same hour and getting their details
        $query_check_players = "select users.user_id player_id,users.Level, availability.datetime from users JOIN availability ON availability.player_id = users.user_id WHERE DATE(availability.datetime) = DATE_ADD(DATE(NOW()), INTERVAL 12 HOUR) and HOUR(availability.datetime) = ".$row["hours_remain"]." ";
        $result_check_players = $conn->query($query_check_players);
        echo $result_check_players->num_rows;
        if (($result_check_players->num_rows == 6) || ($result_check_players->num_rows == 9))
        { //if there are only 6 players with the same availability put them together in a team and close the game
			$query_enter_game_players = "INSERT INTO `games` (`game_id`, `game_date`, `game_time`, `court_num`, `game_status`) VALUES (NULL, DATE(\"".$row['allocation_date']."\"), \"".$row["hours_remain"].":00:00\", '1', '1')";
			$conn->query($query_enter_game_players);
			$query_check_game_num = "select game_id from games where game_date = DATE_ADD(DATE(NOW()), INTERVAL 12 HOUR) and game_time = \"".$row["hours_remain"].":00:00\"";
				$result_game_id=$conn->query($query_check_game_num);
				$row_game_id = $result_game_id->fetch_assoc();
				$game_id = $row_game_id["game_id"];
			while ($row_check_players = $result_check_players->fetch_assoc()) {
				$query_insert_player = "INSERT INTO `players_games`(`game_id`, `player_id`) VALUES (\"".$game_id."\",\"".$row_check_players["player_id"]."\")";

				$conn->query($query_insert_player);
        	}
        }
        else if($result_check_players->num_rows == 0)
        {//if none of the players entered this time move on to the next hour in the allocations
        	break;
		}

        else if($result_check_players->num_rows < 6)
        { //if there are less than 6 players with the same availability put them together in a team and remain the game open to join
			while ($row_check_players = $result_check_players->fetch_assoc()) {
				$query_insert_player = "INSERT INTO `players_games`(`game_id`, `player_id`) VALUES (\"".$game_id."\",\"".$row_check_players["player_id"]."\")";

				$conn->query($query_insert_player);
        	}
		}
		else
        {	//if there are more than 6 players with the same availability devide them by Levels.

        	$query_num_per_level="select a.Level, COUNT(a.player_id) num from (select users.user_id player_id,users.Level, availability.datetime from users JOIN availability ON availability.player_id = users.user_id WHERE DATE(availability.datetime) = DATE_ADD(DATE(NOW()), INTERVAL 1 DAY) and HOUR(availability.datetime) = \"".$row["hours_remain"]."\" ) as a group by a.Level order by 2 DESC limit 1";
        	$row_num_per_level=$conn->query($query_num_per_level)->fetch_assoc();
        	if ($row_num_per_level['num']>=6){
        	$query_insert_game = "INSERT INTO `games` (`game_id`, `game_date`, `game_time`, `court_num`, `game_status`) VALUES (NULL, DATE(\"".$row['allocation_date']."\"), \"".$row["hours_remain"].":00:00\", '1', '1')";
        	}
        	else
        	{
        	$query_insert_game = "INSERT INTO `games` (`game_id`, `game_date`, `game_time`, `court_num`, `game_status`) VALUES (NULL, DATE(\"".$row['allocation_date']."\"), \"".$row["hours_remain"].":00:00\", '1', '0')";
        	}
        	$conn->query($query_insert_game);
			$query_check_game_num = "select game_id from games where game_date = DATE_ADD(DATE(NOW()), INTERVAL 12 HOUR) and game_time = \"".$row["hours_remain"].":00:00\"";
			$result_game_id=$conn->query($query_check_game_num);
			$row_game_id = $result_game_id->fetch_assoc();
			$game_id = $row_game_id["game_id"];
			echo $game_id."xxx";

			$query_by_lvl = "select users.user_id player_id, users.last_used, users.Level Lvl, users.Position, availability.datetime from users JOIN availability ON availability.player_id = users.user_id WHERE HOUR(availability.datetime) = ".$row["hours_remain"]." and users.Level = \"".$row_num_per_level["Level"]."\" order by last_used";
			$result_by_lvl = $conn->query($query_by_lvl);
				for ($i=1; $i<=$row_num_per_level['num']; $i++){
					$row_by_lvl = $result_by_lvl->fetch_assoc();
					$query_insert_player = "INSERT INTO `players_games`(`game_id`, `player_id`) VALUES (\"".$game_id."\",\"".$row_by_lvl["player_id"]."\")";
					$conn->query($query_insert_player);

					}				
		}

        $counter+=1;
    }
} else {
    echo "0 results";
}

// Getting all the hours for +12 hours where no game for one or more hours from allocations

$query11 = "SELECT HOUR(allocation_datetime) as hours_remain, allocation_datetime allocation_date FROM allocations Where allocation_datetime<= DATE_ADD((NOW()), INTERVAL 12 HOUR)";
$result11 = $conn->query($query11);

$conn->close();

*/
