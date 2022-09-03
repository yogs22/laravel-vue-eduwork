<?php
    include_once("../connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
?>

<html>
    <head>
        <title>Pengarang</title>
    </head>
    <body>
        <center>
            <a href="../">Buku</a> |
            <a href="index.php">Penerbit</a> |
            <a href="../pengarang/">Pengarang</a> |
            <a href="../katalog/">Katalog</a>
            <hr>
        </center>

        <a href="add.php">Tambah Pengarang</a><br><br>

        <table width="80%" border=1>
            <tr>
                <th>ID Pengarang</th>
                <th>Nama Pengarang</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
            <?php
                while($pengarang_data = mysqli_fetch_array($pengarang)){
                    echo "<tr>";
                    echo "<td>".$pengarang_data['id_pengarang']."</td>";
                    echo "<td>".$pengarang_data['nama_pengarang']."</td>";
                    echo "<td>".$pengarang_data['email']."</td>";
                    echo "<td>".$pengarang_data['telp']."</td>";
                    echo "<td>".$pengarang_data['alamat']."</td>";
                    echo "<td><a href='edit.php?id_pengarang=$pengarang_data[id_pengarang]'>Edit</a> | <td><a href='delete.php?id_pengarang=$pengarang_data[id_pengarang]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>