<?php session_start(); ?>
<?php
include('../includes/datalink.php');
// Creating connection object
$conn = new mysqli($servername , $username , $password , $dbname );
$catsongrelid=$_REQUEST['catsongrelid'];
$Arist_Id=$_REQUEST['artistid'];
if($conn -> connect_error){
	die("Connection failed : " . $conn -> connect_error);
	}else{


$sql="DELETE FROM `cat_songs_rel` WHERE `Cat_Song_Rel_Id` = '$catsongrelid'";
$result=$conn -> query($sql);

//header("location: ../artist.php?artistid=$Artist_Id");
	}
$conn -> close();
?>