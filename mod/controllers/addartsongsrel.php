<?php session_start(); ?>
<?php
include('../includes/datalink.php');
// Creating connection object
$conn = new mysqli($servername , $username , $password , $dbname );
$artid=$_REQUEST['artid'];
$songid=$_REQUEST['songid'];
if($conn -> connect_error){
	die("Connection failed : " . $conn -> connect_error);
	}else{
$sql="INSERT INTO `artist_songs_rel` ( `Artist_Id`, `Song_Id`) VALUES ( '$artid', '$songid');";
$result=$conn -> query($sql);

header("location: ../artist.php?artistid=$artid");
	}
$conn -> close();
?>