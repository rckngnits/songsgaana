<?php session_start(); ?>
<?php
include('../includes/datalink.php');
// Creating connection object
$conn = new mysqli($servername , $username , $password , $dbname );
$songid=$_REQUEST['songid'];
echo $songid.$albumid;
if($conn -> connect_error){
	die("Connection failed : " . $conn -> connect_error);
	}else{
//$sql="DELETE FROM `cat_songs_rel` WHERE `cat_songs_rel`.`Cat_Song_Rel_Id` = 87";
//$result=$conn -> query($sql);

//header("location: ../category.php?catid=$catid");
	}
$conn -> close();
?>