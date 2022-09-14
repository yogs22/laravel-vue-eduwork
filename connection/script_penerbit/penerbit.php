<?php
    include_once("../connection.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit
                                        ORDER BY id_penerbit ASC");
?>
 
<html>
<head>    
    <title>Data Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PERPUSTAKAAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="../index.php">BUKU</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">PENERBIT</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="../script_pengarang/pengarang.php">PENGARANG</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="../script_katalog/katalog.php">KATALOG</a>
                        </li>
                        &nbsp;&nbsp;<a class="btn btn-primary " href="add_penerbit.php" role="button">Tambah Penerbit Baru</a>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br/><br/>

 
    <table class="table" width='80%' border=1>
 
    <tr style="background-color: black; color: white;">
        <th>ID Penerbit</th> 
        <th>Nama Penerbit</th> 
        <th>Email</th> 
        <th>Telepon</th>
        <th>Alamat</th>
        <th style="text-align: center;">Tindakan</th>
    </tr>
    <?php  
        while($data_penerbit = mysqli_fetch_array($penerbit)) {
            echo "<tr>";
            echo "<td>".$data_penerbit['id_penerbit']."</td>";
            echo "<td>".$data_penerbit['nama_penerbit']."</td>";
            echo "<td>".$data_penerbit['email']."</td>";    
            echo "<td>".$data_penerbit['telp']."</td>";    
            echo "<td>".$data_penerbit['alamat']."</td>";       
            echo "<td> <a class='btn btn-primary' href='edit_penerbit.php?id_penerbit=$data_penerbit[id_penerbit]'>Edit</a> &nbsp; <a class='btn btn-danger' href='del_penerbit.php?id_penerbit=$data_penerbit[id_penerbit]'>Delete</a></td></tr>";     
        }
    ?>
    </table>
</body>
</html>