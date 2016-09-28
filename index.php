<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
	<section class="row">
    	<?php 

		$catsql = "select * from categories" ;
		$catresult = $conn -> query($catsql);
		if ($catresult -> num_rows >0 ){
			while ($catrows = $catresult -> fetch_assoc()){
				$Category_Id= $catrows['Category_Id'];
				$sub_category = $catrows['Subcategory'];
			 ?>
<div class="col-md-4 boxShadow"> 
    <table width="100%" border="0">
        <thead>
            <tr class="bgLightGreen">
            	<th colspan="2"> <?php echo $catrows['Category_Name']; ?> </th> 
            </tr>
<!--            <tr>
                <th width="70%">Songs </th>
                <th width="30%">Album/Movie </th> -->
            </tr>
        </thead>
        <tbody>

        <?php 
		//for Albums
		if($sub_category ==1){ ?>
        
				<?php	$qry = "select * from cat_songs_rel where Category_Id='$Category_Id' order by Album_Id DESC LIMIT 4";
		$catResltSet= $conn -> query($qry);
				$i=0;
        if ($catResltSet -> num_rows > 0 ){
			while ($catrow = $catResltSet -> fetch_assoc()){
				$Album_Id= $catrow['Album_Id'];				
		$sqlqry = "select * from albums where Album_Id = '$Album_Id'";
		$albumResulSet = $conn -> query($sqlqry);
		if ($albumResulSet -> num_rows > 0){
			while ($albumRows = $albumResulSet -> fetch_assoc() ){ ?>
        <?Php if ($i%2 != 0) {?>
        <tr class="odd">
            <td><strong> <a href="album.php?albumid=<?php echo $albumRows['Album_Id']; ?>"> <?php echo $albumRows['Album_Name']; ?>  - <?php echo $albumRows['Album_Release_Year']; ?> </a> </strong></td>
   <!--         <td><a href="album.php?albumid=<?php echo $albumRows['Album_Id']; ?>"> <?php echo "View Album"; ?> </a></td> -->
        </tr>
        <?Php } else {?>
        <tr class="even">
            <td><strong> <a href="album.php?albumid=<?php echo $albumRows['Album_Id']; ?>"> <?php echo $albumRows['Album_Name']; ?>  - <?php echo $albumRows['Album_Release_Year']; ?>  </a> </strong></td>
       <!--     <td><a href="album.php?albumid=<?php echo $albumRows['Album_Id']; ?>"> View Album </a></td> -->
        </tr>
        <?Php } // if else block ?>	
         
		<?php
					}//Song while loop
		$i++;	}	//Song if condition 	 
					} // category while loop			
			} // album if condition
			
        ?>
			
		<?php	// For songs
		} else if($sub_category == 2) { ?>
				
				<?php	$qry = "select * from cat_songs_rel where Category_Id='$Category_Id' LIMIT 5";
		$catResltSet= $conn -> query($qry);
				$i=0;
        if ($catResltSet -> num_rows > 0 ){
			while ($catrow = $catResltSet -> fetch_assoc()){
				$Song_Id= $catrow['Song_Id'];				
		$sqlqry = "select * from songs where Song_Id = '$Song_Id'";
		$albumResulSet = $conn -> query($sqlqry);
		if ($albumResulSet -> num_rows > 0){
			while ($albumRows = $albumResulSet -> fetch_assoc() ){ ?>
        <?Php if ($i%2 != 0) {?>
        <tr class="odd">
            <td><strong> <a href="#"> <?php echo $albumRows['Song_Name']; ?> </a> </strong> </td>
            <td><a href="album.php?albumid=<?php echo $albumRows['Album_Id']; ?>"> <?php echo "View Album"; ?> </a></td>
        </tr>
        <?Php } else {?>
        <tr class="even">
            <td><strong> <a href="#"> <?php echo $albumRows['Song_Name']; ?> </a> </strong> </td>
            <td><a href="album.php?albumid=<?php echo $albumRows['Album_Id']; ?>"> View Album </a></td>
        </tr>
        <?Php } // if else block ?>	
         
		<?php
					}//Song while loop
		$i++;	}	//Song if condition 	 
					} // category while loop			
			} // album if condition
			
        ?>	
				
				
			<?php	}
		
?>
    </tbody>
    <tfoot>
    <tr>    <td colspan="2"> <a href="category.php?catid=<?php echo $Category_Id; ?>"> See More </a> </td>    </tr>    
    </tfoot>
    </table> 
</div>  	
		<?php		
		}// while loop categories
	}// if condition categories
	?>
    
</div>  
   
    </section>
</article>
</div>
    
<?Php include('includes/footer.php'); ?>