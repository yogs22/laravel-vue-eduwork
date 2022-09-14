<html>
<head>
	<title>Edit Penerbit</title>
</head>

<?php
	include_once("../connection.php");
	$id_pengarang = $_GET['id_pengarang'];
	$penerbit = mysqli_query($conn, "SELECT * FROM penerbit WHERE id_pengarang='$id_pengarang'");
    while($data_penerbit = mysqli_fetch_array($penerbit))
    {
    	$id_pengarang = $data_penerbit['id_pengarang'];
    	$nama_penerbit = $data_penerbit['nama_penerbit'];
    	$email = $data_penerbit['email'];
    	$telp = $data_penerbit['telp'];
    	$alamat = $data_penerbit['alamat'];
    }
?>
 
<body>
	<a href="penerbit.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit_penerbit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>ID Penerbit</td>
				<td style="font-size: 11pt;"> <?php echo $id_pengarang; ?> </td>
			</tr>
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"> </td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value=" <?php echo $email; ?> "> </td>
			</tr>
			<tr> 
				<td>Telepon</td>
				<td><input type="text" name="telp" value=" <?php echo $telp; ?> "></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value=" <?php echo $alamat; ?> "></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_pengarang = $_GET['id_pengarang'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connection.php");

			$result = mysqli_query($conn, "UPDATE pengarang SET id_pengarang = '$id_pengarang', nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat'WHERE id_pengarang = '$id_pengarang';");
			
			header("Location:pengarang.php");
		}
	?>
</body>
</html>id_pengarang