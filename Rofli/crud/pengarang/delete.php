<?php
    include_once("../connect.php");
    $id_pengarang = $_GET['id_pengarang'];
    mysqli_query($mysqli, "DELETE FROM pengarang WHERE id_pengarang='$id_pengarang'");
    header("Location:index.php");
?>