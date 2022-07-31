<html>
<head>
	<title>Add penerbit</title>
</head>


 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="addpenerbit.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID penerbit</td>
				<td><input type="text" name="id_penerbit"></td>
			</tr>
			<tr> 
				<td>Nama penerbit</td>
				<td><input type="text" name="nama_penerbit"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
            <tr> 
				<td>No Telp</td>
				<td><input type="text" name="telp"></td>
			</tr>
            <tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$idpenerbit = $_POST['id_penerbit'];
			$namapenerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$idpenerbit', '$namapenerbit', '$email', '$telp', '$alamat');");
			
            header("Location:penerbit.php");
		}
	?>
</body>
</html>