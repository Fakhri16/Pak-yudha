<?php 
// query ke database
require 'function.php';
    if (isset ($_POST['tekan']))
    if (tambah ($_POST) > 0 ){
        echo"
        <script>
            alert ('data berhasil ditambahkan')
            document.location.href = 'index.php';
        </script>
        ";
    } else {        
        echo"
        <script>
            alert ('data gagal ditambahkan')
            
        </script>
        ";
    }

// $sql = "INSERT INTO tbl_kategori VALUES ()";

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
    <h1>Form Tambah</h1>
    <ul>
        <form action="" method="POST" enctype="multipart/form-data">
            <li>
            <label>Nama :</label>
            <input type="text" name="nama" id="nama">
            </li>
            <br><br>
            <li>
            <label>NIS :</label>
            <input type="text" name="nisn" id="nisn">
            </li>
            <br><br>
            <li>
            <label>Email :</label>
            <input type="text" name="email" id="email">
            </li>
            <br><br>
            <li>
            <label>Jurusan :</label>
            <input type="text" name="jurusan" id="jurusan">
            </li>
            <br><br>
            <li>
            <label>Gambar :</label>
            <input type="file" name="gambar" id="gambar">
            </li>
            <br><br>
            <li>
            <button type="submit" name="tekan">Simpan</button>
            </li>
        </form>
    </ul>
</body>
</html>