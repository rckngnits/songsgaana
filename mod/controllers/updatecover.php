<?php session_start(); //starting session ?>
<?php include('../includes/datalink.php');?>

<?php 

$Album_Id=$_REQUEST['albumid'];
$Album_Cover_Art=addslashes(file_get_contents($_FILES['Album_Cover_Art']['tmp_name']));

$sql ="UPDATE albums SET Album_Cover_Art='$Album_Cover_Art' where Album_Id='$Album_Id' ";


$result = $conn -> query($sql);
header("location: ../updatealbum.php?albumid=$Album_Id");

$conn -> close();

?>
<?php ?>