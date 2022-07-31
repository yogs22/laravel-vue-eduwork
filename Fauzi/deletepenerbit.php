<?php
include_once("connect.php");
 
$isbn = $_GET['id_penerbit'];
 
$result = mysqli_query($mysqli, "DELETE FROM penerbit WHERE id_penerbit='$isbn'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:penerbit.php");
?>