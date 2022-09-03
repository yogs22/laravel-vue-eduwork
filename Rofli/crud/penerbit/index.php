<?php
    include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
?>

<html>
    <head>
        <title>Penerbit</title>
    </head>
    <body>
        <center>
            <a href="../">Buku</a> |
            <a href="../penerbit/">Penerbit</a> |
            <a href="../pengarang/">Pengarang</a> |
            <a href="../katalog/">Katalog</a>
            <hr>
        </center>

        <a href="add.php">Tambah Penerbit</a><br><br>

        <table width="80%" border=1>
            <tr>
                <th>ID Penerbit</th>
                <th>Nama Penerbit</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
            <?php
                while($penerbit_data = mysqli_fetch_array($penerbit)){
                    echo "<tr>";
                    echo "<td>".$penerbit_data['id_penerbit']."</td>";
                    echo "<td>".$penerbit_data['nama_penerbit']."</td>";
                    echo "<td>".$penerbit_data['email']."</td>";
                    echo "<td>".$penerbit_data['telp']."</td>";
                    echo "<td>".$penerbit_data['alamat']."</td>";
                    echo "<td><a href='edit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <td><a href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>