<?php 
// $server ='';
// $username = '';
// $password = '';
// $dbname = '';

// Check Connection 
$conn = new mysqli($servername , $username , $password , $dbname );

//Create Connection
if ($conn->connect_error){
	die("Connection failed : " . $conn -> connect_error);
	}
?>