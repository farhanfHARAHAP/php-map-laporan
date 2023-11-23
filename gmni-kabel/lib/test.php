<?php

// Connect to database
$servername = "localhost";  // Replace with your database server name
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "gmni-kabel";  // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// ---!TEST STARTS FROM HERE!---

require_once "query.php"; // Include the file containing the function

/*
$author = "syarifudin";
$imageLink = "gdrive.com";
$coor_x = "-6.22833";
$coor_y = "106.75570";
insertLocation($author, $imageLink, $coor_x, $coor_y); // Call the function
*/

/*
$id = "2";
getLocation($id);
*/

/*
getLocations();
*/



// ---!TEST ENDS FROM HERE!---


// Disconnect from database
$conn->close();

?>