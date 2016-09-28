<?php session_start(); //starting session ?>
<?php include('../includes/datalink.php');?>

<?php 
$Album_Id=$_REQUEST['albumid'];
$Album_Name=$_REQUEST['Album_Name'];
$Album_Artist=$_REQUEST['Album_Artist'];
$Album_Release_Year=$_REQUEST['Album_Release_Year'];

$sql = "UPDATE albums SET Album_Name='$Album_Name' , Album_Artist='$Album_Artist' , Album_Release_Year='$Album_Release_Year' Where Album_Id='$Album_Id'";


$result = $conn -> query($sql);
header("location: ../album.php?albumid=$Album_Id");

$conn -> close();

?>
<?php ?>