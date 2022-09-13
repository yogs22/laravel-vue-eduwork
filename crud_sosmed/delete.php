<?php
include "connect.php";

if ($_GET['id'] === null) {
  return Header("location: index.php");
}

mysqli_query($conn, "DELETE FROM status WHERE id = ". $_GET['id']);

return Header("location: index.php");

?>
