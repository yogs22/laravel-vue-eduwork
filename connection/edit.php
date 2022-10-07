<html>
<head>
	<title>Edit Buku</title>

	<!-- link untuk css external -->
    <link rel="stylesheet" type="text/css" href="css/add.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<?php
	include_once("connection.php");
	$isbn = $_GET['isbn'];

	$buku = mysqli_query($conn, "SELECT * FROM buku WHERE isbn='$isbn'");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");

    while($buku_data = mysqli_fetch_array($buku))
    {
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
 
<body>
	<div class="pembungkus">
		<div class="tombol"><a href="index.php">Go to Home</a></div>
		<form class="content" action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
			<table width="25%" border="0" class="kolom">
				<tr> 
					<td class="nmkolom">ISBN</td>
					<td class="klinput" style="font-size: 14pt; color: white;"> <?php echo $isbn; ?> </td>
				</tr>
				<tr> 
					<td class="nmkolom">Judul</td>
					<td class="klinput"><input type="text" name="judul" value="<?php echo $judul; ?>"> </td>
				</tr>
				<tr> 
					<td class="nmkolom">Tahun</td>
					<td class="klinput"><input type="text" name="tahun" value=" <?php echo $tahun; ?> "> </td>
				</tr>
				<tr> 
					<td class="nmkolom">Penerbit</td>
					<td class="klinput">
						<select name="id_penerbit">
							<?php 
							    while($penerbit_data = mysqli_fetch_array($penerbit)) {         
							    	echo "<option ".($penerbit_data['id_penerbit'] == $id_penerbit ? 'selected' : '')." value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
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
							    	echo "<option ".($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '')." value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
							    }
							?>
						</select>
					</td class="klinput">
				</tr>
				<tr> 
					<td class="nmkolom">Katalog</td>
					<td class="klinput">
						<select name="id_katalog">
							<?php 
							    while($katalog_data = mysqli_fetch_array($katalog)) {         
							    	echo "<option ".($katalog_data['id_katalog'] == $id_katalog ? 'selected' : '')." value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
							    }
							?>
						</select>
					</td>
				</tr>
				<tr> 
					<td class="nmkolom">Qty Stok</td>
					<td class="klinput"><input type="text" name="qty_stok" value="<?php echo $qty_stok; ?> "></td>
				</tr>
				<tr> 
					<td class="nmkolom">Harga Pinjam</td>
					<td class="klinput"><input type="text" name="harga_pinjam" value="<?php echo $harga_pinjam; ?> "></td>
				</tr>
				<tr> 
					<td></td>
					<td class="tombol"><input type="submit" name="update" value="Perbaharui"></td>
				</tr>
			</table>
		</form>
	</div>
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$isbn = $_GET['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn';");
			
			header("Location:index.php");
		}
	?>
</body>
</html>