<?php session_start(); //starting session ?>
<?php include('../includes/datalink.php');?>

<?php 
$Song_Id=$_REQUEST['Song_Id'];
$Song_Name=$_REQUEST['Song_Name'];
$Description=$_REQUEST['Description'];
$Album_Id=$_REQUEST['Album_Id'];
$Song_Artist=$_REQUEST['Song_Artist'];
$Link128kbps = $_REQUEST['128kbpsLink'];
$Link320kbps = $_REQUEST['320kbpsLink'];


$sql ="UPDATE songs SET Song_Name='$Song_Name' , Description='$Description' ,Song_Artist='$Song_Artist' ,Album_Id ='$Album_Id', 128kbpsLink='$Link128kbps', 320kbpsLink='$Link320kbps'  WHERE Song_Id=$Song_Id";


$result = $conn -> query($sql);
header("location: ../album.php?albumid=$Album_Id");

$conn -> close();

?>
<?php ?>