<!--
Author: Mark Wilson
File: agent.php
Assignments #2, #4 and #10
SAIT OOSD Spring Track 2015
-->
<?php
//Start Session
session_start();
   
   include("functions.php");
   $message = "";
   
   //Added for Assignment #10
   //perform some validation on server
   function phpvalidate($data)
   {
      $errors = "";
	  if ($data["AgtFirstName"] == "")
	  {
	     $errors .= "First name must have a value";
	  }
	  if ($data["AgtMiddleInitial"] == "")
	  {
	     $errors .= "Middle name must have a value";
	  }
	  if ($data["AgtLastName"] == "")
	  {
	     $errors .= "Last name must have a value";
	  }
	  if ($data["AgtBusPhone"] == "")
	  {
	     $errors .= "Work phone name must have a value";
	  }
	  if ($data["AgtEmail"] == "")
	  {
	     $errors .= "Email must have a value";
	  }
	  if ($data["AgtPosition"] == "")
	  {
	     $errors .= "Position must have a value";
	  }
	  if ($data["AgtUserName"] == "")
	  {
	     $errors .= "Username must have a value";
	  }
	  if ($data["AgtPassword"] == "")
	  {
	     $errors .= "Password must have a value";
	  }
	  if ($data["AgencyId"] == "")
	  {
	     $errors .= "Agency ID must have a value";
	  }
	  
	  return $errors;
   }
   //if AgtUserName isset or has a value then call insertAgent function and return message
   if (isset($_REQUEST["AgtFirstName"]))
   {
      $message = phpvalidate($_REQUEST);
	  if (!$message)
	  {
	     $message = insertAgent($_REQUEST);
	  }
	  
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Create Agent</title>
	<meta charset="utf-8" />
	<meta name="keywords" content="travel, tours, vacations, flights">
	<meta name="author" content="Mark Wilson">
	
	<link rel="stylesheet" type="text/css" href=".\css\bootstrap.css" media="all">
	<link rel="stylesheet" type="text/css" href=".\css\bootstrap.min.css" media="all">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href=".\css\site.css" media="all">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
	<script src=".\scripts\script.js"></script>
	<script src=".\scripts\jquery.js"></script>
	
	<script src=".\scripts\jquery-1.11.0.min.js"></script>
	<script src=".\scripts\bootstrap.min.js"></script>
	
</head>

<body>

<header>
<!--Reference External file header.php-->
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
		<form id="customerForm" name="customerForm" method="get" action="">
			<div class="form-group">
				<legend>New Agent Information</legend>
					<div id="cust_info">
						<label for ="AgtFirstName">First Name:</label><input type="text" name="AgtFirstName" id="AgtFirstName" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="AgtMiddleInitial">Middle Initial:</label><input type="text" name="AgtMiddleInitial" id="AgtMiddleInitial" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="AgtLastName">Last Name:</label><input type="text" name="AgtLastName" id="AgtLastName" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="AgtBusPhone">Work Phone:</label><input type="text" name="AgtBusPhone" id="AgtBusPhone" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="AgtEmail">Email:</label><input type="text" name="AgtEmail" id="AgtEmail" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="AgtPosition">Position:</label><input type="text" name="AgtPosition" id="AgtPosition" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="AgtPosition">Username:</label><input type="text" name="AgtUserName" id="AgtUserName" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="AgtPosition">Password:</label><input type="text" name="AgtPassword" id="AgtPassword" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="AgencyId">Which Agency?</label><br />
						<select name="AgencyId" id="AgencyId" class="form-control">
							<option value="1">Calgary</option>
							<option value="2">Okotoks</option>
						</select>
					</div>
			</div>

			<legend>Submit Form</legend>
			<!--onClick events added for Assignment #4-->
			<input type="submit" value="Submit Form" class="btn btn-default" />
			<input type="reset" value="Clear Form"  class="btn btn-default"  onclick="return confirm('Are you sure you want to clear the form?')"/>
		</form>
</div><!--End register_wrapper-->

<div id="regFloatReset"></div>
<br/>
<br/>
<br/>
<!--Reference External file footer.php-->
<footer class="site-footer">
<?php
	include("footer.php");
?>
</footer>

</body>
</html>