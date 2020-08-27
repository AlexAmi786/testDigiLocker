
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
$hint = "";
$con = mysqli_connect('localhost','root','','reminder');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM setreminder WHERE date = '".$q."'";
$result = mysqli_query($con,$sql) or die(mysqli_error);

echo "<table>
<tr>
<th>Reminders:</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td><select><option>" . $row['description'] . "</option></select></td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 