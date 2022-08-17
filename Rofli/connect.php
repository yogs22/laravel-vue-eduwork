<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "SELECT * FROM anggota";
$result = $conn->query($sql);

if($result->num_rows > 0 ){
    while($row = $result->fetch_assoc()){
        echo "Nama: ".$row["nama"].", Alamat: ".$row["alamat"]."<br>";
    }
}else{
    echo "0 Result";
}

echo "<br><br><br>";

$sql = "SELECT * FROM penerbit";
$result = $conn->query($sql);

if($result->num_rows > 0 ){
    while($row = $result->fetch_assoc()){
        echo "Nama: ".$row["nama_penerbit"].", Alamat: ".$row["alamat"]."<br>";
    }
}else{
    echo "0 Result";
}

mysqli_close($conn);

mysqli_close($conn);

?>