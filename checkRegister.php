<?php
	session_start();
		if ( (isset($_REQUEST['name'])) and (isset($_REQUEST['fname'])) 	
		and (isset($_REQUEST['login'])) and (isset($_REQUEST['password'])) and (isset($_REQUEST['yearsExp']))
		and (isset($_REQUEST['SelectExp'])) and (isset($_REQUEST['fitLevel'])) and (isset($_REQUEST['height']))
		and (isset($_REQUEST['weight'])) and (isset($_POST['radioGender']))		// In case entered this url directly
		and ($_REQUEST['name'] != "") and ($_REQUEST['fname'] != "" )and ($_REQUEST['login'] != "" )
		and ($_REQUEST['day'] != "")and ($_REQUEST['month'] != "")and ($_REQUEST['year'] != "") and ($_REQUEST['login'] != "" )
		and ($_REQUEST['password'] != "") and ($_REQUEST['yearsExp'] != "" )
		and ($_REQUEST['SelectExp'] != "") and ($_REQUEST['fitLevel'] != "" )
		and ($_REQUEST['height'] != "") and ($_REQUEST['weight'] != "") 
		and ($_POST['radioGender'] != ""))	                                   // has some value (not empty from the form)
	{
		$_SESSION['login'] = $_REQUEST['login'];							
		$login = $_SESSION['login'];	
	}	else {
		$_SESSION['error'] = "Something is empty";		// set an error dtring to display in the first page
		header('Location: register_new.php');									// redirect to first page
		die();							
	}
		$encrypted_password = $_REQUEST['password'];
		$name = $_REQUEST['name'];
		$fname = $_REQUEST['fname'];
		
		$day = $_REQUEST['day'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];
		$birthdate_ts=strtotime("$year-$month-$day");
		$birth_date=date("Y-m-d",$birthdate_ts);
		$yearsExp = $_REQUEST['yearsExp'];
		$Exp_type = $_REQUEST['SelectExp'];
		$fitLevel = $_REQUEST['fitLevel'];
		$height = $_REQUEST['height'];
		$weight = $_REQUEST['weight'];
		$gender = $_POST['radioGender'];
		


	include("connect_db.php");
		(int)$age=date("Y")-$year;
		if (date("m")<$month){
			$age=$age-1;
		}
		
		
		//Building the age-score, Recieving age(int) returns float between 0-1.
		function age_score($age){
		switch($age){
		case (14<$age && $age<20):
		return 0.6;
		break;
		case (20<=$age && $age<25):
		return 0.8;
		break;
		case (25<=$age && $age<29):
		return 1;
		break;
		case (29<=$age && $age<36):
		return 0.8;
		break;
		case (36<=$age && $age<45):
		return 0.6;
		break;
		case (45<=$age && $age<57):
		return 0.4;
		break;
		case (57<=$age):
		return 0.2;
		break;
}
		} 
		
		//Building the exp_type_score, Recieving age(int) returns float between 0-1.
		function exp_type_score($Exp_type){
		switch($Exp_type){
		case ($Exp_type=="׳׳×׳—׳™׳"):
		return 0.2;
		break;
		case ($Exp_type=="׳—׳•׳‘׳‘׳"):
		return 0.4;
		break;
		case ($Exp_type=="׳ ׳¢׳¨׳™׳-׳ ׳•׳¢׳¨"):
		return 0.6;
		break;
		case ($Exp_type=="׳‘׳•׳’׳¨׳™׳ - ׳¢׳“ ׳׳™׳’׳” ׳'"):
		return 0.8;
		break;
		case ($Exp_type=="׳‘׳•׳’׳¨׳™׳ - ׳׳™׳’׳•׳× ׳’׳‘׳•׳”׳•׳×"):
		return 1;
		break;

		
}
		} 
		
		function yearsExp_score($yearsExp){
		switch($yearsExp){
		case (0<$yearsExp && $yearsExp<2):
		return 0.2;
		break;
		case (2<=$yearsExp && $yearsExp<4):
		return 0.4;
		break;
		case (4<=$yearsExp && $yearsExp<=6):
		return 0.6;
		break;
		case (6<$yearsExp && $yearsExp<10):
		return 0.8;
		break;
		case (10<=$yearsExp):	
		return 1;
		break;
}
		} 

				//Building the fit_score, Recieving age(int) returns float between 0-1.
				
		function fit_score($fitLevel){
		switch($fitLevel){
		case ($fitLevel=="׳׳ ׳׳×׳׳׳"):
		return 0.2;
		break;
		case ($fitLevel=="׳׳×׳׳׳ ׳₪׳¢׳ ׳‘׳©׳‘׳•׳¢"):
		return 0.4;
		break;
		case ($fitLevel=="׳׳×׳׳׳ ׳₪׳¢׳׳™׳™׳ ׳‘׳©׳‘׳•׳¢"):
		return 0.6;
		break;
		case ($fitLevel=="׳׳×׳׳׳ 3-4 ׳₪׳¢׳׳™׳ ׳‘׳©׳‘׳•׳¢"):
		return 0.8;
		break;
		case ($fitLevel=="׳׳×׳׳׳ ׳׳¢׳ 4 ׳₪׳¢׳׳™׳ ׳‘׳©׳‘׳•׳¢"):
		return 1;
		break;
}
		} 

		$Expeirence_type_score=exp_type_score($Exp_type);
		$fittness_score=fit_score($fitLevel);
		$age_score=age_score($age);
		$Years_experience=yearsExp_score($yearsExp);
		
	// Building a function that takes age, Years of experience and Type of experience and gives back Score Level.
	
		function level_score($Expeirence_type_score,$fittness_score,$age_score,$Years_experience){
		$level_score=0.4*$Expeirence_type_score+0.1*$age_score+0.3*$Years_experience+0.2*$fittness_score;
		return $level_score;
		}
		
		
		function level($level_score){
		switch($level_score){
		case (0<$level_score && $level_score<=0.3):
		return "B";
		break;
		case (0.7<$level_score):
		return "P";
		break;
		case (0.3<$level_score && $level_score<=0.7):
		return "M";
		break;
		
	}

		}
		
		$level_score=level_score($Expeirence_type_score,$fittness_score,$age_score,$Years_experience);
		$test= Level($level_score);#'B';
		
		
		function heightgrade($height){
	return (($height-150)*1.6666)/100;
		}
		
		function weightgrade($weight){
	return (($weight-50)*1.4286)/100;
		}
		
		$height_score=heightgrade($height);		
		$weight_score= weightgrade($weight);#'B';

		
		function position_score($height_score,$weight_score){
		$position_score=0.6*$height_score+0.4*$weight_score;
		return $position_score;
		}
		
		$position_score=position_score($height_score,$weight_score);
		
		function Position($position_score){
		switch($position_score){
		case (0<$position_score && $position_score<=0.4):
		return "Guard";
		break;
		case (0.4<$position_score && $position_score<=0.7):
		return "Forward";
		break;
		case (0.7< $position_score && $position_score<=1):
		return "Center";
		break;
	}

		}

		
		$position=Position($position_score);

		
	$query = "SELECT login FROM users where login=\"$login\"";
	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		$_SESSION['error'] = "הדואר האלקטרוני קיים כבר במערכת";
		header('Location: register_new.php');	}
	else{
	$query2 ="INSERT into users (name, last_name, birth_date, gender, height, weight, fittness_level, exp_years, exp_type, login, password, last_used,Level,Position,user_type) VALUES
	 (\"$name\", \"$fname\",\"$birth_date\",\"$gender\",$height,$weight,\"$fitLevel\",$yearsExp,\"$Exp_type\",\"$login\",$encrypted_password,NOW(),\"$test\",\"$position\",0)";
	$result2 = $conn->query($query2);
	
		if($result2)
			{
				$_SESSION['error'] = "success".$level_score;

			}
		else
			{
				$_SESSION['error'] = $name." ".$fname." ".$birth_date." ".$gender." ".$height." ".$weight." ".$fitLevel." ".$yearsExp." ".$SelectExp." ".$login." ".$encrypted_password." ".$test." ".$position;

			}
		header('Location: login_page.php');
	}
	

?>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
