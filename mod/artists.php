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
      <th colspan="6" class="bg-primary"><strong> Artists </strong></th>
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
</article>
</div>
    
<?Php include('includes/footer.php'); ?>