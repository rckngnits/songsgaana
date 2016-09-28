<?php session_start(); //starting session ?>
<?php include('../includes/datalink.php');?>

<?php 

$categrory_Name=$_REQUEST['Category_Name'];
$description=$_REQUEST['Description'];
$subcategory=$_REQUEST['Subcategory'];

$sql= "INSERT INTO `categories` ( `Category_Name`, `Category_Desc`, `Subcategory`) VALUES ('$categrory_Name', '$description', '$subcategory');";

$result = $conn -> query($sql);
header("location: ../addcategories.php");

$conn -> close();

?>
<?php ?>