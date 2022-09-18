<?php
    include_once("connection.php");
    $buku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
                                        LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        ORDER BY judul ASC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- link untuk css external -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
 
<body>
<!-- Header-->
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PERPUSTAKKAAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="index.php">BUKU</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="script_penerbit/penerbit.php">PENERBIT</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="script_pengarang/pengarang.php">PENGARANG</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="script_katalog/katalog.php">KATALOG</a>
                        </li>
                        &nbsp;&nbsp;<a class="btn btn-primary" href="add.php" role="button">Add New Buku</a>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<!-- Tutup Navbar -->
<!-- Tutup Header -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Content -->
    <table class="table" width='80%' border=1>
    <tr class="judulkolom">
        <th>ISBN</th> 
        <th>Judul</th> 
        <th>Tahun</th> 
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Katalog</th>
        <th>Stok</th>
        <th>Harga Pinjam</th>
        <th>Aksi</th>
    </tr>
<!-- Script Relasi ke database -->
    <?php  
        while($buku_data = mysqli_fetch_array($buku)) {         
            echo "<tr class='data'>";
            echo "<td>".$buku_data['isbn']."</td>";
            echo "<td>".$buku_data['judul']."</td>";
            echo "<td>".$buku_data['tahun']."</td>";    
            echo "<td>".$buku_data['nama_pengarang']."</td>";    
            echo "<td>".$buku_data['nama_penerbit']."</td>";    
            echo "<td>".$buku_data['nama_katalog']."</td>";    
            echo "<td>".$buku_data['qty_stok']."</td>";    
            echo "<td>".$buku_data['harga_pinjam']."</td>";    
            echo "<td><a class='btn btn-primary' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>