<div class="contact_wrapper">
<?php
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
	
	//Build Query
	$sql = "SELECT * FROM agents";
	
	//Execute Query
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
	//Check for Agency ID.  Want to split Calgary and Okotoks in two tables
	if($row["AgencyId"]=='1'){
		echo("<table class='tblCalgary'>
		<tr><td><input type='hidden' id='AgentId' name='AgentId' value=".$row["AgentId"]."</td></tr>
		<tr><td id='AgtName'><h2>".$row["AgtFirstName"]. " " .$row["AgtLastName"]."</h2></td></tr>
		<tr><td id='AgtPhone'>".$row["AgtBusPhone"]. "</td></tr>
		<tr><td id='AgtEmail'>".$row["AgtEmail"]."</td></tr>
		<tr><td id='AgtPosition'>".$row["AgtPosition"]."</td></tr>
		<tr><td>Calgary Office</td></tr>
		</table>");
		}else{
		echo("<table class='tblOkotoks'>
		<tr><td><input type='hidden' id='AgentId' name='AgentId' value=".$row["AgentId"]."</td></tr>
		<tr><td id='AgtName'><h2>".$row["AgtFirstName"]. " " .$row["AgtLastName"]."</h2></td></tr>
		<tr><td id='AgtPhone'>".$row["AgtBusPhone"]. "</td></tr>
		<tr><td id='AgtEmail'>".$row["AgtEmail"]."</td></tr>
		<tr><td id='AgtPosition'>".$row["AgtPosition"]."</td></tr>
		<tr><td>Okotoks Office</td></tr>
		</table>");
		}
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
	