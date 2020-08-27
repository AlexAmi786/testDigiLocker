<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','miriinfo');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM user_details WHERE user_id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>User Id</th>
<th>Username</th>
<th>Name</th>
<th>Gender</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['user_id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['first_name'] ." ". $row['last_name'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 