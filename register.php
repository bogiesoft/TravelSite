<!--
Author: Mark Wilson
File: register.php
Assignment #2 & #4
SAIT OOSD Spring Track 2015

File renamed to register.php for Assignment #7
-->
<?php
//Start $_SESSION
session_start();
   
   //Reference function.php that holds all code to process the form data
   include("functions.php");
   $message = "";
   
   //Added for Assignment #10
   //Doing some PHP validation before the form data is processed on the server
   function phpvalidate($data)
   {
      $errors = "";
	  if ($data["CustFirstName"] == "")
	  {
	     $errors .= "First name must have a value";
	  }
	  if ($data["CustLastName"] == "")
	  {
	     $errors .= "Last name must have a value";
	  }
	  if ($data["CustAddress"] == "")
	  {
	     $errors .= "Address must have a value";
	  }
	  if ($data["CustCity"] == "")
	  {
		 $errors .= "City must have a value";
	  }
	  if ($data["CustProv"] == "")
	  {
		  $errors .= "Province must have a value";
	  }
	  if ($data["CustPostal"] == "")
	  {
		  $errors .= "Postal Code must have a value";
	  }
	  if ($data["CustCountry"] == "")
	  {
		  $errors .= "Country must have a value";
	  }
	  	  if ($data["CustHomePhone"] == "")
	  {
		  $errors .= "Home Phone must have a value";
	  }
	  	  if ($data["CustBusPhone"] == "")
	  {
		  $errors .= "Work Phone must have a value";
	  }
	  	  if ($data["CustEmail"] == "")
	  {
		  $errors .= "Email must have a value";
	  }
	  	  if ($data["CustUserName"] == "")
	  {
		  $errors .= "Username must have a value";
	  }
	  	  if ($data["CustPassword"] == "")
	  {
		  $errors .= "Password must have a value";
	  }
	  
	  return $errors;
   }
   //Here I am checking to see that the CustFirstName has a value.  If it isset then process for data and return message.
   if (isset($_REQUEST["CustFirstName"]))
   {
      $message = phpvalidate($_REQUEST);
	  if (!$message)
	  {
	     $message = insertCustomer($_REQUEST);
	  }
	  
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Register</title>
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

<!--Reference external file header.php-->
<header>
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

<!--Start register_wrapper-->
<div class="register_wrapper">
	<p id="error"><?php print($message); ?></p>
	
	<!--Build Form - Assignment #2 and #4-->
	<!--Not using bouncer but writing to database instead-->
		<form id="customerForm" name="customerForm" method="get" action="">
			<div class="form-group">
				<legend>New Customer Sign Up</legend>
					<div id="cust_info">
						<label for ="CustFirstName">First Name:</label><input type="text" name="CustFirstName" id="CustFirstName" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="CustLastName">Last Name:</label><input type="text" name="CustLastName" id="CustLastName" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="CustAddress">Address:</label><input type="text" name="CustAddress" id="CustAddress" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="CustCity">City:</label><input type="text" name="CustCity" id="CustCity" size="40" class="form-control" onfocus="displayMessage(this.name)"></br>
						<label for ="CustProv">Province:</label>
						<select name="CustProv" id="CustProv" class="form-control">
							<option value="AB">Alberta</option>
							<option value="BC">British Columbia</option>
							<option value="SK">Saskatchewan</option>
							<option value="MB">Manitoba</option>
							<option value="ON">Ontario</option>
							<option value="QC">Quebec</option>
							<option value="NS">Nova Scotia</option>
							<option value="NB">New Brunswick</option>
							<option value="NFLD">Newfoundland</option>
							<option value="PEI">PEI</option>
						</select><br />
						<label for ="CustPostal">Postal Code:</label><input type="text" name="CustPostal" id="CustPostal" class="form-control"size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="CustCountry">Country:</label><input type="text" name="CustCountry" id="CustCountry" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="CustHomePhone">Home Phone:</label><input type="text" name="CustHomePhone" id="CustHomePhone" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="CustBusPhone">Work Phone:</label><input type="text" name="CustBusPhone" id="CustBusPhone" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="CustEmail">Email:</label><input type="text" name="CustEmail" id="CustEmail" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="CustUserName">Username:</label><input type="text" name="CustUserName" id="CustUserName" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
						<label for ="CustPassword">Password:</label><input type="password" name="CustPassword" id="CustPassword" class="form-control" size="40" onfocus="displayMessage(this.name)"></br>
			
					</div>
			</div>

			<legend>Submit Form</legend>
			<!--onClick events added for Assignment #4-->
			<input type="submit" value="Submit Form" class="btn btn-default" onclick="return confirm('Are you sure you want to Submit the form?')" />
			<input type="reset" value="Clear Form"  class="btn btn-default"  onclick="return confirm('Are you sure you want to clear the form?')"/>
		</form>
</div>
<!--End register_wrapper-->

<div id="regFloatReset"></div>
<div class="spacer"></div>

<!--Reference external file footer.php-->
<footer class="site-footer">
<?php
	include("footer.php");
?>
</footer>

</body>
</html>