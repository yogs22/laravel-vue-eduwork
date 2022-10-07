<?php
    include_once("connection.php");
    $buku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
                                        LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        ORDER BY judul ASC");
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


    <!-- link untuk css external -->
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <style type="text/css">
        .menu {
            margin-left: 45%;
        }
    </style>

</head>
<body>
<!-- Header-->
<!-- Navbar -->
    <div class="nav fixed-top">
            <div>
                <p class="textbranch">PERPUSTAKAAN - Buku</p>
            </div>
            <div class="menu">
                <a class="active" aria-current="page" href="index.php">BUKU</a>
                <a class="active" aria-current="page" href="script_penerbit/penerbit.php">PENERBIT</a>
                <a class="active" aria-current="page" href="script_pengarang/pengarang.php">PENGARANG</a>
                <a class="active" aria-current="page" href="script_katalog/katalog.php">KATALOG</a>
            </div>
            <div class="tombol">
                <a href="add.php">Tambah Buku Baru</a>
            </div>
        
    </div>
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
     <?php
      include "connection.php";
      
      $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
      
      // Jumlah data per halaman
      $limit = 10;

      $limitStart = ($page - 1) * $limit;
                
      $buku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
                                        LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        LIMIT ".$limitStart.",".$limit);
      
      $no = $limitStart + 1;
    ?>
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
<!-- pagination -->
    <nav aria-label="...">
      <ul class="pagination">
        <?php
          // Jika page = 1, maka LinkPrev disable
          if($page == 1){ 
          ?>        
            <!-- link Previous Page disable --> 
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
          <?php
          }
          else{ 
            $LinkPrev = ($page > 1)? $page - 1 : 1;
          ?>
            <!-- link Previous Page --> 
            <li class="page-item"><a href="index.php?page=<?php echo $LinkPrev; ?>"><span class="page-link">Previous</span></a></li>
          <?php
            }
          ?>

<!-- pengambilan data pagination -->
    <?php
          $buku = mysqli_query($conn, "SELECT * FROM buku");        
          
          //Hitung semua jumlah data yang berada pada tabel Sisawa
          $JumlahData = mysqli_num_rows($buku);
          
          // Hitung jumlah halaman yang tersedia
          $jumlahPage = ceil($JumlahData / $limit); 
          
          // Jumlah link number 
          $jumlahNumber = 1; 

          // Untuk awal link number
          $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
          
          // Untuk akhir link number
          $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
          
          for($i = $startNumber; $i <= $endNumber; $i++){
            $linkActive = ($page == $i)? ' class="page-item active"' : '';
          ?>
            <li <?php echo $linkActive; ?>><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?><span class="sr-only">(current)</span></a></li>
          <?php
            }
          ?>
<!-- Link next Pagination -->
    <?php       
            if($page == $jumlahPage){ 
            ?>
            <li class="page-item disabled"><span class="page-link">Next</span></li>
            <?php
            }
            else{
            $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
            ?>
            <li class="page-item"><a href="index.php?page=<?php echo $linkNext; ?>"><span class="page-link">Next</span></a></li>
            <?php
            }
    ?>
    </ul>
</nav>
</body>
</html>