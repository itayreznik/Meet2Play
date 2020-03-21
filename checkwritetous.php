<?php
	session_start();
		if ( (isset($_REQUEST['name'])) and (isset($_REQUEST['fname'])) 	
		and (isset($_REQUEST['login'])) and (isset($_REQUEST['write']))
		and ($_REQUEST['name'] != "") and ($_REQUEST['fname'] != "" )and ($_REQUEST['login'] != "" )
		and ($_REQUEST['write'] != ""))                                 // has some value (not empty from the form)
	{
		$_SESSION['login'] = $_REQUEST['login'];							
		$login = $_SESSION['login'];	
	}	else {
		$_SESSION['error'] = "Something is empty";		// set an error dtring to display in the first page
		header('Location: register_new.php');									// redirect to first page
		die();							
	}
		$write = $_REQUEST['write'];
		$name = $_REQUEST['name'];
		$fname = $_REQUEST['fname'];
		
	include("connect_db.php");
		

	$query2 ="INSERT into application (name, fname,email, content) VALUES (\"$name\", \"$fname\",\"$login\",\"$write\")";
	$result2 = $conn->query($query2);
	
		if($result2)
			{
				$_SESSION['error'] = "success";

			}
		else
			{
			
			}
	
	header('Location: writetous.php');

?>