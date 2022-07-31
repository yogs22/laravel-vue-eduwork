<?php
include_once("connect.php");
 
$isbn = $_GET['id_pengarang'];
 
$result = mysqli_query($mysqli, "DELETE FROM pengarang WHERE id_pengarang='$isbn'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pengarang.php");
?>