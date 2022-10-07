<html>
<head>
	<title>Edit Katalog</title>

	<!-- link untuk css external -->
    <link rel="stylesheet" type="text/css" href="../css/add.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <style type="text/css">
    	.kolom {
		 	width: 500px;
		 	height: 200px;
		 }
    </style>
</head>

<?php
	include_once("../connection.php");
	$id_katalog = $_GET['id_katalog'];
	$katalog = mysqli_query($conn, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");
    while($data_katalog = mysqli_fetch_array($katalog))
    {
    	$id_katalog = $data_katalog['id_katalog'];
    	$nama = $data_katalog['nama'];
    	
    }
?>
 
<body>
	<div class="pembungkus">
		<div class="tombol"><a href="katalog.php">Go to Home</a></div>
		<form class="content" action="edit_katalog.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
			<table width="25%" border="0" class="kolom">
				<tr> 
					<td class="nmkolom">ID Katalog</td>
					<td class="klinput" style="font-size: 16pt; color: Blue;"> <?php echo $id_katalog; ?> </td>
				</tr>
				<tr> 
					<td class="nmkolom">Nama</td>
					<td class="klinput"><input type="text" name="nama" value="<?php echo $nama; ?>"> </td>
				</tr>
				<tr> 
					<td></td>
					<td class="tombol"><input type="submit" name="update" value="Update"></td>
				</tr>
			</table>
		</form>
	</div>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_katalog = $_GET['id_katalog'];
			$nama = $_POST['nama'];
			
			include_once("../connection.php");

			$result = mysqli_query($conn, "UPDATE katalog SET id_katalog = '$id_katalog', nama = '$nama' WHERE id_katalog = '$id_katalog';");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>