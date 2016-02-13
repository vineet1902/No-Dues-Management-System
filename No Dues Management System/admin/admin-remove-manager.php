<?php
	include('db_connection.php');
	if(session_id()==""){
		session_start();
	}
	if(!isset($_SESSION['login_as'])){
		header('location:index.php');
	}
	if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"admin")!=0){
		header('location:index.php');
	}
	if(isset($_GET['username'])){
		$username = mysql_real_escape_string(stripslashes($_GET['username']));
		$query = mysql_query("select * from manager where username='$username'",$connection);
		if(mysql_num_rows($query)==1){
			$query = mysql_query("delete from admin_email where email='$username'",$connection);
			$query = mysql_query("delete from manager where username='$username'",$connection);
			if($query){
				header("location:admin-manager.php?error=noneRemove");
			}
			else{
				header('location:admin-manager.php?error=connection');
			}
			
		}
		else{
			header('location:admin-manager.php?error=invalidRemove');
		}
	}
	else{
		header('location:index.php');
	}
?>