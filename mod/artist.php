<?Php include('includes/head.php'); ?>
<div class="container-fluid">   
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
            
           <section class="row col-md-12">

		

    	<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="controllers/addalbum.php">
                    	<div class="form-group">
                <label class="col-lg-3 control-label" for="Album_Release_Year"> Add Songs To This Artist : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Album_Release_Year" name="Album_Release_Year" placeholder="Start typing To find Name of the Album" onKeyUp="getHint(this.value);">
                </div>
            </div> 
            
            <div class="row"> 
            	<div class="col-lg-12" id="searchResult"> </div>            
            </div>
            
                           
        </form>
    </section>



    <section class="row">
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
            <th width="30%"> Song Name </th>
            <th width="20%"> Artist </th>
            <th width="25%"> Remove from Album </th>
            <th width="15%"> View/Edit </th>
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
		<?php if ($i %2 == 0) {?>
        <tr class="odd">
		  <td> <?php echo $i; ?></td>
          <td> <?php echo $albumRow["Song_Name"]; ?> </td>
          <td> <?php echo $albumRow["Song_Artist"]; ?></td>                    
          <td><a href="controllers/removeartistsongsrel.php?songid=<?php echo $albumRow['Song_Id']; ?>&&artistid=<?php echo $Artist_Id ?>"> Remove From This Album </a></td>
          <td><a href="album.php?albumid=<?php echo $albumRow['Album_Id']; ?>"> View/Edit </a></td>
        </tr>
        
        <?php }else{ ?>        
        <tr class="even">
          <td> <?php echo $i; ?></td>          
          <td> <?php echo $albumRow["Song_Name"]; ?> </td>
          <td> <?php echo $albumRow["Song_Artist"]; ?></td>          
          <td><a href="controllers/removeartistsongsrel.php?songid=<?php echo $albumRow['Song_Id']; ?>&&artistid=<?php echo $Artist_Id ?>"> Remove From This Album </a></td>
          <td><a href="album.php?albumid=<?php echo $albumRow['Album_Id']; ?>"> View/Edit </a></td>
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
	echo "<td colspan='5' rowspan='2'> sorry ,No album in this category yet </td>";
	echo "</tr>";
	}
?>

<?php	
			}
		}else{ ?>
			<script>
			
			window.location="categories.php";
			
			</script>
			<?php } ?>

       
	</tbody>
</table>	       
    </section>
         
        </article>
    </div>    
</div>
		<script>
	function getHint(str){
	if(str.length == 0){
		document.getElementById("searchResult").innerHTML= "";
		return;
		} else {
			var aid =<?php echo $Artist_Id; ?>;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState ==4 && xmlhttp.status == 200 ){
					document.getElementById("searchResult").innerHTML = xmlhttp.responseText ;
					}
				}
			xmlhttp.open("GET", "searchsongs.php?qry="+str+"&artid="+aid,true);
			xmlhttp.send();
			}			
	}
		</script>


<?Php include('includes/footer.php'); ?>
