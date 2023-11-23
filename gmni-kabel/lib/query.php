<?php
// This is dedicated query library

function getLatestID() {
	
	global $conn;
	$sql = "SELECT MAX(`loc_ID`) AS latest FROM `location`";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$result = intval($row['latest']) + 1; 
	$result = strval($result);
	
	return $result;
	
}

function insertLocation($author, $imageLink, $coor_x, $coor_y){
	
	global $conn;
	
	$sql = "INSERT INTO `location`(
		`author`, 
		`imageLink`, 
		`coor_x`, 
		`coor_y`) 
	VALUES (
		'".$author."',
		'".$imageLink."',
		'".$coor_x."',
		'".$coor_y."'); ";
	$result = $conn->query($sql);
	
}

function getLocations(){
	
	global $conn;
	
	$sql = "SELECT  
		`imageLink`, 		
		`coor_x`, 
		`coor_y` 
	FROM `location`;";
	$result = $conn->query($sql);
	
	return $result;
}


?>