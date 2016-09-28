<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
<?php 
if(isset($_REQUEST['songid'])){
$songId = $_REQUEST['songid'];
$sql = "select * from songs where Song_Id='$songId' LIMIT 1";
$result = $conn -> query($sql);
if($result -> num_rows > 0)
while($rows = $result-> fetch_assoc()){
?>
	<section class="row col-md-12">
    	<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="controllers/updatesong.php">
            <div class="form-group hidden">
                <label class="col-lg-3 control-label" for="Song_Id"> Song Id : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" name="Song_Id" id="Song_Id" value="<?php echo $rows['Song_Id']; ?>" >
                </div>
            </div>
        
        
        
        	<div class="form-group">
                <label class="col-lg-3 control-label" for="Song_Name"> Song Name : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" name="Song_Name" id="Song_Name" value="<?php echo $rows['Song_Name']; ?>" required>
                </div>
            </div>
            
                    	<div class="form-group">
                <label class="col-lg-3 control-label" for="Description"> Description / Lyrics : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Description" name="Description" value="<?php echo $rows['Description']; ?>" required>
                </div>
            </div> 
            
           
            <div class="form-group">
                  <label for="Album_Id" class="col-lg-3 control-label">Default Album:</label>
                  <div class="col-lg-9"> 
                  <select class="form-control col-lg-9" id="Album_Id" required name="Album_Id" >
                  <?php 
				  $albumId=$rows['Album_Id'];
				  $qry= "select * from albums where Album_Id = $albumId";
				  $albumresult = $conn -> query($qry);
				  if ( $albumresult -> num_rows > 0 ){
					  while($albumrow = $albumresult -> fetch_assoc()){?>
                    
                    <option value="<?php echo $albumrow['Album_Id']; ?>"> <?php echo $albumrow['Album_Name']; ?> (Currently Selected)</option>
                    <option value=""> ---------------------------- Choose From Below To Change ---------------------------</option>
                    
					<?php }
				  		}?>
				  
				  
				  
				  <?php
				  $qry= "select * from albums where Album_Id != $albumId order by Album_Name";
				  $albumresult = $conn -> query($qry);
				  if ( $albumresult -> num_rows > 0 ){
					  while($albumrow = $albumresult -> fetch_assoc()){?>
                   
                    <option value="<?php echo $albumrow['Album_Id']; ?>"> <?php echo $albumrow['Album_Name']; ?></option>
					<?php }
				  		}?>                    
                  </select>
                  </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label" for="Song_Artist"> Artists : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Song_Artist" name="Song_Artist" value="<?php echo $rows['Song_Artist']; ?>" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label" for="128kbpsLink"> Download Link (128kbps) : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="128kbpsLink" name="128kbpsLink" value="<?php echo $rows['128kbpsLink']; ?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label" for="320kbpsLink"> Download Link (320kbps) : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="320kbpsLink" name="320kbpsLink" value="<?php echo $rows['320kbpsLink']; ?>" >
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
<?php
}//while
}// if (checks id existence)
else{
	echo "error";
	}
?>
</article>
</div>
    
<?Php include('includes/footer.php'); ?>