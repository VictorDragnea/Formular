<html>
<head>
	<style>
		

		table th {
			border: 2px solid black;
		}

		td {
			border: 1px solid black;
		}
	</style>
</head>
<body>	

<?php 
include("db_connect.php");


$query = "SELECT * FROM contact_db";

$result =  mysqli_query($db_connect,$query) or die("Selectia din tabel a esuat");
 echo "<table><tr><th>ID</th><th>Nume</th><th>Mesaj</th>";
 	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Nume'] . "</td><td>" . $row['Mesaj'] . "</td></tr>";  //$row['index'] the index here is a field name
}
 echo "</table>";
?>

</body>
</html>