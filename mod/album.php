<?Php include('includes/head.php'); ?>
<div class="container-fluid">   
    <div class="container" id="mainContainer">
        <div class="col-md-2">
            <?Php include('includes/sidenav.php'); ?>
        </div>
    
        <article class="col-md-10">
        <?php 
		if(!isset($_REQUEST['albumid'])){
			header("location: bollywood-songs.php");
		   }
		$Album_Id=$_REQUEST['albumid'];		
		$sql="select * from albums where Album_Id = '$Album_Id'";
		$result = $conn -> query($sql);
		if ( $result -> num_rows > 0 ){
			// output data of each row 
			while ($row = $result -> fetch_assoc()){ ?>            
           <section class="row songInfoBox">
              <div class="col-lg-3"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Album_Cover_Art'] ).'"/>'; ?>  </div>
                  <div class="col-lg-6">
                      <h3> <?php echo $row["Album_Name"]. " - ".$row["Album_Release_Year"]; ?> </h3>
                      <p> <strong>Year Of Release</strong> :- <?php echo $row["Album_Release_Year"]; ?>  </p>
                      <p> <strong>Album Artist</strong> :- <?php echo $row["Album_Artist"]; ?> </p>                      
                       
                 </div>  
                                  
                 <div class="btn-group-vertical col-lg-3">
                  <button type="button" class="btn btn-primary" onClick="updateAlbum();">Update Album</button><br>

                  <button type="button" class="btn btn-primary" disabled>Delete Album</button>
                </div>    
            </section>
				
			<?php	}//while
			}//if
		else{
			echo "Album coming soon ";
			}//else
		
		?>
            
            <section class="row hidden-xs">
                <div class="col-lg-12">
 
          <?php 
		  $qry="select * from songs where Album_Id='$Album_Id'";
		  $result=$conn->query($qry);
		  $i=0;
		  if($result->num_rows > 0){ ?>
		                   <table width="100%" border="1">
          <thead class="bg-primary">
              <tr>
                <th width="20%">Single Track Update </th>
                <th width="20%">Player</th>
                <th width="30%">Download Link</th>                
                <th width="15%">Update </th>
                <th width="15%">Remove</th>
              </tr>
          </thead>
          <tbody>
		<?php  while($row = $result -> fetch_assoc()){	  
			 ?>
              
                         	
            <?Php if ($i%2 != 0) {?>
              <tr class="odd">
                <td><strong> <?Php echo $row['Song_Name']; ?> </strong>  </td>
                <td>
                		<audio controls preload="none">
                          <source src="<?php echo $row['128kbpsLink']; ?>" type="audio/mpeg">
                        	Your browser does not support the audio element.
                        </audio>
                
                </td>
                <td><a href="<?php echo $row['320kbpsLink']; ?>"> Download</a></td>
                <td><a href="updatesong.php?songid=<?php echo $row['Song_Id']; ?>"> Update Details</a></td>
                <td><button type="button" value="Delete this song" class="btn-link" disabled> Delete this song </button></td></td>
              </tr>
              <?Php } else {?>
              <tr class="even">
               <td><strong> <?Php echo $row['Song_Name']; ?> </strong> </td>
                 <td>
                		<audio controls preload="none">
                          <source src="<?php echo $row['128kbpsLink']; ?>" type="audio/mpeg">
                        	Your browser does not support the audio element.
                        </audio>
                
                </td>
                
                <td><a href="<?php echo $row['320kbpsLink']; ?>"> Download</a></td>
                <td><a href="updatesong.php?songid=<?php echo $row['Song_Id']; ?>"> Update Details</a></td>
                <td><button type="button" value="Delete this song" class="btn-link" disabled> Delete this song </button></td>
              </tr>
              <?Php }//else  
				$i++;  } //while
			  } //if
			  else {
				  echo "No song in this album ";
				  }
		  ?>
          </tbody>
        </table>
        </div>
        <div class="col-lg-2"> </div>
            </section>        
        </article>
    </div>    
</div>
<script>
function updateAlbum() {
     window.location.assign("updatealbum.php?albumid=<?php echo $Album_Id; ?>")
}
</script>


<?Php include('includes/footer.php'); ?>
