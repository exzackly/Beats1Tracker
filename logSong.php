<?php
require_once("dbconn.php");

$title = mysqli_escape_string($conn, $_GET['title']);
$artist = mysqli_escape_string($conn, $_GET['artist']);
$album = mysqli_escape_string($conn, $_GET['album']);
$artwork = $_GET['artwork'];

$sql = "SELECT id,playCount FROM Songs WHERE title='$title' AND artist='$artist' AND album='$album'";
$result = executeSQL($conn, $sql);
$row = $result->fetch_array(MYSQL_ASSOC);
if ($row == "") {
	$sql = "INSERT INTO Songs (title, artist, album, artwork) VALUES ('$title', '$artist', '$album', '$artwork')";
	echo executeSQL($conn, $sql) ? "Song logged" : "Error";
} else {
	$sql = "UPDATE Songs SET playCount=" . ($row['playCount']+1) . " WHERE id=" . $row['id'];
	echo executeSQL($conn, $sql) ? "Song logged" : "Error";
}

?>