<?php

include 'util.php';

$email = escape($_POST["email"]);
$phone = escape($_POST["phone"]);
$country = escape($_POST["country"]);
$postcode = escape($_POST["postcode"]);
$state = escape($_POST["state"]);
$city = escape($_POST["city"]);
$extraInfo = escape($_POST["extraAddressInfo"]);
$orderNotes = escape($_POST["orderNotes"]);
$potId = escape($_POST["potId"]);
$updateDetails = (bool) escape($_POST["updateDetails"]);

$fName = split_name(escape($_POST["name"]))[0];
$lName = split_name(escape($_POST["name"]))[1];

$streetNo = explode(' ',trim(escape($_POST["streetAddress"])))[0];
$street = substr(strstr(escape($_POST["streetAddress"])," "), 1);

// $delivery = ;
// $orderTotal = ;
// $shippingCost = ;

// Check if user exists


// INSERT INTO 'customers' ('custId', 'dateCreated', 'fName', 'lName', 'email', 'phone', 'country', 'postCode', 'state', 'city', 'street', 'number', 'extraAddressInfo', 'emailNewsletter') VALUES (NULL, CURRENT_TIMESTAMP, 'Mark', 'Blashki', 'markblashki1@gmail.com', '+61 0490 193 446', 'Australia', '3134', 'Victoria', 'Warranwood', 'Brysons road', '62', NULL, '0');
// INSERT INTO 'pots' ('potId', 'imageUrl', 'potName', 'price', 'potDescription', 'potSize', 'qtyAvailable') VALUES (NULL, './img/pots/POT1.jpg', 'Concrete Rectangle', '19.95', 'A long rectangluar pot which is suited to big arrangements', '2', '3');

function split_name($name){
	$name = trim($name);
	$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
	$first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
	return array($first_name, $last_name);
}

?>
