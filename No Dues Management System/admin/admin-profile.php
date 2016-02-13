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

    <title>Home</title>

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
	  	<h3 class="navbar-text"><a href="#"><span class="glyphicon glyphicon-home" title="Home" aria-hidden="true"></span></a></h3>
	  	<h3 class="navbar-text"><a href="admin-setting.php"><span class="glyphicon glyphicon-wrench" title="Settings" aria-hidden="true"></span></a></h3>
	  	<h3 class="navbar-text"><a href="admin-student.php"><span class="glyphicon glyphicon-education" title="Student List" aria-hidden="true"></span></a></h3>
	  	<h3 class="navbar-text"><a href="admin-manager.php"><span class="glyphicon glyphicon-user" title="Manager List" aria-hidden="true"></span></a></h3>
	    <h3 class="navbar-text"><?php echo "Welcome ".$_SESSION['name'];?></h3>
	    <h3 class="navbar-text navbar-right"><a href="logout.php"><span class="glyphicon glyphicon-log-out" title="Log Out" aria-hidden="true"></span></a></h3>
	  </div>
	</nav>
	<!--Navbar Ends-->
	<br>
	<!--Nav Begins-->
	<div align="center">
		<ul class="nav nav-tabs nav-justified">
		  <li role="presentation" class="active"><a href="#">Mess Due</a></li>
		  <li role="presentation"><a href="admin-profile-hostel.php">Hostel Due</a></li>
		  <li role="presentation"><a href="admin-profile-other.php">Other Due</a></li>
		</ul>
	</div>
	<!--Nav Ends-->
	<!--Body Starts-->
	<div id="error-div" class="alert alert-danger" role="alert" style="display:none;" align="center">
          <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
          <span id="error-span"></span>
    </div>
	<div style="margin-top:5%">
		<h2 align="center">Add Mess Due</h2>
		<form class="form-horizontal" action="admin-add-mess-due.php" method="post">
			<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-4 control-label">Roll Number</label>
		    	<div class="col-sm-4">
		     		<input type="number" class="form-control" name="roll" placeholder="Roll Number" required>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-4 control-label">Amount</label>
		    	<div class="col-sm-4">
		     		<input type="number" step="any" name="amount" class="form-control" id="inputEmail3" placeholder="Amount" required>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-4 control-label">Reason</label>
		    	<div class="col-sm-4">
		     		<textarea class="form-control" name="reason" id="inputEmail3" placeholder="Reason" required></textarea>
		    	</div>
		  	</div>
		  	<div class="form-group">
		  		<div class="col-sm-4"></div>
		  		<div class="col-sm-4">
		    		<button type="submit" class="btn btn-primary" name="submit">Add Due</button>
		    	</div>
		  	</div>
		</form>

		<br><br>
		<div align="center">
			<h2>Mess Dues.</h2>
			<form class="form-inline" action="" method="get">
				<div class="form-group">
					<input type="number" class="form-control" id="exampleInputName2" name="roll" placeholder="Roll Number">
					<input type="text" class="form-control" name="manager" placeholder="Manager">
				</div>
				<input type="submit" class="btn btn-primary" value="Search">
			<form>
		</div>
		<table class="table">
			<tr>
				<th></th>
				<th></th>
				<th>Roll Number</th>
				<th>Amount</th>
				<th>Added On</th>
				<th>Added By</th>
				<th>Reason</th>
			</tr>
			<?php
				if(isset($_GET['roll'])){
					$r = mysql_real_escape_string(stripslashes($_GET['roll']));
					$m = mysql_real_escape_string(stripslashes($_GET['manager']));
					if(strcmp($r,"")==0&&strcmp($m,"")==0){
						$query1=mysql_query("select * from mess_due order by roll_number",$connection); 
					}
					else if(strcmp($r,"")!=0&&strcmp($m,"")!=0){
						$query1=mysql_query("select * from mess_due where roll_number='$r' and added_by='$m' order by added_on",$connection);	
					}
					else if(strcmp($m,"")!=0){
						$query1=mysql_query("select * from mess_due where added_by='$m' order by roll_number",$connection);
					}
					else{
						$query1 = mysql_query("select * from mess_due where roll_number='$r' order by added_on",$connection);
					}
				}
				else{
					$query1=mysql_query("select * from mess_due order by roll_number",$connection);	
				}
				while($row = mysql_fetch_assoc($query1)){
					echo '
						<tr>
							<td></td>
							<td></td>
							<td>'.$row['roll_number'].'</td>
							<td>'.$row['due_amount'].'</td>
							<td>'.$row['added_on'].'</td>
							<td>'.$row['added_by'].'</td>
							<td>'.$row['reason'].'</td>
						</tr>
					';
				}
			?>
		</table>
		<?php
			$msg="";
			if(isset($_GET['error'])){
				$msg=$_GET['error'];
				if(strcmp($msg,"roll")==0){
					$msg = "Please enter a valid roll number.";
				}
				/*else if(strcmp($msg,"hostel")==0){
					$msg = "Student belongs to different hostel.";
				}*/
				else if(strcmp($msg,"connection")==0){
					$msg = "Connection problem. Please try again later.";
				}
				else if(strcmp($msg,"none")==0){
					$msg = "Due successfuly added.";
				}
				if(strcmp($msg,"Due successfuly added.")==0){
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
	<!--Body Ends-->
	<?php //include('../footer.php');?>
  </body>
 </html>