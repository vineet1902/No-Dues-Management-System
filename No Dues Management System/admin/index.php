<?php 
  include('db_connection.php');
  if(session_id()==""){
    session_start();
  }
  if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"admin")==0){
    header('location:admin-profile.php');
  }
  else if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"manager")==0){
    header('location:manager-profile.php');
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
    <link rel="icon" href="../img/icon.png">

    <title>Dues Management Admin Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div align="center">
      <h2>Welcome to Dues Management Admin Portal!</h2>
    </div>
    <!--Signin Form-->
    <div class="container">
      <form class="form-signin" action="login.php" method="post">
        <div align="center">
          <h3 class="form-signin-heading">Please sign in</h3>
        </div>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="username" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <br>
        <select name="login_as" class="btn btn-primary">
          <option role="presentation" value="admin" default>Admin</option>
          <option role="presentation" value="manager">Manager</option>
        </select>
        <br><br>
        <div id="error-div" class="alert alert-danger" role="alert" style="display:none;">
          <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
          <span id="error-span"></span>
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      </form>
      <div align="center">
        <h5><a href="../index.php">Student Login?</a></h5>
        <h5><a href="forgot-password.php">Manager - Forgot Password?</a></h5>
      </div> 

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
                </script>";
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
        else if(strcasecmp($_GET['error'],"connection")==0){
          echo "<script>
                document.getElementById('error-span').innerHTML = 'Connection problem. If problem persists, try using a different password.';
                document.getElementById('error-div').style.display = 'block';
                </script>
          ";
        }
      }
    ?>
  </body>
</html>
