<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Database connection test</title>
</head>

<body>
<?php 
// credential of database 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "songsgaana";

// Check Connection 
$conn = new mysqli($servername , $username , $password , $dbname );

//Create Connection
if ($conn->connect_error){
	die("Connection failed : " . $conn -> connect_error)."<br>";
	}
echo "Connection Successfull";

//Select statement
		$qry = "select * from cat_album_rel where Category_Id='1'";
		$catResltSet= $conn -> query($qry);
        if ($catResltSet -> num_rows > 0 ){
			while ($catrow = $catResltSet -> fetch_assoc()){
				$Album_Id= $catrow['Album_Id'];		
				echo "<br>".$catrow['Album_Id'];
		$sqlqry = "select * from albums where Album_Id = '$Album_Id'";
		$albumResulSet = $conn -> query($sqlqry);
		if ($albumResulSet -> num_rows > 0){
			while ($albumRows = $albumResulSet -> fetch_assoc() ){ ?>

        <tr class="odd">
            <td><strong> <?php $albumRows['Album_Name']; ?> </strong> <br> Artist , singer , lyrist </td>
            <td><a href="album.php"> Movie/Album <?php $albumRows['Album_Name']; ?> </a></td>
        </tr>
      
         
		<?php
					}//album while loop
			}	//album if condition 	
					} // category while loop			
			} // album if condition
			




//close the connection
$conn -> close();
?>

</body>
</html>