<html>
    <head>
        <title>Edit Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>

    <?php
        include_once("connect.php");
        $isbn = $_GET['isbn'];
        $buku = mysqli_query($mysqli, "SELECT * FROM buku WHERE isbn='$isbn'");
        $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
        $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
        $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

        while($buku_data = mysqli_fetch_array($buku)){
            $judul = $buku_data['judul'];
            $isbn = $buku_data['isbn'];
            $tahun = $buku_data['tahun'];
            $id_penerbit = $buku_data['id_penerbit'];
            $id_pengarang = $buku_data['id_pengarang'];
            $id_katalog = $buku_data['id_katalog'];
            $qty_stok = $buku_data['qty_stok'];
            $harga_pinjam = $buku_data['harga_pinjam'];
        }
    ?>

    <body style="padding: 20px 0px 0px 50px;">
        <a class="btn btn-primary btn-sm" href="index.php" href="index.php"> < Go to Home</a>
        <br><br>
        <form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
            <table width="25%" border="0">
                <tr>
                    <td>ISBN</td>
                    <td style="font-size: 11px;" class="form-control"><?php echo $isbn; ?></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul" class="form-control" value="<?php echo $judul ?>"></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td><input type="text" name="tahun" class="form-control" value="<?php echo $tahun ?>"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>
                        <select name="id_penerbit" class="form-control">
                            <?php
                                while($penerbit_data = mysqli_fetch_array($penerbit)){
                                    echo "<option ".($penerbit_data['id_penerbit'] == $id_penerbit ? 'selected' : ""), " value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>
                    <select name="id_pengarang" class="form-control">
                            <?php
                                while($pengarang_data = mysqli_fetch_array($pengarang)){
                                    echo "<option ".($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : ""), " value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Katalog</td>
                    <td>
                    <select name="id_katalog" class="form-control">
                            <?php
                                while($katalog_data = mysqli_fetch_array($katalog)){
                                    echo "<option ".($katalog_data['id_katalog'] == $id_katalog ? 'selected' : ""), " value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Qty Stok</td>
                    <td><input type="text" name="qty_stok" class="form-control" value="<?php echo $qty_stok ?>"></td>
                </tr>
                <tr>
                    <td>Harga Pinjam</td>
                    <td><input type="text" name="harga_pinjam" class="form-control" value="<?php echo $harga_pinjam ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" class="btn btn-primary" value="Simpan"></td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['Submit'])){
                $judul = $_POST['judul'];
                $tahun = $_POST['tahun'];
                $id_penerbit = $_POST['id_penerbit'];
                $id_pengarang = $_POST['id_pengarang'];
                $id_katalog = $_POST['id_katalog'];
                $qty_stok = $_POST['qty_stok'];
                $harga_pinjam = $_POST['harga_pinjam'];

                include_once('connect.php');

                mysqli_query($mysqli, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn'");
                header("Location:index.php");
            }
        ?>
    </body>
</html>