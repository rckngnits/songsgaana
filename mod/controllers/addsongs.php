<?php session_start(); //starting session ?>
<?php include('../includes/datalink.php');?>

<?php 

$Song_Name=$_REQUEST['Song_Name'];
$Description=$_REQUEST['Description'];
$Album_Id=$_REQUEST['Album_Id'];
$Song_Artist=$_REQUEST['Song_Artist'];
$Link128kbps = $_REQUEST['128kbpsLink'];
$Link320kbps = $_REQUEST['320kbpsLink'];

$sql = "INSERT INTO `songs` (`Song_Id`, `Song_Name`, `Description`, `Song_Artist`, `Album_Id`, `128kbpsLink`, `320kbpsLink`) VALUES ('', '$Song_Name', '$Description', '$Song_Artist', '$Album_Id','$Link128kbps','$Link320kbps');";

$result = $conn -> query($sql);
header("location: ../addsongs.php");

$conn -> close();

?>
<?php ?>