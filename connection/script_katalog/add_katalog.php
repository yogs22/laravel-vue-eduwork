<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- link untuk css external -->
    <link rel="stylesheet" type="text/css" href="../css/add.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <style type="text/css">
    	body {
	    	background: url(../img/bgPengarang.jpg);
			background-size: cover;
			background-position: center;
		}
		.kolom {
			padding-top: 25px;
			padding-bottom:5px;
		 	width: 500px;
 			height: 300px;
		}
		.klinput input[type="text"] {
			border-radius: 30px;
			width: 250px;
			height: 50px;
			font-size: 22px;
			padding-left: 15px;
		}
		.klinput textarea[name="alamat"]{
			border-radius:10px;
			width: 250px;
			height: 70px;
		}
    </style>
	<title>Tambah Pengarang</title>
</head>

<?php
	include_once("../connection.php");
	$katalog = mysqli_query($conn, "SELECT * FROM katalog"); 
?>
 
<body>
	<div class="pembungkus">
		<div class="tombol"><a href="katalog.php">Go to Home</a></div>
		<form class="content" action="add_katalog.php" method="post" name="form1">
			<table width="25%" border="0" class="kolom">
			<tr> 
				<td class="nmkolom">ID Katalog
				<td class="klinput"><input type="text" name="id_katalog"></td>
			</tr>
			<tr> 
				<td class="nmkolom">Nama</td>
				<td class="klinput"><input type="text" name="nama"></td>
			</tr>
			<tr> 
				<td></td>
				<td class="tombol"><input type="submit" name="add" value="Tambahkan"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['add'])) {
			$id_katalog = $_POST['id_katalog'];
			$nama = $_POST['nama'];
			include_once("../connection.php");
			$katalog = mysqli_query($conn, "SELECT * FROM katalog");

			$result = mysqli_query($conn, "INSERT INTO `katalog` (`id_katalog`, `nama`)VALUES ('$id_katalog', '$nama');");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>