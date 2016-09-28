<?php session_start(); ?>
<?php
include('../includes/datalink.php');
// Creating connection object
$conn = new mysqli($servername , $username , $password , $dbname );
$catid=$_REQUEST['catid'];
$albumid=$_REQUEST['albumid'];
if($conn -> connect_error){
	die("Connection failed : " . $conn -> connect_error);
	}else{
$sql="INSERT INTO `cat_songs_rel` ( `Category_Id`, `Album_Id`) VALUES ( '$catid', '$albumid');";
$result=$conn -> query($sql);

header("location: ../category.php?catid=$catid");
	}
$conn -> close();
?>