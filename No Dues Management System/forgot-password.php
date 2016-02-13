<?php 
  include('db_connection.php');
  if(session_id()==""){
    session_start();
  }
  if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"student")==0){
    header('location:student-profile.php');
  }
  if(isset($_POST['submit'])){
  	$roll = mysql_real_escape_string(stripslashes($_POST['roll']));
  	$query1 = mysql_query("select * from email where roll='$roll'",$connection);
  	if(mysql_num_rows($query1)==0){
  		header('location:forgot-password.php?error=email');
  	}
  	else{
  		//$key = rand();
  		$keys = generateRandomString(10);
      //echo "update email set key='$keys' where roll=".$roll."";
      $query = mysql_query("update `email` set `key`='$keys' where `roll`='$roll';",$connection);
  		//$query = mysql_query("update email set key='$keys' where roll='".$roll."'",$connection);
//  		$query = mysql_query("update email set key=RAND() where email='$email'",$connection);
  		if($query){
			//Send mail....
			$row1 = mysql_fetch_assoc($query1);
			$url = "https://no-dues.appspot.com/password-reset.php?email=".urlencode($row1['email'])."&key=".$keys;
			//echo "Mail won't work inside IITG. Please visit this link - ".$url;
			sendMail($row1['email'].'@iitg.ernet.in',$url);
		  	header('location:forgot-password.php?error=none');
  		}
  		else{
        //echo  mysql_error($connection);
  			header('location:forgot-password.php?error=connection');
  		}
  		
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
    	<h3>Forgot password? Enter your roll number.</h3>
    	<form class="form-signin" action="" method="post">
    		<input type="number" class="form-control" name="roll" placeholder="Enter your roll number" required>
    		<br>
    		<div id="error-div" class="alert alert-danger" role="alert" style="display:none;">
	          <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
	          <span id="error-span">Error - Invalid Roll/Password</span>
	        </div>
    		<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>
    	</form>
    </div>
    <?php
      if(isset($_GET['error'])){
        if(strcasecmp($_GET['error'],"email")==0){
          echo "<script>
                document.getElementById('error-span').innerHTML = 'Invalid Roll number';
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
