<html>
    <head>
        <title>Edit Katalog</title>
    </head>

    <?php
        include_once("../connect.php");
        $id_katalog = $_GET['id_katalog'];
        $katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog = '$id_katalog'");

        while($katalog_data = mysqli_fetch_array($katalog)){
            $nama = $katalog_data['nama'];
        }
    ?>

    <body>
        <a href="index.php">Go to Home</a>
        <br><br>

        <form action="edit.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
            <table width="25%" border="0">
                <tr>
                    <td>ID Katalog</td>
                    <td style="font-size: 11px;"><?php echo $id_katalog; ?></td>
                </tr>
                <tr>
                    <td>Nama Katalog</td>
                    <td><input type="text" name="nama" value="<?php echo $nama ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Simpan"></td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['Submit'])){
                $nama = $_POST['nama'];

                mysqli_query($mysqli, "UPDATE katalog SET nama = '$nama' WHERE id_katalog = '$id_katalog'");
                header("Location:index.php");
            }
        ?>
    </body>
</html>