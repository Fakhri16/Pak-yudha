<?php 
// koneksi ke database
require 'function.php';


$hasil = query ("SELECT * FROM tbl_siswa ORDER BY id");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Data Siswa</h1>
    <br><br>
    <a href="tambah.php">Tambah data siswa</a>
    <br><br>
    <table border="1" cellspacing="0" cellpading="4">
        <tr>
            <td>id      :</td>
            <td>nama    :</td>
            <td>nisn    :</td>
            <td>email   :</td>
            <td>jurusan :</td>
            <td>gambar  :</td>
            <td>aksi    :</td>
        </tr>
        <?php $i = 1;?>
        <?php foreach ($hasil as $cetak) { ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $cetak ['nama'] ?></td>
            <td><?= $cetak ['nisn'] ?></td>
            <td><?= $cetak ['email'] ?></td>
            <td><?= $cetak ['jurusan'] ?></td>
            <td><img src="img/<?= $cetak['gambar']  ?>" width="100"></td>
            <td>
                <a href="ubah.php?id=<?= $cetak['id']?>">Ubah</a>
                <a href="hapus.php?id=<?= $cetak['id']?>" 
                onclick="return confirm ('yakin ?')">Hapus</a>
            </td>
        </tr>
        <?php $i++;?>
        <?php } ?>
    </table>
    <br><br>
    <a href="login.php">Kembali Ke Halaman Login</a>
</body>
</html>