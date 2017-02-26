<?php 

$db_host = "localhost";
$db_user = "root";
$db_password = "pass21";
$db_name = "martinescu_toza";

$db_connect = mysqli_connect($db_host,$db_user,$db_password,$db_name) or die();

if(mysqli_connect_error()){
	echo "Conexiune esuata la DB: ".mysqli_connect_error();
}else{
	echo "succes!";
}

?>