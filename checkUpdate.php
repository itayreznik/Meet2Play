<?php
	session_start();
	include("connect_db.php");
	$id=$_SESSION['id'];
	$OK=false;
	
		if (($_REQUEST['name'] != NULL)) {                              //1
			$_SESSION['name']=$_REQUEST['name'];
			$name=$_SESSION['name'];
			$OK=true;	}				
		else {
			$query= "select name from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$name= $row["name"];  }
			
		if (($_REQUEST['fname'] != NULL)) {                           //2
			$_SESSION['fname']=$_REQUEST['fname'];
			$fname=$_SESSION['fname'];
			$OK=true;	}				
		else {
			$query= "select last_name from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$fname= $row["last_name"];  }
			
		if (($_REQUEST['yearsExp'] != NULL)) {                         //3
			$_SESSION['yearsExp']=$_REQUEST['yearsExp'];
			$yearsExp=$_SESSION['yearsExp'];
			$OK=true; }					
		else {
			$query= "select exp_years from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$yearsExp= $row["exp_years"];  }
			
		if (($_REQUEST['SelectExp'] != NULL)) {                         //4
			$_SESSION['SelectExp']=$_REQUEST['SelectExp'];
			$SelectExp=$_SESSION['SelectExp'];
			$OK=true;	}				
		else {
			$query= "select exp_type from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$SelectExp= $row["exp_type"]; }
			
		if (($_REQUEST['fitLevel'] != NULL)) {                         //5
			$_SESSION['fitLevel']=$_REQUEST['fitLevel'];
			$fitLevel=$_SESSION['fitLevel'];
			$OK=true; }				
		else {
			$query= "select fittness_level from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$fitLevel= $row["fittness_level"]; }
			
		if (($_REQUEST['height'] != NULL)) {                         //6
			$_SESSION['height']=$_REQUEST['height'];
			$height=$_SESSION['height'];
			$OK=true; }					
		else {
			$query= "select height from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$height= $row["height"]; }
			
		if (($_REQUEST['weight'] != NULL)) {                         //7
			$_SESSION['weight']=$_REQUEST['weight'];
			$weight=$_SESSION['weight'];
			$OK=true; }				
		else {
			$query= "select weight from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$weight= $row["weight"]; }
			
		if (($_REQUEST['password'] != NULL)) {                         //8
			$_SESSION['password']=$_REQUEST['password'];
			$encrypted_password=$_SESSION['password'];
			$OK=true;	}				
		else {
			$query= "select password from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$encrypted_password= $row["password"]; }
			
		if (($_REQUEST['login'] != NULL)) {                         //9
			$_SESSION['login']=$_REQUEST['login'];
			$login=$_SESSION['login'];
			$OK=true;	}				
		else {
			$query= "select login from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$login= $row["login"]; }
			
			if (($_REQUEST['login'] != NULL)) {                         //9
			$_SESSION['login']=$_REQUEST['login'];
			$login=$_SESSION['login'];
			$OK=true;	}				
		else {
			$query= "select login from users where \"$id\"=user_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$login= $row["login"]; }

$query1= "select year(birth_date) as year,month(birth_date) as month,day(birth_date) as day FROM users where user_id=\"$id\" ";
			$result1 = $conn->query($query1);
			$row1 = $result1->fetch_array(MYSQLI_ASSOC);
			$year= $row1["year"];
			$month= $row1["month"];
			$day= $row1["day"];


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
		case ($Exp_type=="מתחיל"):
		return 0.2;
		break;
		case ($Exp_type=="חובבן"):
		return 0.4;
		break;
		case ($Exp_type=="נערים-נוער"):
		return 0.6;
		break;
		case ($Exp_type=="בוגרים - עד ליגה א'"):
		return 0.8;
		break;
		case ($Exp_type=="בוגרים - ליגות גבוהות"):
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
		case ($fitLevel=="לא מתאמן"):
		return 0.2;
		break;
		case ($fitLevel=="מתאמן פעם בשבוע"):
		return 0.4;
		break;
		case ($fitLevel=="מתאמן פעמיים בשבוע"):
		return 0.6;
		break;
		case ($fitLevel=="מתאמן 3-4 פעמים בשבוע"):
		return 0.8;
		break;
		case ($fitLevel=="מתאמן מעל 4 פעמים בשבוע"):
		return 1;
		break;
}
		} 

		$Expeirence_type_score=exp_type_score($SelectExp);
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
		$test= level($level_score);#'B';
		
		
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


	
if ($OK = true) {				
	$query = "UPDATE users SET name=\"$name\",last_name=\"$fname\",fittness_level=\"$fitLevel\",exp_years=\"$yearsExp\",exp_type=\"$SelectExp\",login=\"$login\",password=\"$encrypted_password\",height=\"$height\",weight=\"$weight\", Level = \"$test\", Position = \"$position\", last_used = NOW() WHERE user_id=\"$id\"" ;
	$result = $conn->query($query); 
	$_SESSION['error']="הנתונים עודכנו בהצלחה!";
	
	header('Location:Update_details.php'); 
	}
else {
		$_SESSION['error']="לא בוצע שינוי";
		header('Location:Update_details.php'); 
		}
		
		 

?>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">