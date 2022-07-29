<?php
$servername = "localhost";
$database = "perpusdb";
$username = "root";
$password = "";

//*create* connection
$conn = mysqli_connect ($servername, $username, $password, $database);

//*check* connection
if (!$conn) {
    die("connection failed: ". mysqli_connect_error());
}

//echo "Connect successfully";
//mysqli_close($conn);

$sql = "SELECT * FROM buku ORDER BY isbn DESc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Buku: " . $row["isbn"]. " " .$row["judul"]. " " . $row["tahun"] . " " .$row["qty_stok"] . " " .$row["harga_pinjam"] . "<br>";
    }
} else {
    echo "0 result";
}

$sql2 = "SELECT * FROM penerbit where nama_penerbit like '%Penerbit 01%'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    //output data of each row
    while($row2 = $result->fetch_assoc()) {
        echo "Penerbit: " . $row2["nama_penerbit"]. " " .$row2["email"]. "<br>";
    }
} else {
    echo "0 result";
}
$conn->close();
 
?>