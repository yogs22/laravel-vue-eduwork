<?php
include_once("connect.php");
 
$isbn = $_GET['id_katalog'];
 
$result = mysqli_query($mysqli, "DELETE FROM katalog WHERE id_katalog='$isbn'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:katalog.php");
?>