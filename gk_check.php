<?php
	session_start();
	
	
	if ( (isset($_REQUEST['login'])) and (isset($_REQUEST['password']))		// In case entered this url directly
		and ($_REQUEST['login'] != "") and ($_REQUEST['password'] != "" ))	// has some value (not empty from the form)
	{
		$_SESSION['login'] = $_REQUEST['login'];							// keep the login for future display
		$login = $_SESSION['login'];										// save it localy for the query
	} else {
		$_SESSION['error'] = "יש להכניס את כל הפרטים";		// set an error dtring to display in the first page
		header('Location: login_page.php');									// redirect to first page
		die();							
	}
	
	include("connect_db.php");
	
//	$encrypted_password = crypt($_REQUEST['password'],10);					// Ecript the login and check vs the ecripted password in the database
	$encrypted_password = $_REQUEST['password'];

	$query = "select user_id,login,password,user_type from users ".
	 " where login=\"$login\" and password = \"$encrypted_password\"";

	$OK = false;
	$result = $conn->query($query);
	if ($result->num_rows != 0)  {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$_SESSION['id'] = $row["user_id"];
		$id=$_SESSION['id'];
		$_SESSION['user_type'] = $row["user_type"];
		$user_type=$_SESSION['user_type'];	

		$query2 = "UPDATE users SET last_used = NOW() WHERE user_id=\"$id\"";
		$result2 = $conn->query($query2);									// keep u_id as id to update user datetime in the open page
		$OK = true;															// ok flag to redirect acordingly
	}
	$result->free();
	$conn->close();

	if ($OK) {
	
		if ($user_type==0) {
			header('location: Filters Page.php?year='.date('Y').'&month='.date('m').'&day='.date('d'));

		}
		else {
			header('Location: weekly_calendar.php'); }

		}
								                                           // OK
	else {
		$_SESSION['error'] = "שם משתמש ו/או סיסמא לא נכונים";
		header('Location:login_page.php');		
		die();					// ERROR
	}		
?>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">