<!--
Author: Mark Wilson
File: vacations.php
SAIT OOSD Spring Track 2015
-->
<div class="package_wrapper">
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
	
	$sql = "SELECT PackageId, PkgName, PkgStartDate, PkgEndDate, PkgDesc, PkgBasePrice, PkgImage, ImgUrl FROM packages";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo("<table id='vac_pkg' class='item'>
	<tr><td><input type='hidden' id='PackageId' name='PackageId' value=".$row["PackageId"]."</td></tr>
	<tr><td><input type='hidden' id='TripType' name='TripType' value='L'</td></tr>
	<tr><td><input type='hidden' id='BookingNo' name='BookingNo' value='EWR4455'</td></tr>
	<tr><td><img id='pkgpic' onclick='openWindow(".$row['ImgUrl'].")' src=".$row["PkgImage"]."></td></tr>
	<tr><td id='PkgName'><h2>".$row["PkgName"]."</h2></td></tr>
	<tr><td id='PkgDesc'>".$row["PkgDesc"]."</td></tr>
	<tr><td id='PkgStartDate'>Start Date:". date('Y-m-d',strtotime($row["PkgStartDate"]))."</td></tr>
	<tr><td id='PkgEndDate'>End Date:". date('Y-m-d',strtotime($row["PkgEndDate"]))."</td></tr>
	<tr><td id='PkgBasePrice'>Starting at: CAD \$ ". number_format($row["PkgBasePrice"], 2)."</td></tr>
	</table>");
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
	