<?php include('includes/datalink.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> SongsGanna - Admin Login </title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div id="main">
    <div id="login">
    <h2> Login To Songsgaana </h2> <hr>
    <form action="controllers/checklogin.php" method="post" name="">
    	<label> Username : </label>
    	<input type="text" name="username" id="username" placeholder="Username">
        <label> Password :</label>
        <input type="password" name="password" id="password" placeholder="Password">
      <!--  <span> <?php echo "error massage if there "; ?> </span> -->
        <input type="submit" name="submit" value="Login">
    </form>
    </div>
</div>
<?php $conn->close(); ?>
<script>
	setTimeout(function(){
  		 window.location.reload(1);
	}, 60000);
</script>
</body>
</html>