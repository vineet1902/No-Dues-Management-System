<?php 
  include('db_connection.php');
  if(session_id()==""){
    session_start();
  }
  if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"student")==0){
    header('location:student-profile.php');
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
    <!--Signin Form-->
    <div class="container">
      <form class="form-signin" action="login.php" method="post">
        <div align="center">
          <h3 class="form-signin-heading">Please sign in</h3>
        </div>
        <label for="inputRoll" class="sr-only">Roll number</label>
        <input type="number" step="any" name="roll" id="inputRoll" class="form-control" placeholder="Roll number" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <br>
        <div id="error-div" class="alert alert-danger" role="alert" style="display:none;">
          <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
          <span id="error-span">Error - Invalid Roll/Password</span>
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      </form>
      <div align="center">
        <h5><a href="admin/index.php">Admin or Manager Login?</a></h5>
        <h5><a href="forgot-password.php">Forgot Password?</a></h5>
    </div> 
    <!--Signin Form ends-->



    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <?php
      if(isset($_GET['error'])){
        if(strcasecmp($_GET['error'],"credential")==0){
          echo "<script>
                document.getElementById('error-span').innerHTML = 'Error - Invalid Roll/Password';
                document.getElementById('error-div').style.display = 'block';
                </script>
          ";
        }
        else if(strcasecmp($_GET['error'],"noneReset")==0){
          echo "<script>
                document.getElementById('error-span').innerHTML = 'Reset Successful.';
                document.getElementById('error-div').className='alert alert-success';
                document.getElementById('error-glyphicon').className='glyphicon glyphicon-ok';
                document.getElementById('error-div').style.display = 'block';
                </script>
          ";
        }
        else if(strcasecmp($_GET['error'],"matchReset")==0){
          echo "<script>
                document.getElementById('error-span').innerHTML = 'Password did not match. Apply for a reset again.';
                document.getElementById('error-div').style.display = 'block';
                </script>
          ";
        }
      }
    ?>
    
  </body>
</html>
