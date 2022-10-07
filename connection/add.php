<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- link untuk css external -->
    <link rel="stylesheet" type="text/css" href="css/add.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <style type="text/css">
		.kolom {
			padding-top: 20px;
			padding-bottom:5px;
		}
    </style>
	<title>Tambah Buku</title>
</head>

<?php
	include_once("connection.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");
?>
 
<body>
	<div class="pembungkus">
		<div class="tombol"><a href="index.php">Go to Home</a></div>
			<form class="content" action="add.php" method="post" name="form1">
				<table width="25%" border="0" class="kolom">
					<tr> 
						<td class="nmkolom">ISBN</td>
						<td class="klinput"><input type="text" name="isbn"></td>
					</tr>
					<tr> 
						<td class="nmkolom">Judul</td>
						<td class="klinput"><input type="text" name="judul"></td>
					</tr>
					<tr> 
						<td class="nmkolom">Tahun</td>
						<td class="klinput"><input type="text" name="tahun"></td>
					</tr>
					<tr> 
						<td class="nmkolom">Penerbit</td>
						<td class="klinput">
							<select name="id_penerbit">
								<?php 
								    while($penerbit_data = mysqli_fetch_array($penerbit)) {         
								    	echo "<option value= " .$penerbit_data['id_penerbit']. ">" .$penerbit_data['nama_penerbit']."</option>";
								    }
								?>
							</select>
						</td>
					</tr>
					<tr> 
						<td class="nmkolom">Pengarang</td>
						<td class="klinput">
							<select name="id_pengarang">
								<?php 
								    while($pengarang_data = mysqli_fetch_array($pengarang)) {         
								    	echo "<option value= " .$pengarang_data['id_pengarang']. ">".$pengarang_data['nama_pengarang']."</option>";
								    }
								?>
							</select>
						</td>
					</tr>
					<tr> 
						<td class="nmkolom">Katalog</td>
						<td class="klinput">
							<select name="id_katalog">
								<?php 
								    while($katalog_data = mysqli_fetch_array($katalog)) {         
								    	echo "<option value= ".$katalog_data['id_katalog']." >".$katalog_data['nama']."</option>";
								    }
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="nmkolom">Qty Stok</td>
						<td class="klinput"><input type="text" name="qty_stok"></td>
					</tr>
					<tr> 
						<td class="nmkolom">Harga Pinjam</td>
						<td class="klinput"><input type="text" name="harga_pinjam"></td>
					</tr>
					<tr> 
						<td></td>
						<td class="tombol"><input type="submit" name="Submit" value="Tambahkan"></td>
					</tr>
				</table>
			</form>
			
			<?php
			 
				// Check If form submitted, insert form data into users table.
				if(isset($_POST['Submit'])) {
					$isbn = $_POST['isbn'];
					$judul = $_POST['judul'];
					$tahun = $_POST['tahun'];
					$id_penerbit = $_POST['id_penerbit'];
					$id_pengarang = $_POST['id_pengarang'];
					$id_katalog = $_POST['id_katalog'];
					$qty_stok = $_POST['qty_stok'];
					$harga_pinjam = $_POST['harga_pinjam'];
					
					include_once("connection.php");

					$result = mysqli_query($conn, "INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");
					
					header("Location:index.php");
				}
			?>
	</div>
</body>
</html>