<?php session_start(); ?>
<?php
include('../includes/datalink.php');
// Creating connection object
$conn = new mysqli($servername , $username , $password , $dbname );
$songid=$_REQUEST['songid'];
$Artist_Id=$_REQUEST['artistid'];
if($conn -> connect_error){
	die("Connection failed : " . $conn -> connect_error);
	}else{

$sql="DELETE FROM `artist_songs_rel` WHERE `Song_Id` = '$songid'";
$result=$conn -> query($sql);


header("location: ../artist.php?artistid=$Artist_Id");
	}
$conn -> close();
?>