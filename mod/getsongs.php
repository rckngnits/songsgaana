<?Php include('includes/datalink.php'); ?>
<div class="container-fluid">   
    <div class="container" id="mainContainer">   
        <article class="col-md-12">
        	<section class="row">
            <?php
if(isset($_POST['submit']))
{
	if(!empty($_POST['Add_Song']))
	{
			$Add_Song=$_POST['Add_Song'];
			$query3="SELECT * FROM songs";
			$result = $conn -> query($query3);
		while($row = $result -> fetch_assoc()){			
			echo "<b>".$row['Song_Name']."</b>";
			echo $row['Song_Id'];
		}
	}else{
		echo "No Results";
	}
}
?>
            </section>       
        </article>
    </div>    
</div>