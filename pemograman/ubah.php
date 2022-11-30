<?php 
require 'function.php';

// tangkap data id dari url
$id = $_GET['id'];

// lakukan query data berdasarkan id
$siswa = query ("SELECT * FROM tbl_siswa WHERE id = '$id'") [0];
                // tampilkan seluruh data dari table siswa berdasarkan id yang idnya id

// cek apakah tombol kirim sudah ditekan
if ( isset ($_POST ["tekan"])) {

    // cek apakah data berhasil diubah 
    if (ubah ($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil di ubah');
                document.location.href = 'index.php';
            </script>
            ";
    }
}

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
    <h1>Form Ubah</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $siswa['gambar']; ?>">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" value="<?= $siswa['nama'];?>">
            </li>

            <li>
                <label for="nis">NIS :</label>
                <input type="text" name="nisn" id="nisn" value="<?= $siswa['nisn'];?>">
            </li>

            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" value="<?= $siswa['email'];?>">
            </li>

            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $siswa['jurusan'];?>">
            </li>

            <li>
                <label for="gambar">Gambar :</label><br>
                <img src="img/<?= $siswa['gambar'];?>" width="70"><br>
                <input type="file" name="gambar" id="gambar" value="<?= $siswa['gambar'];?>">
            </li>

            <li>
                <button type="submit" name="tekan">Simpan</button>
            </li>   
        </ul>
    </form>
</body>
</html>