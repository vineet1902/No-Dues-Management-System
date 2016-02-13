<?php
	include('db_connection.php');
	if(session_id()==""){
		session_start();
	}
	if(isset($_POST['submit'])){
		$user = mysql_real_escape_string(stripslashes($_POST['username']));
		$password = mysql_real_escape_string(stripslashes($_POST['password']));
		$as = mysql_real_escape_string(stripslashes($_POST['login_as']));
		$enc_password = encrypt($password,ENCRYPTION_KEY);
		//echo $enc_password;
		//echo decrypt($enc_password,ENCRYPTION_KEY);
		if(strcmp($as,"admin")==0){
			$query = mysql_query("select * from admin where username='$user' and password='$enc_password'",$connection);
			if(mysql_num_rows($query)==1)
			{
				$row = mysql_fetch_assoc($query);
				$_SESSION['login_as']="admin";
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $enc_password;
				$_SESSION['name'] = $row['name'];
				header('location:admin-profile.php');
			}
			else if(mysql_num_rows($query)==0){
				header('location:index.php?error=credential');
			}
			//echo $enc_password;	
		}
		else{
			$query = mysql_query("select * from manager where username='$user' and password='$enc_password'",$connection);
			if(mysql_num_rows($query)==1)
			{
				$row = mysql_fetch_assoc($query);
				$_SESSION['login_as'] = "manager";
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $enc_password;
				$_SESSION['name'] = $row['name'];
				$_SESSION['hostel'] = $row['hostel'];
				$_SESSION['role'] = $row['role'];
				header('location:manager-profile.php');
			}
			else if(mysql_num_rows($query)==0){
				header('location:index.php?error=credential');
			}
			//echo $enc_password;	
		}
	}
	else{
		header('location:index.php');
	}
?>