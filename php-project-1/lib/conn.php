<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "ssbphp";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn -> connect_error) {

	die($conn -> error);
	
} else {

	// echo "<h3>Database Connected!</h3>";

}

?>