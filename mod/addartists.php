<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
	<section class="row col-md-8">
    	<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="controllers/addartist.php">
        	<div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Artist_Name"> Name Of Artist : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" name="Artist_Name" id="Artist_Name" placeholder="Enter the name of Artist" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Artist_Bio"> Bio : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Artist_Bio" name="Artist_Bio" placeholder="Short Intro About The artist" required>
                </div>
            </div>
        
        	<div class="form-group">
                <label class="col-lg-3 control-label" for="Artist_Image"> Image (Photograph): </label>
                <div class="col-lg-9"> 
                <input type="file" class="form-control" id="Artist_Image" name="Artist_Image" required>
                </div>
            </div>
              
            <div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Wikipedia"> Wikipedia: </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" name="Wikipedia" id="Wikipedia" placeholder="Link to Wikipedia Page">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Website"> Official Website : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Website" name="Website" placeholder="Link to official website">
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
      <th colspan="6" class="bg-primary"><strong> 15 Recently Artists </strong></th>
    </tr>
        <tr class="bgLightGreen">
            <th width="5%"> Sl. No.</th>
            <th width="15%"> Name Of Artist</th>
            <th width="30%"> Biography </th>
            <th width="25%"> Websites </th>
            <th width="15%"> View/Edit </th>
        </tr>
	</thead>
	<tbody>
        <?php   $sql = "select * from artists ";
$result = $conn -> query($sql);
$i=1;
if ($result -> num_rows > 0){
	// output data of each row
    while($row = $result->fetch_assoc()) { 
	$Aid=$row["Artist_Id"];
	?>

<?php if ($i %2 == 0) {?>
        <tr class="odd">
		  <td> <?php echo $i; ?></td>
          <td> <?php echo $row["Artist_Name"]; ?> </td>
          <td> <?php echo $row["Artist_Bio"]; ?></td>
          <td> <?php echo $row["Website"]; ?></td>
          <td><a href="artist.php?artistid=<?php echo $Aid ?>"> View/Edit </a></td>
        </tr>
        
        <?php }else{ ?>
        
         <tr class="even">
		  <td> <?php echo $i; ?></td>
          <td> <?php echo $row["Artist_Name"]; ?> </td>
          <td> <?php echo $row["Artist_Bio"]; ?></td>
          <td> <?php echo $row["Website"]; ?></td>
          <td><a href="artist.php?artistid=<?php echo $Aid ?>"> View/Edit </a></td>
        </tr>

<?php }	$i++; }
} else { ?>
    	 <tr class="odd">
          <td colspan="6" rowspan="2"> <?php echo "No Records Found" ?> </td>
         </tr>
         
<?php } ?>
       
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