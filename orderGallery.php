<?php


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

// Get search parameters
$small = strip_tags($_POST["small"]); // comes in as 0 or 1 (True or False)
$medium = strip_tags($_POST["medium"]);
$large = strip_tags($_POST["large"]);

// SQL Query
$sql = "SELECT * FROM pots WHERE qtyAvailable>=0";	// TODO: make an "Out of Stock visual"

if($small + $medium + $large > 0){ // FIXME: maybe is Char?
	$sql .= " AND (";
	$sql .= $small == 1 ? "potSize=1 OR " : "";
	$sql .= $medium == 1 ? "potSize=2 OR " : "";
	$sql .= $large == 1 ? "potSize=3 OR " : "";
	
	$sql = substr($sql, 0, -4);
	$sql .= ")";
}
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
	while($row = $result->fetch_assoc()) {
		echo "<div id='potId" . $row["potId"] . "' class='orderGalleryImage'><img class='shadow' src='" . $row["imageUrl"] . "'/></div>";
	}
} else {
	// No records => no products :(
	echo "No Products Available"; // TODO: Style this text
}
$conn->close();

// INSERT INTO 'customers' ('custId', 'dateCreated', 'fName', 'lName', 'email', 'phone', 'country', 'postCode', 'state', 'city', 'street', 'number', 'extraAddressInfo', 'emailNewsletter') VALUES (NULL, CURRENT_TIMESTAMP, 'Mark', 'Blashki', 'markblashki1@gmail.com', '+61 0490 193 446', 'Australia', '3134', 'Victoria', 'Warranwood', 'Brysons road', '62', NULL, '0');
// INSERT INTO 'pots' ('potId', 'imageUrl', 'potName', 'price', 'potDescription', 'potSize', 'qtyAvailable') VALUES (NULL, './img/pots/POT1.jpg', 'Concrete Rectangle', '19.95', 'A long rectangluar pot which is suited to big arrangements', '2', '3');

?>
