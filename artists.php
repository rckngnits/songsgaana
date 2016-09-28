<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
	<section class="row">
    	<?php
		$artistsql = "select * from artists";
		$artistresult = $conn -> query($artistsql);
		if ($artistresult-> num_rows > 0 ){
			while ($artistrows = $artistresult -> fetch_assoc()){ ?>
         <div class="col-md-6"> 
          <table width="100%" border="1">
            <thead>
              <tr class="bgLightGreen">
              <th colspan="2"> <?php echo $artistrows['Artist_Name']; ?> </th> 
            </tr>
            <tr>
              <th width="70%">Songs </th>
              <th width="30%">Album/Movie </th>
            </tr>
            </thead>
          <tbody>
          <?php 
		  $i=0;
		  $Artist_Id=$artistrows['Artist_Id'];
		  $songssql = "select * from artist_songs_rel where Artist_Id='$Artist_Id'";
		  $song_result = $conn -> query($songssql);
		  if($song_result -> num_rows >0 ){
			  while ($songRow = $song_result -> fetch_assoc()){ 
		  $Song_Id=$songRow['Song_Id'];
		  $sql = "select * from songs where Song_Id = $Song_Id";
		  $result = $conn -> query($sql);
		  if ($result -> num_rows >0 ){
			  while($rows = $result -> fetch_assoc()) { ?>
				
           <?Php if ($i%2 != 0) {?>
          <tr class="odd">
            <td><strong> <?Php echo $rows['Song_Name']; ?> </strong> <br> </td>
            <td><a href="album.php?albumid=<?php echo $rows['Album_Id']; ?>"> View Album </a></td>
          </tr>
          <?Php } else {?>
          <tr class="even">
            <td><strong> <?Php echo $rows['Song_Name']; ?> </strong> </td>
            <td><a href="album.php?albumid=<?php echo $rows['Album_Id']; ?>"> View Album </a></td>
          </tr>
          <?Php }//else		  
		   $i++;  
				  
			  }//while
			  } //if
		   
		   }//while
		  }//if
		   ?>
          </tbody>
          <tfoot>
          <tr>    
          	<td colspan="2"> <a href="artist.php?artistid=<?php echo "$Artist_Id"; ?>"> See More </a> </td>    
          </tr>    	  
          </tfoot>
          </table>
		</div> 
				
				
				
			<?php	}//while
			}//if
		?>
    </section>
</article>
</div>
    
<?Php include('includes/footer.php'); ?>