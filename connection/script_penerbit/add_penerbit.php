<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- link untuk css external -->
    <link rel="stylesheet" type="text/css" href="../css/add.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <style type="text/css">
    	body {
	    	background: url(../img/bgpenerbit.jpg);
			background-size: cover;
			background-position: center;
		}
		.kolom {
			padding-top: 25px;
			padding-bottom:5px;
		}
		.klinput textarea[name="alamat"]{
			border-radius:10px;
			width: 250px;
			height: 70px;
			padding-left: 10px;
		}
    </style>

    <title>Tambah Penerbit</title>
</head>

<?php
	include_once("../connection.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
?>
 
<body>
	<div class="pembungkus">
		<div class="tombol"><a href="penerbit.php">Go to Home</a></div>
		<form class="content" action="add_penerbit.php" method="post" name="form1">
			<table width="25%" border="0" class="kolom">
				<tr> 
					<td class="nmkolom">ID Penerbit</td>
					<td class="klinput"><input type="text" name="id_penerbit"></td>
				</tr>
				<tr> 
					<td class="nmkolom">Nama Penerbit</td>
					<td class="klinput"><input type="text" name="nama_penerbit"></td>
				</tr>
				<tr> 
					<td class="nmkolom">Email</td>
					<td class="klinput"><input type="text" name="email"></td>
				</tr>
				<tr> 
					<td class="nmkolom">Telepon</td>
					<td class="klinput"><input type="text" name="telp"></td>
				</tr>
				<tr> 
					<td class="nmkolom">Alamat</td>
					<td class="klinput"><textarea type="text" name="alamat"></textarea></td>
				</tr>
				<tr> 
					<td></td>
					<td class="tombol"><input type="submit" name="tambah" value="Tambahkan"></td>
				</tr>
			</table>
		</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['tambah'])) {
			$id_penerbit = $_POST['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connection.php");

			$result = mysqli_query($conn, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat');");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>