<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>


<article class="col-md-10">
<?php 
$Album_Id = $_REQUEST['albumid'];
$sql = "select * from albums where Album_Id = '$Album_Id'";
$result = $conn -> query($sql);
if($result -> num_rows >0)
while($rows = $result -> fetch_array()){
?>	
	<section class="row">
        <div class="col-lg-12">
        	 <div class="col-lg-3"> 
			 	<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $rows['Album_Cover_Art'] ).'"/>'; ?>  
             </div>
            <div class="col-lg-9">
            <form name="coverArt" role="form" enctype="multipart/form-data" method="post" action="controllers/updatecover.php">
            	<div class="form-group">
                <label class="col-lg-12 control-label" for="Album_Cover_Art"> Change Cover Art : </label>
                <div class="col-lg-9"> 
                <input type="file" class="form-control" id="Album_Cover_Art" name="Album_Cover_Art">
                </div>
                <div class="col-lg-3">
                <input class="hidden" name="albumid" id="albumid" type="text" value="<?php echo $rows['Album_Id']; ?>">
                <button type="submit" class="btn btn-block bgSkyBlue">Change</button>
	            </div> 
            </form>           
            </div>        
        </div>
    </section>
	<section class="row col-md-8">
    	<form name="albumInfo" class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="controllers/updatealbum.php">
        	<div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Album_Name"> Album Name : </label>
                <div class="col-lg-9">
                <input class="hidden" name="albumid" id="albumid" type="text" value="<?php echo $rows['Album_Id']; ?>"> 
                <input type="text"  class="form-control" name="Album_Name" id="Album_Name" value="<?php echo $rows['Album_Name']; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Album_Artist"> Composers : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Album_Artist" name="Album_Artist" value="<?php echo $rows['Album_Artist']; ?>">
                </div>
            </div>
            
 <!--                       <div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Album_Artist"> Lyrists : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Album_Artist" name="Album_Artist" placeholder="Enter Album / Movie Artist">
                </div>
            </div> -->
       
        
        	<div class="form-group">
                <label class="col-lg-3 control-label" for="Album_Release_Year"> year : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Album_Release_Year" name="Album_Release_Year" value="<?php echo $rows['Album_Release_Year']; ?>">
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
<?php } ?>
</article>
</div>
    
<?Php include('includes/footer.php'); ?>