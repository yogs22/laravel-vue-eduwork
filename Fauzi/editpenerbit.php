<html>
<head>
	<title>Edit penerbit</title>
</head>

<?php
	include_once("connect.php");
	$id_penerbit = $_GET['id_penerbit'];

	$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit where id_penerbit='$id_penerbit'");

    while($penerbit_data = mysqli_fetch_array($penerbit))
    {
    	$id_penerbit = $penerbit_data['id_penerbit'];
    	$nama = $penerbit_data['nama_penerbit'];
        $email = $penerbit_data['email'];
        $telp = $penerbit_data['telp'];
        $alamat = $penerbit_data['alamat'];
    }
?>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="editpenerbit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>ID penerbit</td>
				<td style="font-size: 11pt;"><?php echo $id_penerbit; ?> </td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
            <tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
            <tr> 
				<td>No Telp</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
            <tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
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

			$id_penerbit = $_GET['id_penerbit'];
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
						
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbit SET nama_penerbit = '$nama', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit';");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>