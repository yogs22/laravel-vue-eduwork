<?php

include "connect.php";

$nama = $_POST['nama'];
$status = $_POST['status'];

var_dump($nama, $status);

$process = mysqli_query($conn, "UPDATE `status` SET
    nama = '".$nama."',
    status = '".$status."'
    WHERE id = ".$_GET['id']."
");

if ($process) {
  return header('Location: index.php');
}

?>
