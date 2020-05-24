<?php
// Start the session
session_start();
?>
<?php

include '../Config/config.php';
include '../Config/config1.php';
include '../Config/connect.php';

 $ProductName = ($_POST["ProductName"]);
 $BrandName = ($_POST["BrandName"]);
 $ProductPrice = ($_POST["ProductPrice"]);
 $Quantity = ($_POST["Quantity"]);
 $Measure = ($_POST["Measure"]);
 $Description = ($_POST["Description"]);
 $TotalPrice = ($_POST["TotalPrice"]);
 $date2 = ($_POST["date2"]);
 $Status = ($_POST["Status"]);
 $ProductImage = ($_FILES["ProductImage"]["name"]);
 $IDUSer = ($_SESSION["Id"]);
 
 $status = "Available";

$query ="INSERT INTO 
		product(`product_name`, `brand`, `price`, `quantity`, `TotalPrice`, `measure`, `description`, `flaturedimage`, `status`, `date`, `IDUser`) 
		VALUES ('$ProductName', '$BrandName','$ProductPrice','$Quantity', '$TotalPrice','$Measure', '$Description', '$ProductImage','$Status','$date2','$IDUSer')";
 $row="mysqli_num_rows($query)";

 mysqli_query($link, $query)or die(mysqli_error($link));
 
 if(mysqli_affected_rows($link)>=1){
	echo "<script>alert('The product is successfully added')</script>";
	echo "<script>location.href='../AddNewProduct.php'</script>";

 }else{
	echo "<script>alert('the product is not successfully added')</script>";
	echo "<script>location.href='../AddNewProduct.php'</script>";

 } 
 ?>
  <?php
$target_dir = "../assets/img/Product_Uploaded/";
$target_file = $target_dir . basename($_FILES["ProductImage"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file);    
?>
