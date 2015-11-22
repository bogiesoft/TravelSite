<!--
Author: Mark Wilson
File: vacations.php
SAIT OOSD Spring Track 2015
-->
<?php
// Start the session
session_start();
   
   //Added for Assignment #10
   include("functions.php");
   $message = "";
   
   //Perform some validation before send form data to server.
   function phpvalidate($data)
   {
      $errors = "";
	  if ($data["CustUserName"] == "")
	  {
	     $errors .= "Please enter your username";
	  }
	  if ($data["CustPassword"] == "")
	  {
	     $errors .= "Please enter your password";
	  }
	  
	  return $errors;
   }
   //Added for Assignment #10
   //If CustUserName isset/has a value, then call customerLogIn function and return message.
   if (isset($_REQUEST["CustUserName"]))
   {
      $message = phpvalidate($_REQUEST);
	  if (!$message)
	  {
	     $message = customerLogIn($_REQUEST);
	  }
	  
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Customer Log In</title>
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
<!--Reference external file header.php-->
<?php
	include("header.php");
?>
</header>

<div id="header_logo_small">
	<img src=".\images\photo1.png" alt="Travel Experts">
</div>

<br/>

<div class="spacer"></div>

<!--Validation Messages-->
<div id="noValid" class="hideValid"></div>
<!--Field input Messages-->
<div id="message" class="hideMessage"></div>

<div class="employee_wrapper">
	<p id="error"><?php print($message); ?></p>
	<form id="customerForm" name="customerForm" method="post" action=""><!--Use the POST method to hide passwords and leave the action field blank to have the page reload itself-->
	<div class="form-group">
		<legend>Client Login</legend>
		<div id="login_info">
			<label for ="CustUserName">Username:</label><input type="text" name="CustUserName" id="username" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
			<label for ="CustPassword">Password:</label><input type="password" name="CustPassword" id="password" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
		</div>
	</div>

	<legend>Submit</legend>
	
	<input type="submit" value="Submit Form" class="btn btn-default" onclick="return confirm('Are you sure you want to submit the form?')" /><!--Do not put a name to the Submit button as we don't want to send that info-->
	<input type="reset" value="Clear Form"  class="btn btn-default"  onclick="return confirm('Are you sure you want to clear the form?')"/>

	</form>
</div>

<div class="spacer">
</div>

<!--Reference external file footer.php-->
<footer class="site-footer">
<?php
	include("footer.php");
?>
</footer>

</body>
</html>