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
	if(isset($_POST['submit'])){
		$roll = mysql_real_escape_string(stripslashes($_POST['roll']));
		$amount = mysql_real_escape_string(stripslashes($_POST['amount']));
		$reason = mysql_real_escape_string(stripslashes($_POST['reason']));
		$student_query = mysql_query("select * from student where roll='$roll'",$connection);
		if(mysql_num_rows($student_query)!=1){
			header('location:admin-profile-hostel.php?error=roll');
		}
		else{
			$query = mysql_query("select * from hostel_due where roll_number='$roll'",$connection);
			if(mysql_num_rows($query)==0){
				$query = mysql_query("insert into hostel_due (roll_number,due_amount,added_by,added_on,reason) values ('".$roll."','".$amount."','".$_SESSION['name']."',NOW(),'".$reason."')",$connection);
				if($query){
					header('location:admin-profile-hostel.php?error=none');
				}
				else{
					header('location:admin-profile-hostel.php?error=connection');
				}
			}
			else{
				$query = mysql_query("update hostel_due set due_amount=due_amount+'$amount', added_by='".$_SESSION['name']."', added_on=NOW(), reason='$reason' where roll_number='$roll'",$connection);
				if($query){
					header('location:admin-profile-hostel.php?error=none');
				}
				else{
					header('location:admin-profile-hostel.php?error=connection');
				}
			}
		}
	}
	else{
		header('location:index.php');
	}
?>