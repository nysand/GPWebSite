<?php
$connection = mysqli_connect("localhost", "root", "");

if (!$connection) {
	echo "Failed to connect to database!". die(mysqli_error($connection));
}

$dbselect = mysqli_select_db($connection, "over_surgery_db");

if (!$dbselect) {
	echo "Failed to connect to database!". die(mysqli_error($connection));
}

?>