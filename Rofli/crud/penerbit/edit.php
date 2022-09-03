<html>
    <head>
        <title>Edit Penerbit</title>
    </head>

    <?php
        include_once("../connect.php");
        $id_penerbit = $_GET['id_penerbit'];
        $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit'");

        while($penerbit_data = mysqli_fetch_array($penerbit)){
            $nama_penerbit = $penerbit_data['nama_penerbit'];
            $email = $penerbit_data['email'];
            $telp = $penerbit_data['telp'];
            $alamat = $penerbit_data['alamat'];
        }
    ?>

    <body>
        <a href="index.php">Go to Home</a>
        <br><br>

        <form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
            <table width="25%" border="0">
                <tr>
                    <td>ID Penerbit</td>
                    <td style="font-size: 11px;"><?php echo $id_penerbit; ?></td>
                </tr>
                <tr>
                    <td>Nama Penerbit</td>
                    <td><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo $email ?>"></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td><input type="text" name="telp" value="<?php echo $telp ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $alamat ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Simpan"></td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['Submit'])){
                $nama_penerbit = $_POST['nama_penerbit'];
                $email = $_POST['email'];
                $telp = $_POST['telp'];
                $alamat = $_POST['alamat'];

                mysqli_query($mysqli, "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit'");
                header("Location:index.php");
            }
        ?>
    </body>
</html>