<?php

include "connect.php";

$nama = $_POST['nama'];
$status = $_POST['status'];

var_dump($nama, $status);

$process = mysqli_query($conn, "INSERT INTO `status` (`id`, `nama`, `status`) VALUES (NULL, '".$nama."', '".$status."')");

if ($process) {
  return header('Location: index.php');
}

?>
