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
		//echo "Kidhar ghus raha hai be.";
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

    <title>Manager List</title>

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
  	<!--Navbar Begins-->
  	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
	  	<h3 class="navbar-text"><a href="admin-profile.php"><span class="glyphicon glyphicon-home" title="Home" aria-hidden="true"></span></a></h3>
	  	<h3 class="navbar-text"><a href="admin-setting.php"><span class="glyphicon glyphicon-wrench" title="Settings" aria-hidden="true"></span></a></h3>
	  	<h3 class="navbar-text"><a href="admin-student.php"><span class="glyphicon glyphicon-education" title="Student List" aria-hidden="true"></span></a></h3>
	  	<h3 class="navbar-text"><a href="#"><span class="glyphicon glyphicon-user" title="Manager List" aria-hidden="true"></span></a></h3>
	    <h3 class="navbar-text"><?php echo "Welcome ".$_SESSION['name'];?></h3>
	    <h3 class="navbar-text navbar-right"><a href="logout.php"><span class="glyphicon glyphicon-log-out" title="Log Out" aria-hidden="true"></span></a></h3>
	  </div>
    </nav>
    <!--Navbar Ends-->
    <br>
    <br>
    <!--Add Manager-->
    <div id="error-div" class="alert alert-danger" role="alert" style="display:none;" align="center">
          <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
          <span id="error-span"></span>
    </div>
    <div align="center">
      <div>
        <h3 align="center">Add Manager</h3>
        <form class="form-inline" action="admin-add-manager.php" method="post">
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail3">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail3" name="name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail3">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail3" name="username" placeholder="Username" required>
          </div>
          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword3">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword3" name="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword3">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword3" name="confirm-password" placeholder="Confirm Password" required>
          </div>
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail3">Hostel</label>
            <input type="text" class="form-control" id="exampleInputEmail3" name="hostel" placeholder="Hostel" required>
          </div>
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail3">Role</label>
            <select name="role" class="btn btn-default">
              <option value="mess" default>Mess</option>
              <option value="hostel">Hostel</option>
              <option value="other">Other</option>
            </select>
            <!--input type="text" class="form-control" id="exampleInputEmail3" name="role" placeholder="Role" required-->
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </form>
      </div>

    <!--Add Manager Ends-->

    <div align="center">
      <div align="center">
        <h2>Manager List.</h2>
        <form class="form-inline" action="" method="get">
          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputName2" name="username" placeholder="Username">
          </div>
          <input type="submit" class="btn btn-primary" value="Search">
        <form>
      </div>
      <table class="table">
        <tr>
          <th></th>
          <th></th>
          <th>Name</th>
          <th>Username</th>
          <th>Role</th>
          <th>Hostel</th>
          <th></th>
        </tr>
        <?php
          if(isset($_GET['username'])){
            $r = mysql_real_escape_string(stripslashes($_GET['username']));
            if(strcmp($r,"")==0){
              $query1=mysql_query("select * from manager order by name",$connection); 
            }
            else{
              $query1 = mysql_query("select * from manager where username='$r'",$connection);
            }
          }
          else{
            $query1=mysql_query("select * from manager order by name",$connection); 
          }
          while($row = mysql_fetch_assoc($query1)){
            echo '
              <tr>
                <td></td>
                <td></td>
                <td>'.$row['name'].'</td>
                <td>'.$row['username'].'</td>
                <td>'.$row['role'].'</td>
                <td>'.$row['hostel'].'</td>
                <td><a class="btn btn-primary" href="admin-remove-manager.php?username='.$row['username'].'"><span class="glyphicon glyphicon-trash" title="Remove" aria-hidden="true"></span></a></td>
              </tr>
            ';
          }
        ?>
      </table>
      <?php
        $msg="";
        if(isset($_GET['error'])){
          $msg=$_GET['error'];
          if(strcmp($msg,"duplicate")==0){
            $msg = "Manager already exists.";
          }
          else if(strcmp($msg,"match")==0){
            $msg = "Passwords do not match.";
          }
          else if(strcmp($msg,"connection")==0){
            $msg = "Connection problem. Please try again later.";
          }
          else if(strcmp($msg,"none")==0){
            $msg = "Manager successfuly added.";
          }
          else if(strcmp($msg,"invalidRemove")==0){
            $msg = "No such manager exists.";
          }
          else if(strcmp($msg,"noneRemove")==0){
            $msg = "Delete successful.";
          }
          if(strcmp($msg,"Manager successfuly added.")==0||strcmp($msg,"Delete successful.")==0){
            echo "<script>
              document.getElementById('error-div').className = 'alert alert-success';
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-ok';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";
          }
          else if(strcmp($msg,"")!=0){
            echo "<script>
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";

          }
        }
      ?>
    </div>
  </body>
</html>

