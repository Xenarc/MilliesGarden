<?php

include "util.php";

$email = escape($_POST["email"]);

$sql = "SELECT * FROM `customers` WHERE email='" . $email . "';";
$result = requestDB($sql);

if(sizeof($result) == 0){
	echo "1"; // FIXME: back to 0
	// echo $result;
	echo sizeof($result);
	echo $email;
}
else{
	echo 1;
	echo $result[0]["fName"];
	echo " ";
	echo $result[0]["lName"];
	echo "\n";
	echo $result[0]["number"];
	echo " ";
	echo $result[0]["street"];
	echo " ";
	echo $result[0]["city"];
	echo ", ";
	echo $result[0]["state"];
	echo ", ";
	echo $result[0]["postCode"];
	echo ", ";
	echo $result[0]["country"];
}


?>
