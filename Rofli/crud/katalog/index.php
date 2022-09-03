<?php
    include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<html>
    <head>
        <title>Katalog</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body style="padding:0px 100px 0px 100px;">
        <center class="navbar col-4 mx-auto">
            <a class="btn btn-light" href="../">Buku</a> |
            <a class="btn btn-light" href="../penerbit">Penerbit</a> |
            <a class="btn btn-light" href="../pengarang/">Pengarang</a> |
            <a class="btn btn-secondary" href="../katalog/">Katalog</a>
            <hr>
        </center>

        <a class="btn btn-sm btn-primary" href="add.php">+ Tambah Katalog</a><br><br>

        <table class="table table-sm">
            <tr>
                <th>ID Katalog</th>
                <th>Nama Katalog</th>
                <th style="text-align:center;" colspan='2'>Aksi</th>
            </tr>
            <?php
                while($katalog_data = mysqli_fetch_array($katalog)){
                    echo "<tr>";
                    echo "<td>".$katalog_data['id_katalog']."</td>";
                    echo "<td>".$katalog_data['nama']."</td>";
                    echo "<td><a class='btn btn-sm btn-warning' href='edit.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> <td><a class='btn btn-sm btn-danger' href='delete.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>