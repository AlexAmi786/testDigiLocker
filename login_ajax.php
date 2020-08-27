<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  
  <?php
						
				 include("connect.php");
			if(isset($_POST['login_user']))
			{
				$username = mysqli_real_escape_string($con, $_POST['username']);
				$password1 = mysqli_real_escape_string($con, $_POST['password']);
				$password = md5($password1);
				
					$result=mysqli_query($con,"select * from registration where username='$username'");
				if(mysqli_num_rows($result)==1)
				{
					$row=mysqli_fetch_assoc($result);
					if($row['active']=="1")
					{
						if($row['password']==$password)
						{
							
								//redirect to Home Page
								$_SESSION['user_login']=$row['id'];
								header("Location:index.php");
							
						}
						else
						{
							echo "<p>Password not matched for the Username</p>";
						}
						
					}	
					else
					{
					  echo "<p>Please Activate your account</p>";
					}
						
						
					
				}
				else
				{
					echo "<p>Sorry! Username Does not Exists</p>";
				}
				
			}
		?>
	
	<script>
				/*$(document).ready(function(){
				  $("input").on({
					mouseenter: function(){
					  $(this).css("background-color", "lightgray");
					},  
					mouseleave: function(){
					  $(this).css("background-color", "lightblue");
					}
				  });
				  
				 });
				 
				  $(document).ready(function(){
						
							jQuery.validator.setDefaults({
								  debug: false,
								  success: "valid"
								});
							$("#form_login").validate({
								  rules: {
									username: {
										required : true,
										alphanumeric : true 
									},
									password: {
										required : true,
									},
									messages: {
												  username: "Please enter your firstname",										  
												  password: "Please enter a password"
												},
									submitHandler: function(form) {
									form.submit();
									
									}
								  }
								});
								
						});*/
	</script>     
</head>
<body>
<div class="container">
  <div class="header">
  	<h2>Login</h2>
  </div>
	<span id="head"></span>
  <form method="post" action="" id="form_login"  enctype = "multipart/form-data" onsubmit="return do_login();" >
  	<div class="form-group">
  	  <label for="username">Username</label>
  	  <input type="text" name="username" id="username" class="form-control" data-validation="required alphanumeric" data-validation-allowing="_">
  	</div>
  	<div class="form-group">
  	  <label for="password">Password</label>
  	  <input type="password" name="password" id="password" class="form-control" data-validation="required">
	  <span id="password_error"></span>
  	</div>
  	<div class="form-group">
  	  <button type="submit" class="btn btn-primary" name="login_user" id="login_user">login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="registration_ajax.php">Sign up</a>
  	</p>
  </form>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
			<script>
				/*
				$.validate({
					lang: 'en'
				  });
				 */
						function do_login()
{
 var username=$("#username").val();
 var pass=$("#password").val();
 if(username!="" && pass!="")
 {
  $("#loading_spinner").css({"display":"block"});
  $.ajax
  ({
  type:'post',
  url:'do_login.php',
  data:{
   do_login:"do_login",
   email:email,
   password:pass
  },
  success:function(response) {
  if(response=="success")
  {
    window.location.href="index.php";
  }
  else
  {
    $("#loading_spinner").css({"display":"none"});
    alert("Wrong Details");
  }
  }
  });
 }

 else
 {
  alert("Please Fill All The Details");
 }
return false;
}

			</script>
</body>
</html>