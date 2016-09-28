<?php session_start(); ?>
<?php
include('../includes/datalink.php');
// Creating connection object
$conn = new mysqli($servername , $username , $password , $dbname );
$songid=$_REQUEST['songid'];
$Album_Id=$_REQUEST['albumid'];
if($conn -> connect_error){
	die("Connection failed : " . $conn -> connect_error);
	}else{
$sql="DELETE FROM `songs` WHERE `Song_Id` = '$songid'";
$result=$conn -> query($sql);

$sql="DELETE FROM `artist_songs_rel` WHERE `Song_Id` = '$songid'";
$result=$conn -> query($sql);

$sql="DELETE FROM `cat_songs_rel` WHERE `Song_Id` = '$songid'";
$result=$conn -> query($sql);

header("location: ../album.php?albumid=$Album_Id");
	}
$conn -> close();
?>