<?Php
/////// Update your database login details here /////
$dbhost_name = "localhost"; // Your host name 
$database = "erp";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 
//////// End of database details of your server //////

//////// Do not Edit below /////////
try {
$dbo = new PDO("mysql:host=localhost;port=3307;dbname=erp", $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?> 