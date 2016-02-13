<?php
	include('db_connection.php');
	if(session_id()==""){
		session_start();
	}
	if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"student")==0){
    	header('location:student-profile.php');
  	}
	if(isset($_POST['submit'])){
		$pass = mysql_real_escape_string(stripslashes($_POST['password']));
		$pass1 = mysql_real_escape_string(stripslashes($_POST['confirm-password']));
		$roll = mysql_real_escape_string(stripslashes($_POST['roll']));
		if(strcmp($pass,$pass1)==0){
			$pass = encrypt($pass,ENCRYPTION_KEY);
			$query = mysql_query("update student set password='$pass' where roll='$roll'",$connection);
			if($query){
				$keys = generateRandomString(10);
      			$query = mysql_query("update `email` set `key`='$keys' where `roll`='$roll';",$connection);
				header('location:index.php?error=noneReset');
			}
			else{
				header('location:index.php?error=connection');
			}
		}
		else{
			header('location:index.php?error=matchReset');
		}
	}
	else{
		header('location:index.php');
	}
?>