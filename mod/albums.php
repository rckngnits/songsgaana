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
      <th colspan="6" class="bg-primary"><strong>  Albums ( Arranged in Albhabetic Order ) </strong></th>
    </tr>
        <tr class="bgLightGreen">
            <th width="10%"> Sl. No.</th>
            <th width="20%"> Album / Movies</th>
            <th width="30%"> Artist </th>
            <th width="10%"> Year </th>
            <th width="10%"> No of Songs </th>
            <th width="20%"> View/Edit </th>
        </tr>
	</thead>
	<tbody>
        <?php   $sql = "select * from albums order by Album_Name ";
$result = $conn -> query($sql);
$i=1;
if ($result -> num_rows > 0){
	// output data of each row
    while($row = $result->fetch_assoc()) { 
	$Aid=$row["Album_Id"];
	$songsqry="select * from songs where Album_Id=$Aid";
	$songResult = $conn -> query($songsqry);
	$songCount = $songResult -> num_rows;
	?>

<?php if ($i %2 == 0) {?>
        <tr class="odd">
		  <td> <?php echo $i; ?></td>
          <td> <?php echo $row["Album_Name"]; ?> </td>
          <td> <?php echo $row["Album_Artist"]; ?></td>
          <td> <?php echo $row["Album_Release_Year"]; ?></td>
          <td> <?php echo $songCount; ?></td>
          <td><a href="album.php?albumid=<?php echo $Aid ?>"> View/Edit </a></td>
        </tr>
        
        <?php }else{ ?>
        
        <tr class="even">
          <td> <?php echo $i; ?></td>
          <td> <?php echo $row["Album_Name"]; ?> </td>
          <td> <?php echo $row["Album_Artist"]; ?></td>
          <td> <?php echo $row["Album_Release_Year"]; ?></td>
          <td> <?php echo $songCount; ?></td>
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