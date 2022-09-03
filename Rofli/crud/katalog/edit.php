<html>
    <head>
        <title>Edit Katalog</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>

    <?php
        include_once("../connect.php");
        $id_katalog = $_GET['id_katalog'];
        $katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog = '$id_katalog'");

        while($katalog_data = mysqli_fetch_array($katalog)){
            $nama = $katalog_data['nama'];
        }
    ?>

    <body style="padding: 20px 0px 0px 50px;">
        <a class="btn btn-primary btn-sm" href="index.php">< Go to Home</a>
        <br><br>
        <form action="edit.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
            <table width="25%" border="0">
                <tr>
                    <td>ID Katalog</td>
                    <td style="font-size: 11px;" class="form-control"><?php echo $id_katalog; ?></td>
                </tr>
                <tr>
                    <td>Nama Katalog</td>
                    <td><input type="text" name="nama" class="form-control" value="<?php echo $nama ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" class="btn btn-primary" value="Simpan"></td>
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