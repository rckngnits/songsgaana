<?Php include('includes/head.php'); ?>
   
<div class="container" id="mainContainer">
<div class="col-md-2">
 <?Php include('includes/sidenav.php'); ?>
</div>

<article class="col-md-10">
	<section class="row">
    	<div class="col-lg-12">
        <br>

        	<p > <h3 class="text-center">Feel free to contact us anytime </h3><h4 class="text-center"> We will try to respond you in minimum possible time .</h4></p><br>
            <br>
            <br>
        </div>    
    </section>
    
	<section class="row">
    	<div class="col-lg-10 col-lg-offset-1">
        	<form class="form-horizontal" name="contact" id="class" action="controllers/addfeedback.php" method="post">
        		<div class="form-group">
                	<label for="name" id="Name" class="control-label col-lg-3" > Your Good Name :-  </label>
                    <div class="col-lg-9">
                    <input type="text" class="form-control" name="Name" id="Name" placeholder="Enter Your Name" required>
                    </div>    
        		</div>
                
                <div class="form-group">
                	<label for="name" id="Eame" class="control-label col-lg-3" > Email Id :-  </label>
                    <div class="col-lg-9">
                    <input type="email" class="form-control" name="Email" id="Email" placeholder="Enter Your Working Email Id for further communication" required>
                    </div>    
        		</div>
                
                 <div class="form-group">
                      <label for="Reason" class="col-lg-3 control-label">Reason For Contact :-</label>
                      <div class="col-lg-9"> 
                      <select class="form-control col-lg-9" id="Reason" required name="Reason" >
                      <option value="">Select Reasons (Required Field)</option>
                      <option value="Reporting Missing File">Reporting Missing File </option>
                      <option value="Feedback">Feedback</option>
                      <option value="Advertisement">Advertisement</option>
                      <option value="Comlaints">Comlaints</option>
                      <option value="Others">Others </option>
                      </select>
                      </div>
          		  </div> 
                  
                  <div class="form-group">
                  	<label for="Message" class="col-lg-3 control-label"> Your Message :- </label>
                    <div class="col-lg-9">
                    <textarea name="Message" id="Message" class="col-lg-9 form-control" rows="5" placeholder="Your message here .... "></textarea>
                    </div>   
                  </div>
                  
                  <div class="form-group">
                <div class="col-lg-offset-3 col-lg-3 col-xs-6">
                	<button type="submit" class="btn btn-block bgSkyBlue">Submit</button>
                </div>
                <div class="col-lg-3 col-xs-6">
                	<button type="reset" class="btn btn-block bgSkyBlue" value="Reset"> Reset </button>
                </div>
                
        	</form>
        </div>  
    </section>
</article>
</div>
    
<?Php include('includes/footer.php'); ?>