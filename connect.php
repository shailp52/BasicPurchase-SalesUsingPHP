<?php



/* Database config */

$db_host		= "localhost";
$db_user		= "root";
$db_pass		= "";
$db_database	= "erp"	;
$port           = "3307"; 

/* End config */



$link = mysqli_connect($db_host,$db_user,$db_pass, $db_database, $port) or die('Unable to establish a DB connection');

mysqli_query($link, "SET names UTF8");

?>