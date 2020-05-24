

<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "erp", "3307") or die(mysql_error($conn));
?>

<?Php

//session_start();
$dbhost_name = "localhost";
$database = "erp";// database name
$username = "root"; // user name
$password = ""; // password 

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;port=3307;dbname=erp', $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

?>

