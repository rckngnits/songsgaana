<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
	<section class="row col-md-12">
    	<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="controllers/addsongs.php">
        	<div class="form-group">
                <label class="col-lg-3 control-label" for="Song_Name"> Song Name : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" name="Song_Name" id="Song_Name" placeholder="Enter the name of song / Movie" required>
                </div>
            </div>
            
                    	<div class="form-group">
                <label class="col-lg-3 control-label" for="Description"> Description / Lyrics : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Description" name="Description" placeholder="Intro Stanza Of Song" required>
                </div>
            </div> 
            
           
            <div class="form-group">
                  <label for="Album_Id" class="col-lg-3 control-label">Default Album:</label>
                  <div class="col-lg-9"> 
                  <select class="form-control col-lg-9" id="Album_Id" required name="Album_Id" >
                  <option value="">Select Default Album (Required Field)</option>
                  <?php 
				  $qry= "select * from albums order by Album_Name";
				  $result = $conn -> query($qry);
				  if ( $result -> num_rows > 0 ){
					  while($row = $result -> fetch_assoc()){?>
                    <option value="<?php echo $row['Album_Id']; ?>"> <?php echo $row['Album_Name']; ?></option>
					<?php }
				  		}?>                    
                  </select>
                  </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label" for="Song_Artist"> Artists : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Song_Artist" name="Song_Artist" placeholder="Enter Song Artist" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label" for="128kbpsLink"> Download Link (128kbps) : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="128kbpsLink" name="128kbpsLink" placeholder="Enter 128 kbps Download link ">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label" for="320kbpsLink"> Download Link (320kbps) : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="320kbpsLink" name="320kbpsLink" placeholder="Enter 320 kbps Download link ">
                </div>
            </div>
                   
        
            
            <div class="form-group">
            	<div class="col-lg-3"> </div>
                <div class="col-lg-3">
                <button type="submit" class="btn btn-block bgSkyBlue">Submit</button>
                </div>
                <div class="col-lg-3">
                <button type="reset" class="btn btn-block bgSkyBlue" value="Reset"> Reset </button>
                </div>
                <div class="col-lg-3">
               
                </div>
            </div>
                           
        </form>
    </section>
    <section class="row">
    <table width="100%" border="1">
    <thead>
    <tr>
      <th colspan="5" class="bg-primary"><strong> 15 Recently Added Songs </strong></th>
    </tr>
        <tr class="bgLightGreen">
            <th width="10%"> Sl. No.</th>
            <th width="20%"> Song </th>
            <th width="20%"> Description </th>
            <th width="30%"> Artist </th>
            <th width="20%"> View/Edit </th>
        </tr>
	</thead>
	<tbody>
        <?php   $sql = "select * from songs order by Song_Id DESC LIMIT 15 ";
$result = $conn -> query($sql);
$i=1;
if ($result -> num_rows > 0){
	// output data of each row
    while($row = $result->fetch_assoc()) { 
	$Aid=$row["Album_Id"];
	?>

<?php if ($i %2 == 0) {?>
        <tr class="odd">
		  <td> <?php echo $i; ?></td>
          <td> <?php echo $row["Song_Name"]; ?></td>
          <td> <?php echo $row["Description"]; ?> </td>
          <td> <?php echo $row["Song_Artist"]; ?></td>
          <td><a href="album.php?albumid=<?php echo $Aid ?>"> View/Edit </a></td>
        </tr>
        
        <?php }else{ ?>
        
        <tr class="even">
          <td> <?php echo $i; ?></td>          
          <td> <?php echo $row["Song_Name"]; ?></td>
          <td> <?php echo $row["Description"]; ?> </td>
          <td> <?php echo $row["Song_Artist"]; ?></td>
          <td><a href="album.php?albumid=<?php echo $Aid ?>"> View/Edit </a></td>
        </tr>

<?php }	$i++; }
} else {
    echo "0 results";
} ?>
       
	</tbody>
</table>	       
    </section>
 <!--   <section class="pagination">
    	<ul>
        <?php
		for($i=1; $i<=10 ; $i++){ ?>
			<li> <a href="<?php echo $i ?>"> <?php echo $i; ?> </a> </li>
		<?php	}	?>
        
        </ul>
    
    </section> -->
</article>
</div>
    
<?Php include('includes/footer.php'); ?>