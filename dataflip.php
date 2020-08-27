<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>

<h2>Profile</h2>

<div class="row">
  <div class="column" style="background-color:#aaa;">
	<div style="padding:20px">
		<form class="form">
			<input id="name" type="text" onInput="showdata(this)" class="form-control" placeholder="Name">
			<input id="mobile" type="text" onInput="showdata(this)" class="form-control" placeholder="Mobile Number">
		</form>
	</div>
  </div>
  <div class="column" style="background-color:#bbb;">
    <span id="nameshow">Your name is </span><br>
    <span id="mobileshow">Your contact number is </span>
  </div>
</div>
<script language="javascript">

function showdata(x) {
    var name = document.getElementById("name");
    var mobile = document.getElementById("mobile");
    var n = name.value;
    var m = mobile.value;

    var nameshow = document.getElementById("nameshow");
    nameshow.innerText = "Your name is " + n +".";
	var mobileshow = document.getElementById("mobileshow");
    mobileshow.innerText = "Your contact number is " + m +".";
}
</script>
</body>
</html>