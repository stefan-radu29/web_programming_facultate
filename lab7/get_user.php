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
include_once('config.php');
$q = $_GET['q'];

$sql="SELECT * FROM users WHERE role = '$q'";
$result = mysqli_query($db,$sql);

echo "<table>
<tr>
<th>name</th>
<th>username</th>
<th>age</th>
<th>role</th>
<th>email</th>
<th>website</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['webpage'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($db);
?>
</body>
</html>