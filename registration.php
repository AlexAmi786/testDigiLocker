<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  
  <?php
			if(isset($_POST['reg_user']))
			{
				$username=$_POST['username'];
				$email=$_POST['email'];
				$password=$_POST['password_1'];
				$contact=$_POST['contact'];
				$active=1;
						
				 include("connect.php");
				
				// first check the database to make sure 
			  // a user does not already exist with the same username and/or email
			  $user_check_query = "SELECT * FROM registration WHERE username='$username' OR email='$email' LIMIT 1";
			  $result = mysqli_query($con, $user_check_query);
			  $user = mysqli_fetch_assoc($result);
			  
			  if ($user) { // if user exists
							if ($user['username'] === $username) {
														echo "Username already exists";
													}

							if ($user['email'] === $email) {
														echo "email already exists";
													}
						}
				else{			
					$password = md5($password);
					mysqli_query($con,"insert into registration(username,email,password,contact,active) 
						values('$username','$email','$password','$contact','$active')");
					if(mysqli_affected_rows($con)==1)
					{
						$id=mysqli_insert_id($con);
						echo "Registration successfully";
						header('location:login.php');
					}
					else
					{
						echo "Registration Fail";
					}
				}
			}
		?>
</head>
<body>
<div class="container">
  <div class="header">
  	<h2>Register</h2>
  </div>
  <form method="post" action="" id="form_reg"  enctype = "multipart/form-data">
  	<div class="form-group">
  	  <label for="username">Username</label>
  	  <input type="text" name="username" id="username"  class="form-control" data-validation="required alphanumeric" data-validation-allowing="_">
  	</div>
  	<div class="form-group">
  	  <label for="email">Email</label>
  	  <input type="email" name="email" id="email"  class="form-control" data-validation="required email">
  	</div>
  	<div class="form-group">
  	  <label for="password_1">Password</label>
  	  <input type="password" name="password_1" id="password_1"  class="form-control" data-validation="required length strength" data-validation-length="min6" data-validation-strength="2" 
>
  	</div>
  	<div class="form-group">
  	  <label for="password_2" >Confirm password</label>
  	  <input type="password" name="password_2" id="password_2"  class="form-control" data-validation="required confirmation" data-validation-confirm="password_1">
  	</div>
	<div class="form-group">
  	  <label for="password_2" >Contact Number</label>
  	  <input type="text" name="contact" id="contact"  class="form-control" data-validation="required length number" data-validation-length="10-10">
  	</div>
  	<div class="form-group">
  	  <button type="submit" class="btn btn-primary" name="reg_user" id="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
			<script>
$.validate({
    lang: 'en',
	modules : 'security',
  onModulesLoaded : function() {
    var optionalConfig = {
      fontSize: '8pt',
      padding: '4px',
      bad : 'Very bad',
      weak : 'Weak',
      good : 'Good',
      strong : 'Strong'
    };
    $('input[name="password_1"]').displayPasswordStrength(optionalConfig);
  }
  });
			</script>
</body>
</html>