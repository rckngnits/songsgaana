<?php session_start(); //starting session ?>
<?php include('../includes/datalink.php');?>

<?php 

$Artist_Name=$_REQUEST['Artist_Name'];
$Artist_Bio=$_REQUEST['Artist_Bio'];
$Artist_Image=addslashes(file_get_contents($_FILES['Artist_Image']['tmp_name']));
$Wikipedia=$_REQUEST['Wikipedia'];
$Website=$_REQUEST['Website'];

$sql= "INSERT INTO `artists` ( `Artist_Name`, `Artist_Image`, `Wikipedia`, `Website`, `Artist_Bio`) VALUES ('$Artist_Name', '$Artist_Image', '$Wikipedia', '$Website', '$Artist_Bio');";

$result = $conn -> query($sql);
header("location: ../addartists.php");

$conn -> close();

?>
<?php ?>