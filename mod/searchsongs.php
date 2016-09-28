<?php 
include('includes/datalink.php');
// Creating connection object
$conn = new mysqli($servername , $username , $password , $dbname );
$SongSearchString=$_REQUEST['qry'];
if($conn -> connect_error){
	die("Connection failed : " . $conn -> connect_error);
	}else{
$sql="select * from songs where Song_Name LIKE '%$SongSearchString%' Limit 5";
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
              <td><?php echo $row["Song_Name"]; ?></td>
              <td><?php echo $row["Song_Artist"]; ?></td>
              <td><?php echo $row["Description"]; ?></td>
              <td> 
              <?php if(isset($_REQUEST['artid'])) {
	$artid=$_REQUEST['artid']; // Redirecting To Other Page
	?> 
			<a href="controllers/addartsongsrel.php?songid=<?php echo $row['Song_Id']; ?>&amp;artid=<?php echo $artid; ?>"> Add to 		Category </a> 
	<?php } else if(isset($_REQUEST['catid'])) {
	$catid=$_REQUEST['catid']; // Redirecting To Other Page ?>
	<a href="controllers/addcatsongsrel.php?songid=<?php echo $row['Song_Id']; ?>&amp;catid=<?php echo $catid; ?>"> Add to 		Category </a> 
<?php }  ?>
              
              </td>
            </tr>
         </tbody>


		
		<?php }	?>
		 
          </table>
	<?php  } else { 
	  echo "<div class='col-lg-offset-3'> Please Create Album First <a href='#'> By Clicking Here</a> </div>";
	  }
	}
?>