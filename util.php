<?php
function escape(string $string){
	$string = htmlspecialchars($string);
	$string = str_replace('"', "", $string);
	$string = str_replace("'", "", $string);
	return $string;
}


?>
