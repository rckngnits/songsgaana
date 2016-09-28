<?php session_start(); //starting session ?>
<?php include('../includes/datalink.php');?>

<?php 

$Album_Name=$_REQUEST['Album_Name'];
$Album_Artist=$_REQUEST['Album_Artist'];
$Album_Release_Year=$_REQUEST['Album_Release_Year'];
$Album_Cover_Art=addslashes(file_get_contents($_FILES['Album_Cover_Art']['tmp_name']));

$sql= "INSERT INTO `albums` (`Album_Id`, `Album_Name`, `Album_Artist`, `Album_Cover_Art`, `Album_Release_Year`) VALUES ('', '$Album_Name', '$Album_Artist', '$Album_Cover_Art', '$Album_Release_Year');";

$result = $conn -> query($sql);
header("location: ../addalbums.php");

$conn -> close();

?>
<?php ?>