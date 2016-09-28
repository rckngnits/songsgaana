<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
	<section class="row"> 
       <table width="100%" border="1">
  <thead>
  <tr class="bgLightGreen"> <th colspan="2"> DashBoard </th> </tr>
      <tr>
      	<th width="70%">Songs </th>
        <th width="30%">Movie </th>
      </tr>
  </thead>
  <tbody>

              <tr class="odd">
                <td><strong> <?Php echo "Total Number of Albums"; ?> </strong> </td>
                <td> <?php echo "30" ;?> </td>
              </tr>
            
              <tr class="even">
               <td><strong> <?Php echo "Total Uploaded Songs" ?> </strong> </td>
                <td> <?php echo "390"; ?> </td>
              </tr>
              
              
              <tr class="odd">
                <td><strong> <?Php echo "Total Number of Categories"; ?> </strong> </td>
                <td> <?php echo "30" ;?> </td>
              </tr>
            
              <tr class="even">
               <td><strong> <?Php echo "Total Visitors this month" ?> </strong> </td>
                <td> <?php echo "390"; ?> </td>
              </tr>
            
  </tbody>
    <tfoot>
  	<tr>    <td colspan="2"> <a href="#"> See More </a> </td>    </tr>    
  </tfoot>
</table>
		</div>
    </section>
</article>
</div>
    
<?Php include('includes/footer.php'); ?>