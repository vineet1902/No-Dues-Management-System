<?php
	include('db_connection.php');
	if(session_id()==""){
		session_start();
	}
	if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"admin")==0){
   		header('location:admin-profile.php');
  	}
  	else if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"manager")==0){
    	header('location:manager-profile.php');
  	}
  	if(isset($_POST['submit'])){
  		$pass = mysql_real_escape_string(stripslashes($_POST['password']));
		$pass1 = mysql_real_escape_string(stripslashes($_POST['confirm-password']));
		$email = mysql_real_escape_string(stripslashes($_POST['email']));
		if(strcmp($pass,$pass1)==0){
			$pass = encrypt($pass,ENCRYPTION_KEY);
			$query = mysql_query("update manager set password='$pass' where username='$email'",$connection);
			if($query){
				$keys = generateRandomString(10);
      			$query = mysql_query("update `admin_email` set `key`='$keys' where `email`='$email';",$connection);
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