<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travels_and_trains";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
