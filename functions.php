<!--
Author: Mark Wilson
File: functions.php
Assignment: #9, 10, 11
SAIT OOSD Spring Track 2015
-->
<?php
// Check the session if user is logged in
// If logged in, send alert.
	if (isset($_SESSION["isloggedIn"])){
		//phpAlert("You are already logged in.");
	}
	
	//send a JavaScript alert box
	//function phpAlert($alert) {
    //echo '<script type="text/javascript">alert("' . $alert . '")</script>';
	//}
	
	if(isset($_POST["submit"])) {
		$_SESSION = array();
		session_destroy();
	}

//Create New Customer
//Assignment #10 - additional feature
//Using prepared statement method
   function insertCustomer($custdata)
   {
	//SQL connection variables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "travelexperts";
	
	//myslqi connection and prepared statement
	$dbh = @mysqli_connect($servername,$username,$password)
    or die("Connect Error: " . mysqli_connect_error());
	mysqli_select_db($dbh, $dbname);
	  
    $colnames = array_keys($custdata);
	$colnamestring = implode(", ", $colnames);
	$sql = "insert into customers ($colnamestring) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	$stmt = mysqli_prepare($dbh, $sql);
	$values = array_values($custdata);
	mysqli_stmt_bind_param($stmt, "ssssssssssss", $values[0], $values[1], $values[2], $values[3], $values[4], $values[5], $values[6], $values[7], $values[8], $values[9], $values[10], $values[11]);
	$result = mysqli_stmt_execute($stmt);
	  //print(mysqli_error($dbh));
	  //print("result=$result");

	  //print($sql);
		 
	mysqli_close($dbh);

	if ($result){
		return "A new customer account was created successfully<br />";
	}
	else{
		return "Failed to create new customer account<br />";
	}//End If
}//End Function
 
//Create New Agent
//Assignment #10
//Using prepared statement method
   function insertAgent($agtdata)
   {
	//SQL connection variables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "travelexperts";
	
	//myslqi connection and prepared statement
	  $dbh = @mysqli_connect($servername,$username,$password)
         or die("Connect Error: " . mysqli_connect_error());
	  mysqli_select_db($dbh, $dbname);
	  
      $colnames = array_keys($agtdata);
	  $colnamestring = implode(", ", $colnames);
	  $sql = "insert into agents ($colnamestring) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";//number of ? needs to match the number of fields

	  $stmt = mysqli_prepare($dbh, $sql);
	  $values = array_values($agtdata);
	  mysqli_stmt_bind_param($stmt, "ssssssiss", $values[0], $values[1], $values[2], $values[3], $values[4], $values[5], $values[6], $values[7], $values[8]);// the number of s or i (string or int or other) needs to match the number and type of fields
	  $result = mysqli_stmt_execute($stmt);
	  //print(mysqli_error($dbh));
	  //print("result=$result");

	  //print($sql);

	  mysqli_close($dbh);

	  //Return messages if successful or unsuccessful
	  if ($result)
	  {
	     return "A new agent account was created successfully<br />";
	  }
	  else
	  {
	     return "Failed to create new agent account<br />";
	  }
   }

//Agent LogIn
//Added for Assignment #11
	function agentLogIn($logInData)
   {
	 //get input from form
	$userid = $_REQUEST["AgtUserName"];
	$userpassword = $_REQUEST["AgtPassword"];
	
	//SQL connection variables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "travelexperts";
	
	//Create connection_
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	//Check connection
	if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
	}
	//echo "Connected Successfully";

	$sql = "SELECT * FROM agents WHERE AgtUserName = '$userid'  AND AgtPassword  = '$userpassword'";
	$result = $conn->query($sql);
	
	//Count rows returned for testing
    $row_cnt = $result->num_rows;
    //printf("Result set has %d rows.\n", $row_cnt);

	$row = mysqli_fetch_assoc($result);
	
	//Pass to variables
	$result_user = $row['AgtUserName'];
	$result_pswd = $row['AgtPassword'];
	$result_firstname = $row['AgtFirstName'];

	//Added for Assignment #11
	if(($userid == $result_user) && ($userpassword == $result_pswd)){
		header("Location: agent.php");		//Redirect to agents.php page if successful
		$_SESSION["isloggedIn"] = true;		//Set session variable for if login successful
		$_SESSION['Username'] = $result_user;	//Set session variable for username
		$_SESSION['Firstname'] = "Welcome " . $result_firstname;	// Welcome message will be displayed in header
	
	//Return messages if successful or unsuccessful
	return "Login successful.<br />";
	}else{
	return "Login Failed.  One of the fields do not match our records.<br />";
	}//end if
	$conn->close();
}

//Customer LogIn
//Added for Assignment #11 - additional feature
	function customerLogIn($logInData)
   {
	 //get input from form
	$userid = $_REQUEST["CustUserName"];
	$userpassword = $_REQUEST["CustPassword"];
	
	//SQL connection variables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "travelexperts";
	
	//Create connection_
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	//Check connection
	if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
	}
	//echo "Connected Successfully";

	//Build query string
	$sql = "SELECT * FROM customers WHERE CustUserName = '$userid'  AND CustPassword  = '$userpassword'";
	
	//Execute query
	$result = $conn->query($sql);
	
	//Count rows returned for testing
    $row_cnt = $result->num_rows;
    //printf("Result set has %d rows.\n", $row_cnt);

	$row = mysqli_fetch_assoc($result);
	
	//Pass to row results to variables
	$result_user = $row['CustUserName'];
	$result_pswd = $row['CustPassword'];
	$result_firstname = $row['CustFirstName'];

	//Added for Assignment #11
	if(($userid == $result_user) && ($userpassword == $result_pswd)){
		header("Location: index.php");		//Redirect to index.php page if successful.
		$_SESSION["isloggedIn"] = true;		//Set session variable for if login successful
		$_SESSION['Username'] = $result_user;	//Set session variable for username
		$_SESSION['Firstname'] = "Welcome " . $result_firstname;	// Welcome message will be displayed in header
		
		return "Login successful.<br />";
	}else{
		return "Login Failed.  One of the fields do not match our records.<br />";
	}//end if
	$conn->close();
}

//destroy $SESSION function called when Log Out button is clicked
function logout(){
	session_destroy();
}

?>