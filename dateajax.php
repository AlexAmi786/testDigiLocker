<!DOCTYPE html>
<html>
<head>
<script>
function showHint(str) {
	if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
				alert("Hello");
            }
        };
        xmlhttp.open("GET", "dateajax2.php?q=" + str, true);
		alert("Hy");
        xmlhttp.send();
    }
}
</script>
</head>
<body>
<?php
							include("connect.php");
							/*$id=$_GET['data_id'];
							$result=mysqli_query($con,"select * from setreminder where id=$id and status=1");
							$row = mysqli_fetch_assoc($result);*/
						?>
<form method="POST" action="" onsubmit="return validate()">
			<table align="">
				
				<tr>
					<td>Select Date:</td>
					<td>
						<input type="date" name="date" id="date" required onchange="showHint(this.value)">
					</td>
				</tr>
				
				<tr>
					<td><td><a href="home.php">Back</a></td></td>
					<td><button type="submit" name="confirm" id="confirm">Confirm</button></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><a href="logout.php">Logout</a></td>
					
				</tr>
			</table>
			
</form>
</body>
</html> 