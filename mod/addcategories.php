<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
	<section class="row col-md-12">
    	<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="controllers/addcategory.php">
        	<div class="form-group">
                <label class="col-lg-3 control-label text-left" for="Category_Name"> Category Name : </label>
                <div class="col-lg-9"> 
                <input type="text"  class="form-control" name="Category_Name" id="Category_Name" placeholder="Enter the name of Category" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label" for="Descrition"> Description : </label>
                <div class="col-lg-9"> 
                <textarea  class="form-control" rows="5" id="Description" name="Description" placeholder="Descrption about category" required></textarea>
                </div>
            </div> 
            
            <div class="form-group">
            	<label class="control-label col-lg-3" for="Sub_Category"> Sub Category </label>
                <div class="col-lg-9">
                <select class="form-control" id="Sub_Category" name="Subcategory" required>
                	<option value=""> Select one (Required Field) </option>
                    <option value="1"> Album </option>
                    <option value="2"> Song </option>                
                </select>
                </div>
            
            </div>
            
            <div class="form-group">
                <div class="col-lg-3 col-lg-offset-3 col-xs-6">
                <button type="submit" class="btn btn-block bgSkyBlue">Submit</button>
                </div>
                <div class="col-lg-3 col-xs-6">
                <button type="reset" class="btn btn-block bgSkyBlue" value="Reset"> Reset </button>
                </div>
            </div>
                           
        </form>
    </section>
    <section class="row">
    <table width="100%" border="1">
    <thead>
    <tr>
      <th colspan="5" class="bg-primary"><strong> 15 Recently Added Categories </strong></th>
    </tr>
        <tr class="bgLightGreen">
            <th width="10%"> Sl. No.</th>
            <th width="20%"> Category </th>
            <th width="50%"> Descriptions </th>
            <th width="20%"> View/Edit </th>
        </tr>
	</thead>
	<tbody>
<?php   $sql = "select * from categories";
$result = $conn -> query($sql);
$i=1;
if ($result -> num_rows > 0){
	// output data of each row
    while($row = $result->fetch_assoc()) {
		$cid=$row['Category_Id'];
	?>

<?php if ($i %2 == 0) {?>
        <tr class="odd">
		  <td> <?php echo $i; ?></td>
          <td> <?php echo $row["Category_Name"]; ?> </td>
          <td> <?php echo $row["Category_Desc"]; ?></td>
          <td><a href="category.php?catid=<?php echo $cid ?>"> View/Edit </a></td>
        </tr>
        
        <?php }else{ ?>
        
        <tr class="even">
          <td> <?php echo $i; ?></td>          
          <td> <?php echo $row["Category_Name"]; ?> </td>
          <td> <?php echo $row["Category_Desc"]; ?></td>
          <td><a href="category.php?catid=<?php echo $cid ?>"> View/Edit </a></td>
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