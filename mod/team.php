<?Php include('includes/head.php'); ?>
<div class="container" id="mainContainer">
	<article>
    	<section>
        <?php 
		$sql = "select * from users where Display = 1";
		$result = $conn -> query($sql);
		if($result -> num_rows > 0){
			while ($rows = $result -> fetch_assoc()){
				
				

		
		 ?>
        	<div class="col-lg-6 teamBox">
            <div class="row">
            	<h3> <?php echo $rows['Name']; ?> </h3>
            	<div class="col-lg-4">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $rows['Image'] ).'"/>'; ?>
                </div>            
            	<div class="col-lg-8">
            	
                <table width="100%" border="0">         
                  <tr>
                    <td width="35%" ><strong>Qualifications :- </strong></td>
                    <td width="65%"><?php echo $rows['Qualification']; ?></td>
                  </tr>
                  <tr>
                    <td ><strong>Location :- </strong></td>
                    <td><?php echo $rows['Location']; ?></td>
                  </tr>
                  <tr>
                    <td ><strong>Email Id :-</strong></td>
                    <td><?php echo $rows['Email']; ?></td>
                  </tr> 
                         
                </table>
                </div>
                </div>
                <p> <strong>Responsible For :- </strong> <?php echo $rows['Responsibilities']; ?> </p>
                        	
    		</div>
            
            <?php } //while
		} //if
		?>
           
    	</section>
	</article>
</div>  
<?Php include('includes/footer.php'); ?>
