<?php
// Start the session
session_start();
?>
<?php

include 'Config/config.php';
include 'Config/config1.php';
include 'Config/connect.php';

 $tel = ($_POST["tel"]);
 $CompanyName = ($_POST["CompanyName"]);
 $TINNumber = ($_POST["TINNumber"]);
 $RegisteredOffice = ($_POST["RegisteredOffice"]);
 $ManagingDirector = ($_POST["ManagingDirector"]);
 $StartupCapital = ($_POST["StartupCapital"]);
 $nid = ($_POST["nid"]);
 $username = ($_POST["username"]);
 $password = ($_POST["password"]);
 $email = ($_POST["email"]);
 $Image = ($_FILES["Image"]["name"]);
 $Balance =$StartupCapital;
 $Type = "Agent";
 $Phone='';
 $Status="Activate";
 	
	$queri= mysqli_query($link, "SELECT * FROM  agent where PhoneNumber='$tel'"); 
while($ss = mysqli_fetch_array($link, $queri))
	{
	$Phone=$ss['PhoneNumber'];
	}

if($tel==$Phone){
echo "<script>alert('The Phone Number or UserName has Allready Used')</script>";
echo "<script>location.href='../AddAgent.php'</script>";
}
else
{

$query ="INSERT INTO 
		agent (`PhoneNumber`, `CompanyName`,`TINNumber`,`RegisteredOffice`,`ManagingDirector`, `StartupCapital`,`NID`, `EMail`,`UserName`, `Password`,`Balance`, `Type`, `ProfileImage`, `Status`) 
		VALUES ('$tel','$CompanyName','$TINNumber','$RegisteredOffice','$ManagingDirector','$StartupCapital','$nid','$email','$username', '$password', '$Balance','$Type', '$Image','$Status')";
 $row="mysql_num_rows($query)";

 mysqli_query($link, $query)or die(mysql_error($link));
 if(mysqli_affected_rows($link)>=1){
	echo "<script>alert('Account is successfully created')</script>";
	echo "<script>location.href='../Agents_List.php'</script>";

 }else{
	echo "<script>alert('Your Account is not successfully created, plz try again later')</script>";
	echo "<script>location.href='../AddAgent.php'</script>";

 } }
 ?>
  <?php
$target_dir = "../img/Profile_Uploaded/";
$target_file = $target_dir . basename($_FILES["Image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);    
?>
