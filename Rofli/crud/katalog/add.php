<html>
    <head>
        <title>Tambah Katalog</title>
    </head>
    <body>
        <a href="index.php">Go Home</a>

        <form action="add.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>ID Katalog</td>
                    <td><input type="text" name="id_katalog"></td>
                </tr>
                <tr>
                    <td>Nama Katalog</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add"></td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['Submit'])){
                $id_katalog = $_POST['id_katalog'];
                $nama = $_POST['nama'];

                include_once("../connect.php");

                mysqli_query($mysqli, "INSERT INTO katalog (id_katalog, nama)
                    VALUES ('$id_katalog', '$nama');");
                header("Location:index.php");
            }
        ?>
    </body>
</html>