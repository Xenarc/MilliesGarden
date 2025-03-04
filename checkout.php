<?php

require_once('util.php');

$email = escape($_POST["email"]);
$phone = escape($_POST["phone"]);
$country = escape($_POST["country"]);
$postcode = escape($_POST["postcode"]);
$state = escape($_POST["state"]);
$city = escape($_POST["city"]);
$extraInfo = escape($_POST["extraAddressInfo"]);
$orderNotes = escape($_POST["orderNotes"]);
$potId = escape($_POST["potId"]);
$updateDetails = (bool) escape($_POST["updateDetails"]); // Update = 1 or keep = 0;
$newUser = (bool) escape($_POST["newUser"]);

// $extraInfo = $extraInfo === "" ? "" : $extraInfo;
// $orderNotes = $orderNotes === "" ? "" : $orderNotes;

$fName = split_name(escape($_POST["name"]))[0];
$lName = split_name(escape($_POST["name"]))[1];

$streetNo = explode(' ',trim(escape($_POST["streetAddress"])))[0];
$street = substr(strstr(escape($_POST["streetAddress"])," "), 1);

// $delivery = ;
// $orderTotal = ;
// $shippingCost = ;


// Manage Customer Records
if($newUser){
	if(checkIfUserExists($email)){
		// They have refreshed the page but the data has already been inserted
	}else{
		$sql = "INSERT INTO `customers` (`custId`, `dateCreated`, `fName`, `lName`, `email`, `phone`, `country`, `postCode`, `state`, `city`, `street`, `number`, `extraAddressInfo`, `emailNewsletter`) VALUES (NULL, CURRENT_TIMESTAMP, '" . $fName . "', '" . $lName . "', '" . $email . "', '" . $phone . "', '" . $country . "', '" . $postcode . "', '" . $state . "', '" . $city . "', '" . $street . "', '" . $streetNo . "', '" . $extraInfo . "', '0');";
		requestDB($sql);
	}
	
}else{
	if($updateDetails){
		$sql = "UPDATE `customers` SET `fName`='" . $fName . "', `lName`='" . $lName . "', `email`='" . $email . "', `phone`='" . $phone . "', `country`='" . $country . "', `postCode`='" . $postcode . "', `state`='" . $state . "', `city`='" . $city . "', `street`='" . $street . "', `number`='" . $streetNo . "', `extraAddressInfo`='" . $extraInfo . "', `emailNewsletter`='0' WHERE `email`='" . $email . "';";
		requestDB($sql);
		
	}else{
		// Keeping old record, don't bother updating DB.
	}
}

// Fetch order cost
$sql = "SELECT * FROM `pots` WHERE `potId`=" . $potId . ";";
$pot = requestDB($sql)[0];
$orderTotal = $pot["price"];
$qty = $pot["qtyAvailable"];
if($qty == 0){
	// Should never happen
	echo "Error, no more of that pot is available :(";
	die();
}

$shippingCost = 0;
$delivery = 0;


// Get CustomerId
$sql = "SELECT * FROM `customers` WHERE `email`='" . $email . "';";
$custId = requestDB($sql)[0]["custId"];

// Create a Sales Record
$sql = "INSERT INTO `sales` (`saleId`, `potId`, `custId`, `dateStarted`, `dateOrdered`, `dateDelivered`, `orderTotal`, `shippingCost`, `delivery`, `orderNotes`) 
				VALUES (NULL, '". $potId ."', '" . $custId . "', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, '" . $orderTotal . "', '" . $shippingCost . "', '" . $delivery . "', '" . $orderNotes . "');";
requestDB($sql);

// Decrement Qty

$qty -= 1;
$sql = "UPDATE `pots` SET `qtyAvailable`='" . $qty . "' WHERE `potId`='" . $potId . "';";
requestDB($sql);


// INSERT INTO 'customers' ('custId', 'dateCreated', 'fName', 'lName', 'email', 'phone', 'country', 'postCode', 'state', 'city', 'street', 'number', 'extraAddressInfo', 'emailNewsletter') VALUES (NULL, CURRENT_TIMESTAMP, 'Mark', 'Blashki', 'markblashki1@gmail.com', '+61 0490 193 446', 'Australia', '3134', 'Victoria', 'Warranwood', 'Brysons road', '62', NULL, '0');
// INSERT INTO 'pots' ('potId', 'imageUrl', 'potName', 'price', 'potDescription', 'potSize', 'qtyAvailable') VALUES (NULL, './img/pots/POT1.jpg', 'Concrete Rectangle', '19.95', 'A long rectangluar pot which is suited to big arrangements', '2', '3');
// INSERT INTO `sales` (`saleId`, `potId`, `custId`, `dateStarted`, `dateOrdered`, `dateDelivered`, `orderTotal`, `shippingCost`, `delivery`, `orderNotes`) VALUES (NULL, '1', '160', NOW(), NOW(), NULL, '54', '5', '1', 'Delivery Yes and other order notes here');

function split_name($name){
	$array = explode(' ',trim($name));
	$first_name = $array[0];
	unset($array[0]);
	$last_names = implode(' ', $array);
	return array($first_name, $last_names);
}

?>
