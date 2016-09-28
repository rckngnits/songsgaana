<?php session_start(); //starting session ?>
<?php include('../includes/datalink.php'); ?>

<?php 
// collecting values from previous page feedbacl.php 
$Name=$_REQUEST['Name'];
$Email=$_REQUEST['Email'];
$Reason=$_REQUEST['Reason'];
$Message=$_REQUEST['Message'];


//Prepare query to insert values to database
$sql= "INSERT INTO `feedback` (`Name`, `Email`, `Reason`, `Message`) VALUES ('$Name', '$Email', '$Reason', '$Message');";

//Execute query
$result = $conn -> query($sql);

echo "Thank you for your message , we will respond to your message as soon as possible <br>";
echo "<a href='../'> Click here to go to Homepage </a>"; 

$conn -> close();

?>
<?php ?>