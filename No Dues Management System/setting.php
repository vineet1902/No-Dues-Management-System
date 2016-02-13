<?php
	include('db_connection.php');
	if(session_id()==""){
		session_start();
	}
	if(!isset($_SESSION['login_as'])){
		header('location:index.php');
	}
	if(isset($_POST['password'])){
		$pass = mysql_real_escape_string(stripslashes($_POST['password']));
		$pass1 = mysql_real_escape_string(stripslashes($_POST['new-password']));
		$pass2 = mysql_real_escape_string(stripslashes($_POST['confirm-password']));
		$pass = encrypt($pass,ENCRYPTION_KEY);
		if(strcmp($_SESSION['password'],$pass)==0){
			if(strcmp($pass1, $pass2)==0){
				$pass1 = encrypt($pass1,ENCRYPTION_KEY);
				$query = mysql_query("update student set password='$pass1' where roll='".$_SESSION['roll']."'",$connection);
				if($query){
					$_SESSION['password'] = $pass1;
					header('location:setting.php?error=none');
				}
				else{
					header('location:setting.php?error=connection');
				}
			}
			else{
				header('location:setting.php?error=pass_match');
			}
		}
		else{
			header('location:setting.php?error=cur_pass');
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/icon.png">

    <title>Settings</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-color:;">
  	<!--Navbar Begins-->
  	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
	  	<h3 class="navbar-text"><a href="student-profile.php"><span class="glyphicon glyphicon-home" title="Home" aria-hidden="true"></span></a></h3>
	  	<h3 class="navbar-text"><a href="#"><span class="glyphicon glyphicon-wrench" title="Settings" aria-hidden="true"></span></a></h3>
	    <h3 class="navbar-text"><?php echo "Welcome ".$_SESSION['name'];?></h3>
	    <h3 class="navbar-text navbar-right"><a href="logout.php"><span class="glyphicon glyphicon-log-out" title="Log Out" aria-hidden="true"></span></a></h3>
	  </div>
	</nav>
	<!--Navbar Ends-->
	<br>
	<br>
	<div id="error-div" class="alert alert-danger" role="alert" style="display:none;" align="center">
          <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
          <span id="error-span"></span>
    </div>
	<!--Nav Begins-->
	<div style="margin-top:5%;">
		<h2 align="center" id="pass-message">Change your password.</h2>
		<br><br>
		<form class="form-horizontal" method="post">
			<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-5 control-label">Current Password</label>
		    	<div class="col-sm-4">
		     		<input type="password" class="form-control" id="inputEmail3" name="password" placeholder="Current Password" required>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-5 control-label">New Password</label>
		    	<div class="col-sm-4">
		     		<input type="password" name="new-password" class="form-control" id="inputEmail3" placeholder="New Password" required>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-5 control-label">Confirm Password</label>
		    	<div class="col-sm-4">
		     		<input type="password" class="form-control" name="confirm-password" id="inputEmail3" placeholder="Confirm Password" required>
		    	</div>
		  	</div>
		  	<div class="form-group">
		  		<div class="col-sm-5"></div>
		  		<div class="col-sm-4">
		    		<button type="submit" class="btn btn-primary">Change Password</button>
		    	</div>
		  	</div>
		</form>
	</div>
	<?php
		if(isset($_GET['error'])){
			$msg="";
			if(strcmp($_GET['error'],"connection")==0){
				$msg = "Connection problem. Try again.";
			}
			else if(strcmp($_GET['error'],"pass_match")==0){
				$msg = "Password did not match";
			}
			else if(strcmp($_GET['error'],"cur_pass")==0){
				$msg = "Password incorrect.";
			}
			else if(strcmp($_GET['error'], "none")==0){
				$msg = "Password changed.";
			}
			if(strcmp($msg, "Password changed.")==0){
				echo "<script>document.getElementById('error-div').className= 'alert alert-success';
						document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-ok';
						
						document.getElementById('error-span').innerHTML = '".$msg."';
						document.getElementById('error-div').style.display = 'block';</script>";
			}
			else if(strcmp($msg,"")!=0){
				echo "<script>
						
						document.getElementById('error-span').innerHTML = '".$msg."';
						document.getElementById('error-div').style.display = 'block';</script>";	
			}
		}
	?>
  </body>

 </html>