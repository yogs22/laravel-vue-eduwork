<html>
<head>
	<title>Edit Penerbit</title>

	<!-- link untuk css external -->
    <link rel="stylesheet" type="text/css" href="../css/add.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>

<?php
	include_once("../connection.php");
	$id_penerbit = $_GET['id_penerbit'];
	$penerbit = mysqli_query($conn, "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");
    while($data_penerbit = mysqli_fetch_array($penerbit))
    {
    	$id_penerbit = $data_penerbit['id_penerbit'];
    	$nama_penerbit = $data_penerbit['nama_penerbit'];
    	$email = $data_penerbit['email'];
    	$telp = $data_penerbit['telp'];
    	$alamat = $data_penerbit['alamat'];
    }
?>
 
<body>
	<div class="pembungkus">
		<div class="tombol"><a href="penerbit.php">Go to Home</a></div>
		<form class="content" action="edit_penerbit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
			<table width="25%" border="0" class="kolom">
				<tr> 
					<td class="nmkolom">ID Penerbit</td>
					<td class="klinput" style="font-size: 14pt; color: blue;"> <?php echo $id_penerbit; ?> </td>
				</tr>
				<tr> 
					<td class="nmkolom">Nama Penerbit</td>
					<td class="klinput"><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"> </td>
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

			$id_penerbit = $_GET['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connection.php");

			$result = mysqli_query($conn, "UPDATE penerbit SET id_penerbit = '$id_penerbit', nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat'WHERE id_penerbit = '$id_penerbit';");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>