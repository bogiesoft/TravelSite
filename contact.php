<!--
Author: Mark Wilson
File: contact.php
Assignment #1, #8
SAIT OOSD Spring Track 2015

File renamed to contact.php for Assignment #7
-->
<?php
//Start Session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Contact</title>
	<meta charset="utf-8" />
	<meta name="keywords" content="travel, tours, vacations, flights">
	<meta name="author" content="Mark Wilson">
	
	<link rel="stylesheet" type="text/css" href=".\css\bootstrap.css" media="all">
	<link rel="stylesheet" type="text/css" href=".\css\bootstrap.min.css" media="all">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href=".\css\site.css" media="all">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
	<script src=".\scripts\script.js"></script>
	
	<script src=".\scripts\jquery-1.11.0.min.js"></script>
	<script src=".\scripts\bootstrap.min.js"></script>
	
</head>

<body>

<header>
	<?php
		include("header.php");
	?>
</header>

<div id="header_logo_small">
	<img src=".\images\photo1.png" alt="Travel Experts">
</div>


<?php
	include("create_contacts.php");
?>

<div id="calgary"></div>
<div id="okotoks"></div>

<div class="spacer"></div>

<footer class="site-footer">
	<?php
		include("footer.php");
	?>
</footer>
</body>
</html>