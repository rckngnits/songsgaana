<?Php include('includes/head.php'); ?>
    <div class="container" id="mainContainer">
        <div class="col-md-2">
            <?Php include('includes/sidenav.php'); ?>
        </div>
    
        <article class="col-md-10">
        <?php 
		$k=0; $l=0;
		$Category_Id=$_REQUEST['catid'];
		$sql = "select * from categories where Category_Id = '$Category_Id'";	
		$result = $conn -> query($sql);
		if ($result -> num_rows >0 ){
			while ($rows = $result -> fetch_assoc()){
				// display rows one by one 
				$sub_category = $rows['Subcategory'];
				?>
			<section class="row col-md-12"> <h3> <?php echo $rows['Category_Name']; ?> </h3> </section>	
            

            
        
        <?php    
	   if ($sub_category == 1){?>

	  <?php 
	  $sql = "Select * from cat_songs_rel where Category_Id = $Category_Id ";
	  $result = $conn -> query($sql);
	  if ($result -> num_rows >0 ){?>
      <section class="row">
        <div class="col-lg-6">
        <table width="100%" border="1">
            <thead class="bg-primary">
            <tr>
            <th width="70%"> Name of the Movie </th>
            <th width="30%">Download</th>
            </tr>
            </thead>
        <tbody>
	  <?php  
	  $row_cnt=$result -> num_rows ;
	  $halfrow = floor($row_cnt/2);
	  while($rows = $result -> fetch_assoc()){
	  $Album_Id=$rows['Album_Id'];
	  $album_sql = "select * from albums where Album_Id='$Album_Id' ";
	  $album_result = $conn -> query($album_sql);	  
	  if($album_result->num_rows>0){
		  while($album_rows = $album_result -> fetch_assoc()){
	  if ($k%2 != 0){ ?>
       <tr class="even">
        <td><?php echo $album_rows['Album_Name']; ?></td>
        <td><a href="album.php?albumid=<?php echo $album_rows['Album_Id']; ?>"> View Album</a></td>
      </tr> 
     		<?php } else { ?>
       <tr class="odd">
        <td><?php echo $album_rows['Album_Name']; ?></td>
        <td><a href="album.php?albumid=<?php echo $album_rows['Album_Id']; ?>"> View Album</a></td>
      </tr> 
       
		<?php	}//else
		
		if($k == $halfrow-1){?>
			
            </tbody>
            </table>
            </div>
            <div class="col-lg-6">
            <table width="100%" border="1">
            <thead class="bg-primary">
            <tr>
            <th width="70%"> Name of the Movie </th>
            <th width="30%">Download</th>
            </tr>
            </thead>
        	<tbody> 
		<?php	}
		
		
		
		
		  $k++; }//while
		 }//if
	 
			  }//while
		  }//if
	
	  }//if
	  else if ($sub_category == 2){?>

	  <?php 
	  $sql = "Select * from cat_songs_rel where Category_Id = $Category_Id";
	  $result = $conn -> query($sql);
	  if ($result -> num_rows >0 ){	
	  	    
	  $row_cnt=$result -> num_rows ;
	  $halfrow = floor($row_cnt/2);
		  while($rows = $result -> fetch_assoc()){
			  $Song_Id=$rows['Song_Id'];
	  $album_sql = "select * from songs where Song_Id='$Song_Id'";
	  $album_result = $conn -> query($album_sql);
	  if($album_result->num_rows>0){	
	  
		  while($album_rows = $album_result -> fetch_assoc()){ 
		  
		  if($l%2!=0){  
		  ?>
       <tr class="even">
        <td><?php echo $album_rows['Song_Name']; ?></td>
        <td><a href="album.php?albumid=<?php echo $album_rows['Album_Id']; ?>"> View / Edit</a></td>
      </tr> 
      <?php } else { ?>
        <tr class="odd">
        <td><?php echo $album_rows['Song_Name']; ?></td>
        <td><a href="album.php?albumid=<?php echo $album_rows['Album_Id']; ?>"> View / Edit</a></td>
      </tr>
		<?php	 }//else
		if($l == $halfrow-1){?>
			
            </tbody>
            </table>
            </div>
            <div class="col-lg-6">
            <table width="100%" border="1">
            <thead class="bg-primary">
            <tr>
            <th width="70%"> Name of the Movie </th>
            <th width="30%">Download</th>
            </tr>
            </thead>
        	<tbody> 
		
		
		
		
		<?php }
		
		
		
				 $l++; }//while
		 }//if
	 
			  }//while
		  }//if
	
	  }//else if

				}//while	
			}//if
		?>



</tbody></table></div></section>
        </article>
    </div>    
<?Php include('includes/footer.php'); ?>
