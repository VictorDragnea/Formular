<?php 
include("db_connect.php");


$query = "SELECT * FROM contact_db";

$result =  mysqli_query($db_connect,$query) or die("Selectia din tabel a esuat");
var_dump ($result);
?>