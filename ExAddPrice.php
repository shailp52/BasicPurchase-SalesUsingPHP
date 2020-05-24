<?php
// Start the session
session_start();
?>
<?php

include '../Config/config.php';
include '../Config/config1.php';
include '../Config/connect.php';

 $Product = ($_POST["Product"]);
 $Price = ($_POST["Price"]);

$queri= mysqli_query($link,"SELECT * FROM Price WHERE IDProduct='$Product'"); 
while($ss = mysqli_fetch_array($queri))
	{
	$IDProduct=$ss['IDProduct'];
	}

if($IDProduct==$Product){

$querii= $dbo->query("UPDATE Price SET Price='$Price' WHERE IDProduct='$IDProduct'");

echo "<script>alert('The Price is successfully Updated')</script>";
echo "<script>location.href='../Settings.php'</script>";
}

else
{
$query ="INSERT INTO 
		Price (`IDProduct`, `Price`) 
		VALUES ('$Product', '$Price')";
 $row="mysqli_num_rows($query)";

 mysqli_query($link, $query)or die(mysqli_error($link));
 
 if(mysqli_affected_rows($link)>=1){
	echo "<script>alert('The Price is successfully Added')</script>";
	echo "<script>location.href='../Settings.php'</script>";

 }else{
	echo "<script>alert('the Price is not successfully Added')</script>";
	echo "<script>location.href='../Settings.php'</script>";

 } }
