<?php
//koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "buku_telpon");

// Check connection error (optional but good practice)
if (!$koneksi) {
  echo "Error: Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

// ambil data dari tabel 
$result = mysqli_query($koneksi, "SELECT * from phonebook");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Telpon</title>
</head>
<body>
  <h1>Daftar Telpon Mahasiswa</h1>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>NAMA</th>
      <th>NIM</th>
      <th>NO TELPON</th>
      <th>Email</th>
      <th>Action</th>
    </tr>

    <?php $i=1; ?>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

    <tr>
      <td><?= $i ?></td>
      <td>
        <a href="#">Ubah</a>
      </td>
      <td>
        <a href="#">Hapus</a>
      </td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['nim'] ?></td>
      <td></td>
      <td><?= $row['email'] ?></td>
    </tr>
    <?php $i++ ?>
    <?php endwhile ?>
  </table>

  <?php
  // Close connection (optional but good practice)
  mysqli_close($koneksi);
  ?>
</body>
</html>
