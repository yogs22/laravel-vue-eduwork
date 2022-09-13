<?php
$server = "localhost";
$username = "root";
$password = "password";
$database = "lab";

// Create connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>
