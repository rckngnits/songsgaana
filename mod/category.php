<?Php include('includes/head.php'); ?>
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
<section class="row col-md-12">
    	<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="controllers/addalbum.php">
                    	<div class="form-group">
                <label class="col-lg-4 control-label" for="Album_Release_Year"> Add Album/Song To Category : </label>
                <div class="col-lg-8"> 
                <input type="text"  class="form-control" id="Album_Release_Year" name="Album_Release_Year" placeholder="Start typing To find Name of the Album" onKeyUp="getHint(this.value);">
                </div>
            </div> 
            
            <div class="row"> 
            	<div class="col-lg-12" id="searchResult"> </div>            
            </div>
        </form>
    </section>
<section class="row">
	<div class="col-lg-12">
    <?php $catid=$_REQUEST['catid'];
	$sql = "select * from categories where Category_Id=$catid";
	$result = $conn -> query($sql);
	if($result -> num_rows > 0){
		// if resultSet has results then
		while($rows =$result -> fetch_assoc()){
			// Display all results row by row 
			$sub_category = $rows['Subcategory'];
	if ($sub_category == 1){?>
     <table width="100%" border="1">
    <thead>
       <tr>
        <th class="bgLightGreen" colspan="6"> Albums In This Category Arranged Alphabetically Its Name </th>        
      </tr>
      <tr>
        <th width="5%"> Sl No.</th>
        <th width="30%">Album Name</th>
        <th width="25%">Album Artist</th>
        <th width="5%"> Year</th>        
        <th width="25%">Remove</th>
        <th width="10%">View / Edit</th>
      </tr>
      </thead>
	  <?php 
	  $i=1;
	  $sql = "Select * from cat_songs_rel where Category_Id = $catid";
	  $result = $conn -> query($sql);
	  if ($result -> num_rows >0 ){
		  while($rows = $result -> fetch_assoc()){
			  $Album_Id=$rows['Album_Id'];
	  $album_sql = "select * from albums where Album_Id='$Album_Id'";
	  $album_result = $conn -> query($album_sql);
	  if($album_result->num_rows>0){
		  while($album_rows = $album_result -> fetch_assoc()){ ?>
       <tr>
        <td> <?php echo $i ; ?> </td>
        <td><?php echo $album_rows['Album_Name']; ?></td>
        <td><?php echo $album_rows['Album_Artist']; ?></td>
        <td><?php echo $album_rows['Album_Release_Year']; ?></td>
        <td><a href="controllers/removecatsongrel.php?catsongrelid=<?php echo $rows['Cat_Song_Rel_Id']; ?>&&catid=<?php echo $catid ?>"> Remove Album this category </a></td>
        <td><a href="album.php?albumid=<?php echo $album_rows['Album_Id']; ?>"> View / Edit</a></td>
      </tr>  
		<?php	$i++;  }//while
		 }//if
	 
			  }//while
		  }//if
	
	  }//if
	  else if ($sub_category == 2){?>
     <table width="100%" border="1">
    <thead>
       <tr>
        <th class="bgLightGreen" colspan="6"> Songs In This Category Arranged Alphabetically Its Name </th>        
      </tr>
      <tr>
        <th width="5%"> Sl No.</th>
        <th width="30%">Album Name</th>
        <th width="30%">Album Artist</th>
        <th width="15%"> Year</th>        
        <th width="10%"> Remove</th>
        <th width="10%">View / Edit</th>
      </tr>
      </thead>
	  <?php 
	  $sql = "Select * from cat_songs_rel where Category_Id = $catid";
	  $k = 1;
	  $result = $conn -> query($sql);
	  if ($result -> num_rows >0 ){
		  while($rows = $result -> fetch_assoc()){
			  $Song_Id=$rows['Song_Id'];
	  $song_sql = "select * from songs where Song_Id='$Song_Id'";
	  $song_result = $conn -> query($song_sql);
	  if($song_result->num_rows>0){
		  while($song_rows = $song_result -> fetch_assoc()){ ?>
       <tr>
        <td> <?php echo $k ; ?> </td>
        <td><?php echo $song_rows['Song_Name']; ?></td>
        <td><?php echo $song_rows['Song_Artist']; ?></td>
        <td><?php echo $song_rows['Description']; ?></td>
        
   <td><a href="controllers/removecatsongrel.php?catsongrelid=<?php echo $rows['Cat_Song_Rel_Id']; ?>&&catid=<?php echo $catid ?>"> Remove Album this category </a></td>
        <td><a href="album.php?albumid=<?php echo $song_rows['Album_Id']; ?>"> View / Edit</a></td>
      </tr>  
		<?php	 $k++; }//while
		 }//if
	 
			  }//while
		  }//if
		  
	  }//else if
	  
	 }//while
	}//if
	   ?>

    </table>
	</div> 
</section>    
</article>
</div>
		<script>
function getHint(str){
	if(str.length == 0){
		document.getElementById("searchResult").innerHTML= "";
		return;
		} else {
			var subcat = <?php echo $sub_category ?>;
			var catid = <?php echo $catid; ?>;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState ==4 && xmlhttp.status == 200 ){
					document.getElementById("searchResult").innerHTML = xmlhttp.responseText ;
					}
				}
			if (subcat == 1){
			xmlhttp.open("GET", "searchalbums.php?qry="+str+"&catid="+catid,true);
			xmlhttp.send();		
			} else if(subcat == 2){
				xmlhttp.open("GET", "searchsongs.php?qry="+str+"&catid="+catid,true);
			xmlhttp.send();	
				}
				}	
	}
		</script>


    
<?Php include('includes/footer.php'); ?>