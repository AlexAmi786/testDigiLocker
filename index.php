<?php 
  session_start(); 
  
  if (!isset($_SESSION['user_login'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['user_login']);
  	header("location: login.php");
  }
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body>
<div class="container">
<div class="header">
	<h2>Home Page</h2>
</div>
<div class="form-group"> 
  	
	
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['user_login'])) : ?>
    	<p>Welcome</p>
    	<p> <a href="index.php?logout='1'">Logout</a> </p>
   <?php endif ?>
   	
	
</div>
	</div>	
</body>
</html>