<?php
	include('db_connection.php');
	if(session_id()==""){
		session_start();
	}
	if(!isset($_SESSION['login_as'])){
		header('location:index.php');
	}
	$due = 0;
	$query = mysql_query("select * from mess_due where roll_number='".$_SESSION['roll']."'",$connection);
	if(mysql_num_rows($query)==1){
		$row = mysql_fetch_assoc($query);
		$due = 1;
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

    <title><?php echo $_SESSION['name'];?></title>

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

  <body>
  	<!--Navbar Begins-->
  	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
	  	<h3 class="navbar-text"><a href="#"><span class="glyphicon glyphicon-home" title="Home" aria-hidden="true"></span></a></h3>
	  	<h3 class="navbar-text"><a href="setting.php"><span class="glyphicon glyphicon-wrench" title="Settings" aria-hidden="true"></span></a></h3>
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
		  <li role="presentation"><a href="student-profile-hostel.php">Hostel Due</a></li>
		  <li role="presentation"><a href="student-profile-other.php">Other Due</a></li>
		</ul>
	</div>
	<div align="center" style="background-color:;">
		<div class="jumbotron" style="background-color:;">
			<div align="center" class="form-horizontal">
				<div class="form-group">
			    	<h2 class="col-sm-5" align="right">Roll Number : </h2>
			      	<h2 class="col-sm-2" align="left"><?php echo $_SESSION['roll'];?></h2>
			    	
			  	</div>
				<div class="form-group">
			    	<h2 class="col-sm-5" align="right">Due Amount : </h2>
			    	<?php
			    		if($due==1){
			    			echo '<h2 class="col-sm-2" align="left">Rs. '.$row['due_amount'].'</h2>';		
			    		}
			    		else{
			    			echo '<h2 class="col-sm-2" align="left">Rs. 0</h2>';
			    		}
			    	?>
			      	
			  	</div>
				<div class="form-group">
			    	<h2 class="col-sm-5" align="right">Added On : </h2>
		      		<?php
			    		if($due==1){
			    			echo '<h2 class="col-sm-2" align="left">'.$row['added_on'].'</h2>';		
			    		}
			    		else{
			    			echo '<h2 class="col-sm-2" align="left">NA</h2>';
			    		}
			    	?>
			  	</div>
				<div class="form-group">
			    	<h2 class="col-sm-5" align="right">Added By : </h2>
					<?php
			    		if($due==1){
			    			echo '<h2 class="col-sm-2" align="left">'.$row['added_by'].'</h2>';		
			    		}
			    		else{
			    			echo '<h2 class="col-sm-2" align="left">NA</h2>';
			    		}
			    	?>
			    </div>
				<div class="form-group">
			    	<h2 class="col-sm-5" align="right">Reason : </h2>
			      	<?php
			    		if($due==1){
			    			echo '<h2 class="col-sm-4" align="left">'.$row['reason'].'</h2>';		
			    		}
			    		else{
			    			echo '<h2 class="col-sm-4" align="left">NA</h2>';
			    		}
			    	?>
			  	</div>
			</div>
		</div>
	</div>
	<!--Nav Ends-->

	<?php //include('footer.php');?>
  </body>
 </html>