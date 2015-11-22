<!--
Author: Mark Wilson
File: index.php
Assignment #1, #5, 
SAIT OOSD Spring Track 2015

File renamed to index.php for Assignment #7
-->
<?php
//Start Session
session_start();
	if (!isset($_SESSION["Username"])){
		$_SESSION["Username"] = "";
	}
	if (!isset($_SESSION["Firstname"])){
		$_SESSION["Firstname"] = "";
	}
	//print_r($_SESSION);
	
	//Added for Assignment #
	//Get Current Date and Time - used to greeting message to user.
   date_default_timezone_set("America/Edmonton");
   $date = date("l, F j, Y  h:i:s A e O");
   $time = date("h:i:s");
   $hour = date("H A e O");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts</title>
	<meta charset="utf-8" />
	<meta name="keywords" content="travel, tours, vacations, flights">
	<meta name="author" content="Mark Wilson">
	
	<link rel="stylesheet" type="text/css" href=".\css\bootstrap.css" media="all">
	<link rel="stylesheet" type="text/css" href=".\css\bootstrap.min.css" media="all">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href=".\css\site.css" media="all">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
	<script src=".\scripts\mainpage_script.js"></script>
	<script src=".\scripts\jquery-1.11.0.min.js"></script>
	<script src=".\scripts\jquery.js"></script>
	<script src=".\scripts\bootstrap.min.js"></script>

	<script>
	//Assignment #5 modified from Assignment #1 
	//Build Image Array
	var myImages = new Array();
	myImages[0] = new Image();					//need to create a "new Image()" object for each new image we want to add to array.
	myImages[0].src = "images/caribbean.jpg";
	myImages[1] = new Image();
	myImages[1].src = "images/photo3.jpg";
	myImages[2] = new Image();
	myImages[2].src = "images/asia.jpg";
	myImages[3] = new Image();
	myImages[3].src = "images/photo1.jpg";
	myImages[4] = new Image();
	myImages[4].src = "images/vegas.jpg";
	myImages[5] = new Image();
	myImages[5].src = "images/greece.jpg";
	myImages[6] = new Image();
	myImages[6].src = "images/africa.jpg";
	myImages[7] = new Image();
	myImages[7].src = "images/paris.jpg";
	
	//Assignment #5
	//Build Description Array
	var myDescs = ["Caribbean New Year", "Polynesian Paradise", "Asia Expedition", "European Vacation", "Las Vegas Long Weekend", "Island Hopping Greece", "Africa Explorer", "Romantic Paris"];
	
	//Assignment #6
	//Build URL Array
	var myURLs = new Array();
	myURLs[0] = "http://www.caribbean.com";
	myURLs[1] = "http://www.gohawaii.com/en/#/";
	myURLs[2] = "http://www.cnto.org/";
	myURLs[3] = "http://www.visiteurope.com/en/";
	myURLs[4] = "http://www.lasvegas.com";
	myURLs[5] = "http://www.visitgreece.gr/";
	myURLs[6] = "http://www.namibiatourism.com.na/";
	myURLs[7] = "http://en.parisinfo.com/";
	
	//Added JavaScript function for Assignment #6
	//Function openWindow called from onlick event inside each image.  Use the setTimeout function to call 'closeWin' function to close the window after 10 seconds.
	var newWin;
	function openWindow(url){
	var strWindowFeatures = "menubar=yes,resizable=yes,scrollbars=yes,status=no";
	var myurl = url;
	newWin = window.open(myurl, "myWindow", "width='600', height='400'", "strWindowFeatures" );	//Security of browsers and websites can block the movement, may need to be on same DOMAIN or localhost when testing.
	setTimeout(function(){closeWin()} ,10000);
	}
	
	//Assignment #6
	//This function is called by the setTimeout function above.
	function closeWin() {
    newWin.close();   // Closes the new window
	}
	</script>
	
</head>

<body class="bg_wrapper">

<header>
<!--External reference file header.php-->
<?php
	include("header.php");
?>
</header>

<br/>

<div class="spacer"></div>

<!--Added for Assignment #2-->
<!--Setting background image-->
<img id="background_title" src=".\images\photo1.png" alt="Travel Experts">


<!--Check Current Date and Time - and select appropriate greeting message to user.-->
<div id="greeting">
<?php
	  if($hour < 12){
		  print("<h3>Good Morning...Welcome to Travel Experts. Click on our feature destinations to learn more.</h3>");
	  }elseif($hour >= 12 && $hour <= 17){
		  print("<h3>Good Afternoon...Welcome to Travel Experts. Click on our feature destinations to learn more.</h3>");
	  }elseif($hour > 17){
		  print("<h3>Good Evening...Welcome to Travel Experts. Click on our feature destinations to learn more.</h3>");
	  }else{
		  
	  }
?>
</div>

<!--Display travel pictures and Description from array above-->
<div class="package_wrapper">
	<script>
		for(i=0; i<myImages.length; i++){
			console.log(myURLs[i]);
			var strURL = myURLs[i];
			//need to use escape character \ plus a " or ' to properly embed the single or double quotes.
			//in the document.write line build a table with the image and description from the arrays above.  The image has an onclick event called 'openWindow'
			document.write("<table id='vac_pkg_min' class='item'><tr><td><img onclick='openWindow(\""+strURL+"\")' src=" + myImages[i].src + " width=300px height=200px/></td></tr><tr><td>" + myDescs[i] + "</td></tr></table>");
		}	
	</script>
</div>

<!--External reference file footer.php-->
<footer class="site-footer">
	<?php
		include("footer.php");
	?>
</footer>
</body>
</html>