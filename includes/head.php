<?php include('includes/datalink.php'); ?>
<?php include('includes/pagetitle.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $pageTitle; ?> || songsganna.com </title>
<?php include_once("metainfo.php") ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
</head>
<body>		
<?php include_once("analyticstracking.php") ?>

	<div class="container">
    	<header class=" container row"> 
        	<head>
            	<div class="col-md-3 col-xs-12" id="logo"> <a href="index.php">Songs Gaana</a> </div>
                <div class="col-md-9 hidden-xs"> &nbsp; </div>
            </head>
        </header>
        <nav class="row">
        <label for="show-menu" class="show-menu">Main Menu</label>
		<input type="checkbox" id="show-menu" role="button">
        	<ul id="mainnavmenu">
            	<li> <a href="index.php"> Home </a> </li>
                <li> <a href="artists.php"> Artists </a> </li>
                <li> <a href="categories.php"> Categories </a> </li>                
                <li> <a href="category.php?catid=1"> Bollywood </a> </li>
                <li> <a href="category.php?catid=2"> Hollywood </a> </li>
                <li> <a href="#"> Wedding </a> </li>
                <li> <a href="#"> Compilations </a> </li>
                <li> <a href="contactus.php"> Contact Us</a> </li>
            </ul>                     
        </nav>
    </div>
