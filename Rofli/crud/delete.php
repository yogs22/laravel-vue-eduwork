<?php
    include_once("connect.php");
    $isbn = $_GET['isbn'];
    mysqli_query($mysqli, "DELETE FROM buku WHERE isbn='$isbn'");
    header("Location:index.php");
?>