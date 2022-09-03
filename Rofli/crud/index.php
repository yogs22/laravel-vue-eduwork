<?php
    include_once("connect.php");
    $buku = mysqli_query($mysqli, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog
        FROM buku
        LEFT JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang
        LEFT JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
        LEFT JOIN katalog ON katalog.id_katalog = buku.id_katalog
        ORDER BY judul ASC");
?>

<html>
    <head>
        <title>Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>

    <body style="padding:0px 100px 0px 100px;">
        <center class="navbar col-4 mx-auto">
            <a class="btn btn-secondary" href="index.php">Buku</a>
            <a class="btn btn-light" href="penerbit/">Penerbit</a>
            <a class="btn btn-light" href="pengarang/">Pengarang</a>
            <a class="btn btn-light" href="katalog/">Katalog</a>
            <hr>
        </center>

        <a class="btn btn-sm btn-primary" href="add.php">+ Add New Buku</a><br><br>

        <table width="80%" class="table table-sm">
            <tr>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Katalog</th>
                <th>Stok</th>
                <th>Harga Pinjam</th>
                <th style="text-align:center;" colspan='2'>Aksi</th>
            </tr>
            <?php
                while($buku_data = mysqli_fetch_array($buku)){
                    echo "<tr>";
                    echo "<td>".$buku_data['isbn']."</td>";
                    echo "<td>".$buku_data['judul']."</td>";
                    echo "<td>".$buku_data['tahun']."</td>";
                    echo "<td>".$buku_data['nama_pengarang']."</td>";
                    echo "<td>".$buku_data['nama_penerbit']."</td>";
                    echo "<td>".$buku_data['nama_katalog']."</td>";
                    echo "<td>".$buku_data['qty_stok']."</td>";
                    echo "<td>".$buku_data['harga_pinjam']."</td>";
                    echo "<td><a class='btn btn-sm btn-warning' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> <td><a class='btn btn-sm btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>