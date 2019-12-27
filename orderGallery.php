<?php


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


$sql = "SELECT * FROM pots WHERE qtyAvailable>=0";
$result = $conn->query($sql);

if (!$result) {
	trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
				echo "<div class='orderGalleryImage'><img src='" . $row["imageUrl"] . "'/></div>";
    }
} else {
    echo "No Products Available";
}
$conn->close();

// INSERT INTO `customers` (`custId`, `dateCreated`, `fName`, `lName`, `email`, `phone`, `country`, `postCode`, `state`, `city`, `street`, `number`, `extraAddressInfo`, `emailNewsletter`) VALUES (NULL, CURRENT_TIMESTAMP, 'Mark', 'Blashki', 'markblashki1@gmail.com', '+61 0490 193 446', 'Australia', '3134', 'Victoria', 'Warranwood', 'Brysons road', '62', NULL, '0');
// INSERT INTO `pots` (`potId`, `imageUrl`, `potName`, `price`, `potDescription`, `potSize`, `qtyAvailable`) VALUES (NULL, './img/pots/POT1.jpg', 'Concrete Rectangle', '19.95', 'A long rectangluar pot which is suited to big arrangements', '2', '3');

?>