<html>
    <head>
        <title>Tambah Penerbit</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body style="padding: 20px 0px 0px 50px;">
        <a class="btn btn-primary btn-sm" href="index.php">< Go Home</a>
        <br><br>
        <form action="add.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>ID Penerbit</td>
                    <td><input type="text" name="id_penerbit" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nama Penerbit</td>
                    <td><input type="text" name="nama_penerbit" class="form-control"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" class="form-control"></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td><input type="text" name="telp" class="form-control"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" class="form-control"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" class="btn btn-primary" value="Add"></td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['Submit'])){
                $id_penerbit = $_POST['id_penerbit'];
                $nama_penerbit = $_POST['nama_penerbit'];
                $email = $_POST['email'];
                $telp = $_POST['telp'];
                $alamat = $_POST['alamat'];

                include_once("../connect.php");

                mysqli_query($mysqli, "INSERT INTO penerbit (id_penerbit, nama_penerbit, email, telp, alamat)
                    VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat');");
                header("Location:index.php");
            }
        ?>
    </body>
</html>