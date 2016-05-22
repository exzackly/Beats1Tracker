<?php
// Imports $servername, $username, $password, and $dbname
require_once('dbcredentials.php');

// Takes an SQL query, and executes it on a connection
function executeSQL($conn, $sql) {
	$result = mysqli_query($conn, $sql);
	if ($result) {
		return $result;
	} else {
		die("Error: " . $sql . "<br>" . mysqli_error($conn));
	}
}

// Creates the specified database name, and Songs table
function createDBandTables($conn, $dbname) {
	//create Database if not exist
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	executeSQL($conn, $sql);

	$conn->select_db($dbname);

	//create songs table if not exist
	$sql = "CREATE TABLE IF NOT EXISTS Songs (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(100) NOT NULL,
	artist VARCHAR(100) NOT NULL,
	album VARCHAR(100),
	artwork VARCHAR(200),
	playCount INT DEFAULT 1,
	reg_date TIMESTAMP
	)";
	executeSQL($conn, $sql);
}

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

//ensure DB and Tables exist
createDBandTables($conn, $dbname);
?>