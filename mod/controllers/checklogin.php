<?php session_start(); ?>
<?php
include ('../includes/datalink.php');
$error = ''; //variable to store variables

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
echo $error;
} else {
$uname=$_POST['username'];
$pass= $_POST['password'];

// To protect mysql injections for security Purposes
$uname = stripslashes($uname);
$pass = stripslashes($pass);
$uname = $conn -> real_escape_string($uname);
$pass = $conn -> real_escape_string($pass);

// sql query to find authentic user 
$sql = "select * from users where password='$pass' AND username='$uname'";
$rsSet= $conn-> query($sql);
$rowcount= $rsSet -> num_rows;
	if ($rowcount == 1) {
		$_SESSION['User_Id']=$uname; // Initializing Session
		header("location: ../"); // Redirecting To Other Page
	} else {
		$error = "Username or Password is invalid";
		echo  $error;
		}
$conn -> close(); } }
?>
<?php
//echo $dbname;

//$uname=$_REQUEST['username'];
//echo $uname;

//$_SESSION["User_Id"]="cat";
//header("location: ../");

?>