<?php



function escape(string $string){
	$string = htmlspecialchars($string);
	$string = str_replace('"', "", $string);
	$string = str_replace("'", "", $string);
	return $string;
}

function requestDB(string $sql){
	// DB login data
	$servername = "localhost";
	$username = "milliesgarden";
	$password = "JDHkUBqYzmcz33Mp";
	$dbname = "milliesgarden";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	// Get Data
	$data = array();
	$result = mysqli_query($conn, $sql);

	// Check if you have a SQL Error
	if(!$result){
		printf("SQL failed: %s\n", mysqli_error());
		exit();
	}
	
	if($result === TRUE){
		return $data;
	}
	
	// Get data from $result
	if ($result->num_rows > 0) {
		// Loop through all of the data and put it into $data
		for ($n = 0; $n <= mysqli_num_rows($result); $n++) {
			$data[$n] = mysqli_fetch_assoc($result);
		}
	}
	
	// Close connection
	mysqli_close($conn);
	
	// Return the SQL data
	return $data;
}

?>
