<?php session_start(); ?>
<?php if(!isset($_SESSION['User_Id'])) {
	header("location: login.php"); // Redirecting To Other Page
} ?>
<?php include('includes/datalink.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>songs Gaana</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/styles.css">
</head>
<body>		
<div class="container-fluid">
	<div class="container">
    	<header class=" container row"> 
        	<head>
            	<div class="col-md-4 col-xs-12" id="logo"> <h1>Songs Gaana</h1>  </div>
                <div class="col-md-6 hidden-xs"> <h2> Admin Panel  </div>
                <div class="col-md-2 hidden-xs"> <a href="controllers/logout.php"> Logout </a> </div>
            </head>
        </header>
        <nav class="row">
        <label for="show-menu" class="show-menu">Main Menu</label>
		<input type="checkbox" id="show-menu" role="button">
        	<ul id="mainnavmenu">
            	<li> <a href="index.php"> Home </a> </li>
                <li> <a href="#"> Manage </a> </li>
                <li> <a href="#"> Daily Stuffs </a> </li>
                <li> <a href="#"> Messages </a> </li>
                <li> <a href="#"> Reports </a> </li>
                <li> <a href="#"> Social Networks </a> </li>
                <li> <a href="#"> Complaints </a> </li>
                <li> <a href="team.php"> Team Members </a> </li>
            </ul>                     
        </nav>
    </div>
</div>