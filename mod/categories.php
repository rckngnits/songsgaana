<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
    <section class="row">
    <table width="100%" border="1">
    <thead>
    <tr>
      <th colspan="5" class="bg-primary"><strong> All Available Categories (Arranged Alphabetically)  </strong></th>
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