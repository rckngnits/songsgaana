<?php 
include('includes/datalink.php');
// Creating connection object
$conn = new mysqli($servername , $username , $password , $dbname );
$catid=$_REQUEST['catid'];
$AlbumSearchString=$_REQUEST['qry'];
if($conn -> connect_error){
	die("Connection failed : " . $conn -> connect_error);
	}else{
$sql="select * from albums where Album_Name LIKE '%$AlbumSearchString%' Limit 5";
$result=$conn -> query($sql);
if ($result -> num_rows > 0){	?>
		 <table width="100%" border="1">
         <thead>
            <tr>
              <th>Song Name</th>
              <th>Song Artist </th>
              <th>Desc</th>
              <th>Add Album</th>
            </tr>
          </thead> 
	<?php while($row = $result -> fetch_assoc()){ ?>

          <tbody>
            <tr>
              <td><?php echo $row["Album_Name"]; ?></td>
              <td><?php echo $row["Album_Artist"]; ?></td>
              <td><?php echo $row["Album_Release_Year"]; ?></td>
              <td> <a href="controllers/addcatalbumrel.php?albumid=<?php echo $row['Album_Id']; ?>&amp;catid=<?php echo $catid; ?>"> Add to Category </a>  </td>
            </tr>
         </tbody>


		
		<?php }	?>
		 
          </table>
	<?php  } else { 
	  echo "<div class='col-lg-offset-3'> Please Create Album First <a href='#'> By Clicking Here</a> </div>";
	  }
	}
?>