<?php
    include_once("../connection.php");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog
                                        ORDER BY id_katalog ASC");
?>
 
<html>
<head>    
    <title>Data Katalog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
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
                          <a class="nav-link" href="../script_penerbit/penerbit.php">PENERBIT</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="../script_pengarang/pengarang.php">PENGARANG</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">KATALOG</a>
                        </li>
                        &nbsp;&nbsp;<a class="btn btn-primary " href="add_katalog.php" role="button">Tambah Katalog Baru</a>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br/><br/>

 
    <table class="table" width='80%' border=1>
 
    <tr style="background-color: black; color: white;">
        <th>ID Katalog</th> 
        <th>Nama</th> 
        <th style="text-align: center;">Tindakan</th>
    </tr>
        <?php  
            while($data_katalog = mysqli_fetch_array($katalog)) {
                echo "<tr>";
                echo "<td>".$data_katalog['id_katalog']."</td>";
                echo "<td>".$data_katalog['nama']."</td>";      
                echo "<td><a class='btn btn-primary' href='edit_katalog.php?id_katalog=$data_katalog[id_katalog]'>Edit</a> &nbsp; <a class='btn btn-danger' href='del_katalog.php?id_katalog=$data_katalog[id_katalog]'>Delete</a></td></tr>";        
            }
        ?>
    </table>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</body>
</html>