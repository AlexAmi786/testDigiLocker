<?php
// Handle AJAX request (start)
if( isset($_POST['ajax']) && isset($_POST['name']) || isset($_POST['mobile'] ) ){
	echo $_POST['name'];
	echo $_POST['mobile'];
	exit;
	}
// Handle AJAX request (end)
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 500px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
 
 <body >
 <h2>Profile</h2>
<div class="row">
  <div class="column" style="background-color:#aaa;">
	<div style="padding:20px">
  <form method='post' action="">

   <input type='text' name='name' placeholder='Enter your name' id='name' class="form-control" required><br>
   <input type='text' name='mobile' placeholder='Enter your contact number' id='mobile' class="form-control" required>
   
   </form>
  </div>
  </div>
  <div class="column" style="background-color:#bbb;">
   <div id='response'>Name: </br> Mobile Number:</div>
   <div>

  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <script>
  $(document).ready(function(){
    $('input').keyup(function(){
     var name = $('#name').val();
     var mobile = $('#mobile').val();
     $.ajax({
      type: 'post',
	  url: 'ajaxshow.php',
      data: {ajax:1,name: name,mobile:mobile},
      success: function(response){
		
			var obj = $('#response').text("Name: "+ name + " \nMobile Number: "+ mobile);
			obj.html(obj.html().replace(/\n/g,'<br/>'));
      }
     });
    });
  });
  </script>
 </body>
</html>