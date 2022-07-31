<html>
<head>
	<title>Add Pengarang</title>
</head>


 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="addpengarang.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID Pengarang</td>
				<td><input type="text" name="id_pengarang"></td>
			</tr>
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang"></td>
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
			$idpengarang = $_POST['id_pengarang'];
			$namapengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`) VALUES ('$idpengarang', '$namapengarang', '$email', '$telp', '$alamat');");
			
            header("Location:pengarang.php");
		}
	?>
</body>
</html>