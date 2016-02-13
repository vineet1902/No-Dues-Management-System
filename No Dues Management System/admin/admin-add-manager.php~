<?php
	include('db_connection.php');
	if(session_id()==""){
		session_start();
	}
	if(!isset($_SESSION['login_as'])){
		header('location:index.php');
	}
	else if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"admin")!=0){
		header('location:index.php');
	}
	if(isset($_POST['submit'])){
		$name=mysql_real_escape_string(stripslashes($_POST['name']));
		$username=mysql_real_escape_string(stripslashes($_POST['username']));
		$pass=mysql_real_escape_string(stripslashes($_POST['password']));
		$pass1=mysql_real_escape_string(stripslashes($_POST['confirm-password']));
		$hostel=mysql_real_escape_string(stripslashes($_POST['hostel']));
		$role=mysql_real_escape_string(stripslashes($_POST['role']));
		if(strcmp($pass,$pass1)==0){
			$pass = encrypt($pass,ENCRYPTION_KEY);
			$query = mysql_query("select * from manager where username='$username'",$connection);
			if(mysql_num_rows($query)==0){
				if(strcmp($role,"other")==0){
					$hostel = "none";
				}
				$keys = generateRandomString(10);

				$query = mysql_query("insert into manager (name,username,password,role,hostel) values ('".$name."','".$username."','".$pass."','".$role."','".$hostel."')",$connection);
				$query = mysql_query("insert into `admin_email` (`email`,`key`) values ('".$username."','".$keys."');",$connection);
				if($query){
					confirmMail($username.'@iitg.ernet.in');
					header('location:admin-manager.php?error=none');
				}
				else{
					header('location:admin-manager.php?error=connection');
				}
			}
			else{
				header('location:admin-manager.php?error=duplicate');
			}
		}
		else{
			header('location:admin-manager.php?error=match');
		}
	}
?>
