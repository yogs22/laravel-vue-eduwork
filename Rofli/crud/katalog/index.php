<?php
    include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<html>
    <head>
        <title>Katalog</title>
    </head>
    <body>
        <center>
            <a href="../">Buku</a> |
            <a href="../penerbit">Penerbit</a> |
            <a href="../pengarang/">Pengarang</a> |
            <a href="../katalog/">Katalog</a>
            <hr>
        </center>

        <a href="add.php">Tambah Katalog</a><br><br>

        <table width="80%" border=1>
            <tr>
                <th>ID Katalog</th>
                <th>Nama Katalog</th>
            </tr>
            <?php
                while($katalog_data = mysqli_fetch_array($katalog)){
                    echo "<tr>";
                    echo "<td>".$katalog_data['id_katalog']."</td>";
                    echo "<td>".$katalog_data['nama']."</td>";
                    echo "<td><a href='edit.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <td><a href='delete.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>