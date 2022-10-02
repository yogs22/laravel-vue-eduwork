<!-- Script Database -->
<?php
    include_once("connection.php");
    $buku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
                                        LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        ORDER BY judul ASC");
?>

<!-- Script HTML Dan PHP -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- LINK KONEKSI BOSSTRAP -->


    <!-- LINK KONEKSI CSS EXTERNAL -->
    <link rel="stylesheet" type="text/css" href="css/baru.css">

    <!-- TITLE WEB AND ICON -->
    <title>PERPUS</title>

</head>
<body>
    <!-- NAVIGASI BAR -->
    <nav class="navbar">
        <a class="title" href="">PERPUSTAKAAN</a>
        <ul class="menu">
            <li><a class="link-menu" aria-current="page" href="index.php">BUKU</a></li>
            <li><a class="link-menu" href="script_penerbit/penerbit.php">PENERBIT</a></li>
            <li><a class="link-menu" href="script_pengarang/pengarang.php">PENGARANG</a></li>
            <li><a class="link-menu" href="script_katalog/katalog.php">KATALOG</a></li>
            <li><a class="btn" href="add.php" style="margin-bottom: 5px;">Add New Buku</a></li>
        </ul>
        </div>
    </nav>

    <!-- CONTENT  hanya untuk pembaharuan-->

</body>
</html>
