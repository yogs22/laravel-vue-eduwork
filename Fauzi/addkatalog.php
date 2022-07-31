<html>
<head>
	<title>Add Buku</title>
</head>


 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="addkatalog.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ISBN</td>
				<td><input type="text" name="id_katalog"></td>
			</tr>
			<tr> 
				<td>Judul</td>
				<td><input type="text" name="nama"></td>
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
			$isbn = $_POST['id_katalog'];
			$judul = $_POST['nama'];
			
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$isbn', '$judul');");
			
            header("Location:index.php");
		}
	?>
</body>
</html>