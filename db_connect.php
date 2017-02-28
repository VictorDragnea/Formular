<?php 

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "martinescu_toza";

$db_connect = mysqli_connect($db_host,$db_user,$db_password,$db_name) or die("Nu s-a conectat la db: ".mysql_error());

$query_create_table = "CREATE TABLE IF NOT EXISTS `contact_db` (
 `ID` smallint(6) NOT NULL AUTO_INCREMENT,
 `Nume` varchar(50) NOT NULL,
 `Email` varchar(50) NOT NULL,
 `Mesaj` text NOT NULL,
 `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 UNIQUE KEY `ID` (`ID`)
 )";



if(!$db_connect){
	echo "Conexiune esuata la DB: ".mysqli_connect_error();
}else{

	$bla =  mysqli_query($db_connect,$query_create_table) or die("Crearea de tabel a esuat");
}

?>

