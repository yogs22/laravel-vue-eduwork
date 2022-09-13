<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data Karyawan</title>
    <style media="screen">
      table {
        border-collapse: collapse;
        margin-top: 15px;
      }
      table tr td,
      table tr th {
        padding: 10px;
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <?php include "connect.php" ?>
    <h1>SOSMED GATOTKACA 🥀</h1>
    <p>Berisi status galau</p>
    <a href="create.php">Bikin Status</a>
    <div>
      <?php $data = mysqli_query($conn, "SELECT * FROM `status` ORDER BY id DESC");
      if ($data->num_rows > 0) {
        $number = 1;
        while($row = $data->fetch_assoc()) {
      ?>
        <p><b><?= $row['nama'] ?></b> Mengupdate status</p>
        <p>
          <?= $row['status'] ?> ||
          <a href="update.php?id=<?= $row['id'] ?>">✏️</a> ||
          <a href="delete.php?id=<?= $row['id'] ?>">🗑️</a>
        </p>
        <hr>
      <?php } } ?>
    </div>
  </body>
</html>
