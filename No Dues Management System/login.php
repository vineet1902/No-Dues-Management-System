<?php
	include('db_connection.php');
	if(session_id()==""){
		session_start();
	}
	if(isset($_POST['submit'])){
		$roll = mysql_real_escape_string(stripslashes($_POST['roll']));
		$password = mysql_real_escape_string(stripslashes($_POST['password']));
		$enc_password = encrypt($password,ENCRYPTION_KEY);
		//echo $enc_password;
		//echo decrypt($enc_password,ENCRYPTION_KEY);
		$query = mysql_query("select * from student where roll='$roll' and password='$enc_password'",$connection);
		if(mysql_num_rows($query)==1)
		{
			$query1 = mysql_query("select * from email where roll='$roll'",$connection);
			$row1 = mysql_fetch_assoc($query1);
			$row = mysql_fetch_assoc($query);
			$_SESSION['login_as']="student";
			$_SESSION['roll'] = $roll;
			$_SESSION['email'] = $row1['email'];
			$_SESSION['password'] = $enc_password;
			$_SESSION['name'] = $row['name'];
			$_SESSION['hostel'] = $row['hostel'];
			header('location:student-profile.php');
		}
		else if(mysql_num_rows($query)==0){
			header('location:index.php?error=credential');
		}
	}
	else{
		header('location:index.php');
	}
?>