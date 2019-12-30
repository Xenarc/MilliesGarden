<?php
include 'util.php';

$email = escape($_POST["email"]);
$phone = escape($_POST["phone"]);
$country = escape($_POST["country"]);
$postCode = escape($_POST["postcode"]);
$state = escape($_POST["state"]);
$city = escape($_POST["city"]);
$extraInfo = escape($_POST["extraAddressInfo"]);
$orderNotes = escape($_POST["orderNotes"]);
$potId = escape($_POST["potId"]);

$fName = split_name(escape($_POST["name"]))[0];
$lName = split_name(escape($_POST["name"]))[1];

// $street = $POST_[""];
// $number = ;

// $custId = ;

// $delivery = ;
// $orderTotal = ;
// $shippingCost = ;

// $emailNewsletter = ;

// DB and Server Stuff
$servername = "localhost";
$username = "milliesgarden";
$password = "JDHkUBqYzmcz33Mp";
$dbname = "milliesgarden";


die();


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// SQL Query
$sql = "INSERT INTO 'customers' ('custId', 'dateCreated', 'fName', 'lName', 'email', 'phone', 'country', 'postCode', 'state', 'city', 'street', 'number', 'extraAddressInfo', 'emailNewsletter') VALUES (NULL, CURRENT_TIMESTAMP, 'Mark', 'Blashki', $email, $phone, $country, $postcode, $state, $city, 'Brysons road', '62', $extraInfo, '0')";

// Query the DB
$result = $conn->query($sql);

// If bad query Argh!
if (!$result) {
	trigger_error('Invalid query: ' . $conn->error);
	die();
}

////// Getting Data
// // If 1 more more records exist:
// if ($result->num_rows > 0) {
// 	// Output data of each row
// 	while($row = $result->fetch_assoc()) {
// 		echo "<div id='potId" . $row["potId"] . "' class='orderGalleryImage'><img class='shadow' src='" . $row["imageUrl"] . "'/></div>";
// 	}
// } else {
// 	// No records => no products :(
// 	echo "No Products Available"; // TODO: Style this text
// }
// $conn->close();

// INSERT INTO 'customers' ('custId', 'dateCreated', 'fName', 'lName', 'email', 'phone', 'country', 'postCode', 'state', 'city', 'street', 'number', 'extraAddressInfo', 'emailNewsletter') VALUES (NULL, CURRENT_TIMESTAMP, 'Mark', 'Blashki', 'markblashki1@gmail.com', '+61 0490 193 446', 'Australia', '3134', 'Victoria', 'Warranwood', 'Brysons road', '62', NULL, '0');
// INSERT INTO 'pots' ('potId', 'imageUrl', 'potName', 'price', 'potDescription', 'potSize', 'qtyAvailable') VALUES (NULL, './img/pots/POT1.jpg', 'Concrete Rectangle', '19.95', 'A long rectangluar pot which is suited to big arrangements', '2', '3');













function split_name($name){
	$name = trim($name);
	$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
	$first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
	return array($first_name, $last_name);
}

?>
