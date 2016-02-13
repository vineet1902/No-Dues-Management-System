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
	if(isset($_GET['roll'])){
		$roll = mysql_real_escape_string(stripslashes($_GET['roll']));
		$query = mysql_query("select * from student where roll='$roll'",$connection);
		if(mysql_num_rows($query)==1){
			
			$query = mysql_query("delete from `email` where `roll`='$roll';",$connection);	//weird.
			$query = mysql_query("delete from `student` where `roll`='$roll';",$connection);
			$query = mysql_query("delete from `mess_due` where `roll_number`='$roll';",$connection);
			$query = mysql_query("delete from `hostel_due` where `roll_number`='$roll';",$connection);
			$query = mysql_query("delete from `other_due` where `roll_number`='$roll';",$connection);
			header("location:admin-student.php?error=noneRemove");
		}
		else{
			header('location:admin-student.php?error=invalidRemove');
		}
	}
	else{
		header('location:index.php');
	}
?>