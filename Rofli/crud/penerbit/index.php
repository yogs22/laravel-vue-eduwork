<?php
    include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
?>

<html>
    <head>
        <title>Penerbit</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body style="padding:0px 100px 0px 100px;">
        <center class="navbar col-4 mx-auto">
            <a class="btn btn-light" href="../">Buku</a> |
            <a class="btn btn-secondary" href="../penerbit/">Penerbit</a> |
            <a class="btn btn-light" href="../pengarang/">Pengarang</a> |
            <a class="btn btn-light" href="../katalog/">Katalog</a>
            <hr>
        </center>

        <a class="btn btn-sm btn-primary" href="add.php">+ Tambah Penerbit</a><br><br>

        <table class="table table-sm" width="80%">
            <tr>
                <th>ID Penerbit</th>
                <th>Nama Penerbit</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th style="text-align:center;" colspan='2'>Aksi</th>
            </tr>
            <?php
                while($penerbit_data = mysqli_fetch_array($penerbit)){
                    echo "<tr>";
                    echo "<td>".$penerbit_data['id_penerbit']."</td>";
                    echo "<td>".$penerbit_data['nama_penerbit']."</td>";
                    echo "<td>".$penerbit_data['email']."</td>";
                    echo "<td>".$penerbit_data['telp']."</td>";
                    echo "<td>".$penerbit_data['alamat']."</td>";
                    echo "<td><a class='btn btn-sm btn-warning' href='edit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> <td><a class='btn btn-sm btn-danger' href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>