<?php

require_once("lib/connectDB.php");
require_once("lib/query.php");

// Get the submitted data
$pelapor = $_POST["pelapor"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];

// File upload handling
$targetDir = "uploads/"; // Change this to the directory where you want to save the uploaded images
// Rename image to ...
$latestID = getLatestID();
$renameTo = "laporan" . $latestID;
$targetFile = $targetDir . $renameTo . "." . strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false) {
	$uploadOk = 1;
} else {
	$uploadOk = 0;
}

// Check if file already exists
if (file_exists($targetFile)) {
	$uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
	$uploadOk = 0;
}

// Allow only certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	$uploadOk = 0;
}

// If everything is OK, try to upload the file
if ($uploadOk == 1) {
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
		// File was uploaded successfully
		// Now you can save the data to a database or perform any other necessary actions
		// For demonstration purposes, let's just output the data
		echo "Data received:<br>";
		echo "Pelapor: " . $pelapor . "<br>";
		echo "Latitude: " . $latitude . "<br>";
		echo "Longitude: " . $longitude . "<br>";
		echo "Image uploaded: ". $targetFile;
		
		insertLocation($pelapor, $targetFile, $latitude, $longitude);			
		
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
} else {
	echo "Sorry, your file was not uploaded.";
}

require_once("lib/disconnectDB.php");

?>
