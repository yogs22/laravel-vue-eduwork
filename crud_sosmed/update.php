<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tambah Data Karyawan</title>
    <style media="screen">
      label {
        display: block;
        margin-bottom: 5px;
      }
      .input-control {
        margin-bottom: 15px;
        border: 1px solid red;
      }
    </style>
  </head>
  <body>
    <?php include "connect.php" ?>
    <?php
      $data = mysqli_query($conn, "SELECT * FROM status WHERE id = ".$_GET['id']);
      $status = $data->fetch_assoc();
    ?>
    <form action="update_process.php?id=<?= $_GET['id'] ?>" method="post">
      <div>
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" class="input-control" placeholder="Masukkan nama" value="<?= $status['nama'] ?>">
      </div>
      <div>
        <label for="status">Alamat</label>
        <textarea name="status" class="input-control" id="status" rows="8" cols="80" placeholder="Masukkan status"><?= $status['status'] ?></textarea>
      </div>
      <div>
        <button type="submit">Submit</button>
      </div>
    </form>
  </body>
</html>
