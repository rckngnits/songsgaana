<?Php include('includes/head.php'); ?>
    <div class="container" id="mainContainer">
        <div class="col-md-2">
            <?Php include('includes/sidenav.php'); ?>
        </div>
    
        <article class="col-md-10">
        <?php 
		if(!isset($_REQUEST['albumid'])){
			header("location: error.php");
		   }
		$Album_Id=$_REQUEST['albumid'];
		
		$sql="select * from albums where Album_Id = '$Album_Id'";
		$result = $conn -> query($sql);
		if ( $result -> num_rows > 0 ){
			// output data of each row 
			while ($row = $result -> fetch_assoc()){ ?>
            
                       <section class="row songInfoBox">
              <div class="col-lg-3"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Album_Cover_Art'] ).'"/>'; ?>  </div>
                  <div class="col-lg-9">
                      <h3> <?php echo $row["Album_Name"]. " - ".$row["Album_Release_Year"]; ?> </h3>
                      <p> <strong>Year Of Release</strong> :- <?php echo $row["Album_Release_Year"]; ?>  </p>
                      <p> <strong>Album Artist</strong> :- <?php echo $row["Album_Artist"]; ?> </p>   
                 </div>       
            </section>
				
            <section class="row hidden-xs">
                <div class="col-lg-10">
                  <table width="100%" border="1">
          <thead class="bg-primary">
              <tr>
                <th width="40%"><?php echo $row['Album_Name']; ?> Mp3 Songs </th>
                <th width="30%">Listen Song Online</th>
                <th width="30%">Download MP3 Song</th>
              </tr>
          </thead>
          <tbody>
          <?php 
		  $qry="select * from songs where Album_Id='$Album_Id'";
		  $result=$conn->query($qry);
		  $i=0;
		  if($result->num_rows > 0){
			  while($row = $result -> fetch_assoc()){ ?>
              
                         	
            <?Php if ($i%2 != 0) {?>
              <tr class="odd">
                <td><strong> <?Php echo $row['Song_Name']; ?> </strong> <br> <?Php echo $row['Song_Artist']; ?> </td>
                
                <td>
                		<audio controls preload="none">
                          <source src="<?php echo $row['128kbpsLink']; ?>" type="audio/mpeg">
                        	Your browser does not support the audio element.
                        </audio>
                
                </td>
                <td><a href="<?php echo $row['320kbpsLink']; ?>"> Download </a></td>
              </tr>
              <?Php } else {?>
              <tr class="even">
               <td><strong> <?Php echo $row['Song_Name']; ?> </strong> <br> <?Php echo $row['Song_Artist']; ?> </td>
                <td>
                		<audio controls preload="none">
                          <source src="<?php echo $row['128kbpsLink']; ?>" type="audio/mpeg">
                        	Your browser does not support the audio element.
                        </audio>
                
                </td>
                <td><a href="<?php echo $row['320kbpsLink']; ?>"> Download </a></td>
              </tr>
              <?Php } ?>
              
              
              
				  
				  
				  
			<?php	 $i++;
				  }
			  }
		  
		  ?>
          
    			<?php	}
			}
		else{
			header("location:error.php");
			}
		
		
		
		
		
		?>
       
          
          
          
          
          
          
 
          </tbody>
        </table>
        </div>
        <div class="col-lg-2"> </div>
            </section>
        
            <section class="row visible-xs">
                <div class="col-lg-12">
                  <table width="100%" border="1">
          <thead class="bg-primary">
              <tr>
                <th width="40%">Single Track Update </th>
                <th width="30%">Download</th>
              </tr>
          </thead>
          <tbody>
<?php 
		  $qry="select * from songs where Album_Id='$Album_Id'";
		  $result=$conn->query($qry);
		  $i=0;
		  if($result->num_rows > 0){
			  while($row = $result -> fetch_assoc()){ ?>
              
                         	
            <?Php if ($i%2 != 0) {?>
              <tr class="odd">
                <td><strong> <?Php echo $row['Song_Name']; ?> </strong> <br> <?Php echo $row['Song_Artist']; ?> </td>              
                <td><a href="<?php echo $row['320kbpsLink']; ?>"> Download </a></td>
              </tr>
              <?Php } else {?>
              <tr class="even">
               <td><strong> <?Php echo $row['Song_Name']; ?> </strong> <br> <?Php echo $row['Song_Artist']; ?> </td>
                <td><a href="<?php echo $row['320kbpsLink']; ?>"> Download </a></td>
              </tr>
              <?Php } ?>
              
              
              
				  
				  
				  
			<?php	 $i++;
				  }
			  }
		  
		  ?>

          </tbody>
        </table>
        </div> 
            </section>
        </article>
    </div>    
<?Php include('includes/footer.php'); ?>
