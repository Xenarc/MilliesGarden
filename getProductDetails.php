<?php
include 'util.php';

// DB and Server Stuff
$servername = "localhost";
$username = "milliesgarden";
$password = "JDHkUBqYzmcz33Mp";
$dbname = "milliesgarden";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// SQL Query
$potId = (int)escape($_POST["id"]);
$sql = "SELECT * FROM pots WHERE potId=" . $potId;

// Query the DB
$result = $conn->query($sql);

// If bad query Argh!
if (!$result) {
	trigger_error('Invalid query: ' . $conn->error);
	die();
}

// If 1 more more records exist:
if ($result->num_rows > 0) {
	// Output data of each row
	$row = $result->fetch_assoc();
	
	$row["potId"];
	$row["potName"];
	$row["price"];
	$row["potDescription"];
	$row["qtyAvailable"];
	$row["potSize"];
	
	echo "<h2>" . $row["potName"] . "</h2>\n<div class='plantDetailsExit' onclick='hidePlantDetails()'>x</div>\n<img src='" . $row["imageUrl"] . "' alt='" . $row["potName"] . "'>\n<h3>$" . $row["price"] . "</h3>\n<p>" . $row["potDescription"] . "</p>\n<br>\n<h4>POT SIZE: " . $row["potSize"] . "</h4>\n<br>\n<a id='buyButton' class=''>Purchase</a>";
	
} else {
	// No records => no products :(
	echo "NULL"; // TODO: Style this text
	echo $sql;
}

$conn->close();

?>
