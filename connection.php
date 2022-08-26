<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check Connection
if (!$conn) {
	die("connection failed:" . mysql_connect_error());
}

//echo "connected Successfully";
//mysqli_close($conn);

$sql = "SELECT * FROM pengarang";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
	 echo "". $row["id_pengarang"]. " " . $row["nama_pengarang"]. " " . $row["alamat"]. "<br>";
		} 
	}	else {
		echo "0 result";
	}
	$conn->close();



?>
