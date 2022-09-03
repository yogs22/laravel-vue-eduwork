<html>
    <head>
        <title>Edit Pengarang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>

    <?php
        include_once("../connect.php");
        $id_pengarang = $_GET['id_pengarang'];
        $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang = '$id_pengarang'");

        while($pengarang_data = mysqli_fetch_array($pengarang)){
            $nama_pengarang = $pengarang_data['nama_pengarang'];
            $email = $pengarang_data['email'];
            $telp = $pengarang_data['telp'];
            $alamat = $pengarang_data['alamat'];
        }
    ?>

    <body style="padding: 20px 0px 0px 50px;">
        <a class="btn btn-primary btn-sm" href="index.php">< Go to Home</a>
        <br><br>
        <form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
            <table width="25%" border="0">
                <tr>
                    <td>ID Pengarang</td>
                    <td style="font-size: 11px;" class="form-control"><?php echo $id_pengarang; ?></td>
                </tr>
                <tr>
                    <td>Nama Pengarang</td>
                    <td><input type="text" name="nama_pengarang" class="form-control" value="<?php echo $nama_pengarang ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" class="form-control" value="<?php echo $email ?>"></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td><input type="text" name="telp" class="form-control" value="<?php echo $telp ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" class="form-control" value="<?php echo $alamat ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" class="btn btn-primary" value="Simpan"></td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['Submit'])){
                $nama_pengarang = $_POST['nama_pengarang'];
                $email = $_POST['email'];
                $telp = $_POST['telp'];
                $alamat = $_POST['alamat'];

                mysqli_query($mysqli, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang'");
                header("Location:index.php");
            }
        ?>
    </body>
</html>