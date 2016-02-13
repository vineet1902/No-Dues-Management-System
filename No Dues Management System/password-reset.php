<?php
	include('db_connection.php');
	if(session_id()==""){
		session_start();
	}
	if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"student")==0){
    	header('location:student-profile.php');
  }
  if(isset($_GET['email'])&&isset($_GET['key'])){
 		$email = mysql_real_escape_string(stripslashes($_GET['email']));
 		$key = mysql_real_escape_string(stripslashes($_GET['key']));
  	$query = mysql_query("select * from `email` where `email`='$email' and `key`='$key';",$connection);
  	if(mysql_num_rows($query)==0){
  		/*echo $email;
  		echo "<br>";
  		echo $key;
  		echo "<br>";*/
  		header('location:index.php');
  	}
  	else{
  		$row = mysql_fetch_assoc($query);
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
    <link rel="icon" href="img/icon.png" type="image/png">

    <title>Dues Management Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="js/ie-emulation-modes-warning.js"></script-->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/npm.js"></script> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div align="center">
      <h2>Welcome to Dues Management Portal!</h2>
    </div>
    <br/><br/><br/><br/>
    <div align="center">
    	<h3>Welcome <?php echo $row['roll'];?>. Forgot your password?</h3>
    	<h3>Enter your new password.</h3>
    	<form class="form-signin" action="password-reset1.php" method="post">
    		<input type="password" class="form-control" name="password" placeholder="Enter password" required>
    		<br>
    		<input type="password" class="form-control" name="confirm-password" placeholder="Confirm password" required>
    		<br>
    		<input type="number" style="display:none;" class="form-control" name="roll" value=<?php echo '"'.$row['roll'].'"';?>>
    		<div id="error-div" class="alert alert-danger" role="alert" style="display:none;">
	          <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
	          <span id="error-span">Error - Invalid Roll/Password</span>
	        </div>
    		<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Change Password</button>
    	</form>
    </div>
    <?php
      if(isset($_GET['error'])){
        if(strcasecmp($_GET['error'],"match")==0){
          echo "<script>
                document.getElementById('error-span').innerHTML = 'Password did not match.';
                document.getElementById('error-div').style.display = 'block';
                </script>
          ";
        }
        else if(strcasecmp($_GET['error'],"connection")==0){
          echo "<script>
                document.getElementById('error-span').innerHTML = 'Connection problem';
                document.getElementById('error-div').style.display = 'block';
                </script>
          ";
        }
        else if(strcasecmp($_GET['error'],"none")==0){
        	echo "<script>
                document.getElementById('error-span').innerHTML = 'Mail sent';
                document.getElementById('error-glyphicon').className='glyphicon glyphicon-ok';
                document.getElementById('error-div').className = 'alert alert-success';
                document.getElementById('error-div').style.display = 'block';
                </script>
          ";
        }
      }
    ?>
  </body>
</html>