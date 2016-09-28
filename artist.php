<?Php include('includes/head.php'); ?>
    <div class="container" id="mainContainer">
        <div class="col-md-2">
            <?Php include('includes/sidenav.php'); ?>
        </div>
    
        <article class="col-md-10">
            <?php 
	$Artist_Id=$_REQUEST['artistid'];
	$sql="select * from artists where Artist_Id=$Artist_Id";
	$result= $conn -> query($sql);
	if($result -> num_rows > 0){
		while ($row = $result -> fetch_assoc()){
			
			?>
            <section class="row songInfoBox">
                  <div class="col-lg-9">
                      <h3> <?Php echo $row['Artist_Name']; ?> </h3>
                      <p> <strong>Bio :- </strong> :- <?Php echo $row['Artist_Bio']; ?> </p>
                      <p> <strong> Website :- </strong> :- <?Php echo $row['Website']; ?> </p>
                      <p><strong> Wikipedia :- </strong>:- <?Php echo $row['Wikipedia']; ?> </p>  
                 </div>   
                 <div class="col-lg-3"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Artist_Image'] ).'"/>'; ?>  </div>
            </section>
            
            <?php }
				}
				?>
    <section class="row hidden-xs">
    <table width="100%" border="1">
    <thead>
    <tr>
    <?php 
	$sql="select * from artists where Artist_Id=$Artist_Id";
	$result= $conn -> query($sql);
	if($result -> num_rows > 0){
		while ($row = $result -> fetch_assoc()){
			
			?>
			<th colspan="5" class="bg-primary"> <h4><?Php echo $row['Artist_Name']; ?> </h4> </th>
    </tr>
    	
        <tr class="bgLightGreen">
            <th width="10%"> Sl. No.</th>
            <th width="25%"> Song Name </th>
            <th width="25%"> Listen Online </th>
            <th width="15%"> Download Song </th>
            <th width="25%"> Album For This Song </th>
        </tr>
	</thead>
	<tbody>
    <?php 
		$sql= "select * from artist_songs_rel where Artist_Id = '$Artist_Id'";
		$i=0; 
		$result = $conn -> query($sql);
		if($result -> num_rows > 0){
			while($row = $result -> fetch_assoc()){
				$Song_Id = $row['Song_Id'];
				$i++; 
$qry="select * from songs where Song_Id='$Song_Id'";
$albumResult= $conn -> query($qry);
if($albumResult -> num_rows > 0) {
	while($albumRow = $albumResult -> fetch_assoc()){ ?> 
		<?php if ($i %2 != 0) {?>
        <tr class="odd">
		  <td> <?php echo $i; ?></td>
          <td> <?php echo $albumRow["Song_Name"]; ?> </td>
           <td>
                		<audio controls preload="none">
                          <source src="<?php echo $albumRow['128kbpsLink']; ?>" type="audio/mpeg">
                        	Your browser does not support the audio element.
                        </audio>
                
           </td>
          <td><a href="<?php echo $albumRow['128kbpsLink']; ?>"> Download  </a></td>
          <td><a href="album.php?albumid=<?php echo $albumRow['Album_Id']; ?>"> View Album </a></td>
        </tr>
        
        <?php }else{ ?>        
        <tr class="even">
            <td> <?php echo $i; ?></td>
          <td> <?php echo $albumRow["Song_Name"]; ?> </td>
           <td>
                		<audio controls preload="none">
                          <source src="<?php echo $albumRow['128kbpsLink']; ?>" type="audio/mpeg">
                        	Your browser does not support the audio element.
                        </audio>
                
           </td>
          <td><a href="<?php echo $albumRow['128kbpsLink']; ?>"> Download  </a></td>
          <td><a href="album.php?albumid=<?php echo $albumRow['Album_Id']; ?>"> View Album </a></td>
        </tr>

<?php }	 } 
} else {
	echo "<tr class='bg-danger'>";
	echo "<td> No such album </td>";
	echo "</tr>";
	}  
	 }
} else {
		
	echo "<tr class='bg-danger' height='50px'>";
	echo "<td colspan='4' rowspan='2'> sorry ,No Songs in this category yet </td>";
	echo "</tr>";
	}
?>

<?php	
			}
		}else{ ?>
			<script>
			window.location="artists.php";
			</script>
			<?php } ?>

       
	</tbody>
</table>	       
    </section>
    
    
        <section class="row visible-xs">
    <table width="100%" border="1">
    <thead>
    <tr>
    <?php 
	$sql="select * from artists where Artist_Id=$Artist_Id";
	$result= $conn -> query($sql);
	if($result -> num_rows > 0){
		while ($row = $result -> fetch_assoc()){
			
			?>
			<th colspan="5" class="bg-primary"> <h4><?Php echo $row['Artist_Name']; ?> </h4> </th>
    </tr>
    	
        <tr class="bgLightGreen">
            <th width="25%"> Song Name </th>
            <th width="15%"> Download Song </th>
            <th width="25%"> Album For This Song </th>
        </tr>
	</thead>
	<tbody>
    <?php 
		$sql= "select * from artist_songs_rel where Artist_Id = '$Artist_Id'";
		$i=0; 
		$result = $conn -> query($sql);
		if($result -> num_rows > 0){
			while($row = $result -> fetch_assoc()){
				$Song_Id = $row['Song_Id'];
				$i++; 
$qry="select * from songs where Song_Id='$Song_Id'";
$albumResult= $conn -> query($qry);
if($albumResult -> num_rows > 0) {
	while($albumRow = $albumResult -> fetch_assoc()){ ?> 
		<?php if ($i %2 != 0) {?>
        <tr class="odd">
          <td> <?php echo $albumRow["Song_Name"]; ?> </td>      
          <td><a href="<?php echo $albumRow['128kbpsLink']; ?>"> Download  </a></td>
          <td><a href="album.php?albumid=<?php echo $albumRow['Album_Id']; ?>"> View Album </a></td>
        </tr>
        
        <?php }else{ ?>        
        <tr class="even">
          <td> <?php echo $albumRow["Song_Name"]; ?> </td>
          <td><a href="<?php echo $albumRow['128kbpsLink']; ?>"> Download  </a></td>
          <td><a href="album.php?albumid=<?php echo $albumRow['Album_Id']; ?>"> View Album </a></td>
        </tr>

<?php }	 } 
} else {
	echo "<tr class='bg-danger'>";
	echo "<td> No such album </td>";
	echo "</tr>";
	}  
	 }
} else {
		
	echo "<tr class='bg-danger' height='50px'>";
	echo "<td colspan='4' rowspan='2'> sorry ,No Songs in this category yet </td>";
	echo "</tr>";
	}
?>

<?php	
			}
		}else{ ?>
			<script>
			window.location="artists.php";
			</script>
			<?php } ?>

       
	</tbody>
</table>	       
    </section>
    
    
         
        </article>
    </div>    
<?Php include('includes/footer.php'); ?>
