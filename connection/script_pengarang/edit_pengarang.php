<html>
<head>
	<title>Edit Pengarang</title>

	<!-- link untuk css external -->
    <link rel="stylesheet" type="text/css" href="../css/add.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">

</head>

<?php
	include_once("../connection.php");
	$id_pengarang = $_GET['id_pengarang'];
	$pengarang = mysqli_query($conn, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");
    while($data_pengarang = mysqli_fetch_array($pengarang))
    {
    	$id_pengarang = $data_pengarang['id_pengarang'];
    	$nama_pengarang = $data_pengarang['nama_pengarang'];
    	$email = $data_pengarang['email'];
    	$telp = $data_pengarang['telp'];
    	$alamat = $data_pengarang['alamat'];
    }
?>
 
<body>
	<div class="pembungkus">
		<div class="tombol"><a href="pengarang.php">Go to Home</a></div>
		<form class="content" action="edit_pengarang.php?id_pengarangt=<?php echo $id_pengarang; ?>" method="post">
			<table width="25%" border="0" class="kolom">
				<tr> 
					<td class="nmkolom">ID Pengarang</td>
					<td class="klinput" style="font-size: 14pt; color: blue;"> <?php echo $id_pengarang; ?> </td>
				</tr>
				<tr> 
					<td class="nmkolom">Nama Pengarang</td>
					<td class="klinput"><input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>"> </td>
				</tr>
				<tr> 
					<td class="nmkolom">Email</td>
					<td class="klinput"><input type="text" name="email" value=" <?php echo $email; ?> "> </td>
				</tr>
				<tr> 
					<td class="nmkolom">Telepon</td>
					<td class="klinput"><input type="text" name="telp" value=" <?php echo $telp; ?> "></td>
				</tr>
				<tr> 
					<td class="nmkolom">Alamat</td>
					<td class="klinput"><input type="text" name="alamat" value=" <?php echo $alamat; ?> "></td>
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

			$id_pengarang = $_GET['id_pengarang'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connection.php");

			$result = mysqli_query($conn, "UPDATE pengarang SET id_pengarang = '$id_pengarang', nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat'WHERE id_pengarang = '$id_pengarang';");
			
			header("Location:pengarang.php");
		}
	?>
</body>
</html>