<?php include('includes/datalink.php'); ?>
<?php 

// Picks page title for Albums
if (isset($_REQUEST['albumid'])){
	$albumId = $_REQUEST['albumid'];
	$sql = "select * from albums where Album_Id=$albumId";
	$result = $conn -> query($sql);
	while($row = $result -> fetch_assoc()){
		$pageTitle = $row['Album_Name']." MP3 Songs";
		} //while
	} //if

// Picks page title for Categories	
else if (isset($_REQUEST['catid'])){
	$catId = $_REQUEST['catid'];
	$sql = "select * from categories where Category_Id=$catId";
	$result = $conn -> query($sql);
	while($row = $result -> fetch_assoc()){
		$pageTitle = $row['Category_Name'];
		} //while
	} //else if

// Picks page title for Artists	
else if (isset($_REQUEST['artistid'])){
	$artistId = $_REQUEST['artistid'];
	$sql = "select * from artists where Artist_Id=$artistId";
	$result = $conn -> query($sql);
	while($row = $result -> fetch_assoc()){
		$pageTitle = $row['Artist_Name']." MP3 Songs";
		} //while 
	} //else if		
	
else{
	$pageTitle = "Download MP3 songs ";
	} // else
?>