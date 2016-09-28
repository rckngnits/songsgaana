<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
	<section class="row col-md-8">
    	<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="controllers/addalbum.php">
        	<div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Album_Name"> Album Name : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" name="Album_Name" id="Album_Name" placeholder="Enter the name of Album / Movie" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Album_Artist"> Composers : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Album_Artist" name="Album_Artist" placeholder="Enter Album / Movie Artist" required>
                </div>
            </div>
            
                        <div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Album_Artist"> Lyrists : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Album_Artist" name="Album_Artist" placeholder="Enter Album / Movie Artist" required>
                </div>
            </div>
        
        	<div class="form-group">
                <label class="col-lg-3 control-label" for="Album_Cover_Art"> Cover Art : </label>
                <div class="col-lg-9"> 
                <input type="file" class="form-control" id="Album_Cover_Art" name="Album_Cover_Art" required>
                </div>
            </div>
        
        	<div class="form-group">
                <label class="col-lg-3 control-label" for="Album_Release_Year"> year : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" id="Album_Release_Year" name="Album_Release_Year" placeholder="Enter Release Year" required>
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
      <th colspan="5" class="bg-primary"><strong> 15 Recently Added Albums </strong></th>
    </tr>
        <tr class="bgLightGreen">
            <th width="10%"> Sl. No.</th>
            <th width="20%"> Album / Movies</th>
            <th width="30%"> Artist </th>
            <th width="10%"> Year </th>
            <th width="20%"> View/Edit </th>
        </tr>
	</thead>
	<tbody>
        <?php   $sql = "select * from albums order by Album_Id Desc ";
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
          <td> <?php echo $row["Album_Name"]; ?> </td>
          <td> <?php echo $row["Album_Artist"]; ?></td>
          <td> <?php echo $row["Album_Release_Year"]; ?></td>
          <td><a href="album.php?albumid=<?php echo $Aid ?>"> View/Edit </a></td>
        </tr>
        
        <?php }else{ ?>
        
        <tr class="even">
          <td> <?php echo $i; ?></td>
          <td> <?php echo $row["Album_Name"]; ?> </td>
          <td> <?php echo $row["Album_Artist"]; ?></td>
          <td> <?php echo $row["Album_Release_Year"]; ?></td>
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