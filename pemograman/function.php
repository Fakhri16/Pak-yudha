<?php
$koneksi = mysqli_connect('localhost','root','','sekolahrpl_db');

function query($query)
{
    global $koneksi;
    $hasil      = mysqli_query($koneksi, $query);//nilai objek
    $kotakbesar = [];
    while ($kotakkecil = mysqli_fetch_assoc($hasil)) { //array 
        $kotakbesar [] = $kotakkecil;
    }
    return $kotakbesar;
}

function tambah($POST){
    global $koneksi;
    $nama    = $POST['nama'];
    $nisn     = $POST['nisn'];
    $email   = $POST['email'];
    $jurusan = $POST['jurusan'];

    $gambar = upload();
    if(!$gambar) {
        return false;
    }
    $sql = "INSERT INTO tbl_siswa VALUES (
        '','$nama','$nisn','$email','$jurusan','$gambar'
        )";

        mysqli_query($koneksi, $sql);

        return mysqli_affected_rows($koneksi);
}

function hapus ($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id= '$id' ");

    return mysqli_affected_rows($koneksi);
}

function upload () {
        $namafile   = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error      = $_FILES['gambar']['error'];
        $tmpname    = $_FILES['gambar']['tmp_name'];

        if ($error === 4) {
            echo "<script>
                alert('Pilih Gambar Dahulu!');
            </script>";
            return false;
        }

        $ekstensivalid  = ['jpg','jpeg','png'];
        $ekstensigambar = explode ('.', $namafile);
        $ekstensigambar = strtolower(end($ekstensigambar));

        if (!in_array($ekstensigambar, $ekstensivalid)) {
            echo "<script>
                alert('File yang diupload bukan gambar!');
            </script>";
            return false;
        }
        if($ukuranfile > 2000000) {
            echo "<script>
                alert('Maaf,ukuran gambar terlalu besar');
            </script>";
            return false;
        }
        
        $namafilebaru = uniqid();
        $namafilebaru .=  '.';
        $namafilebaru .= $ekstensigambar;

        move_uploaded_file($tmpname, 'img/'. $namafilebaru);
        return $namafilebaru;
}

function ubah ($post) {
    global $koneksi;
    
    $id         = htmlspecialchars($post["id"]);
    $nama       = htmlspecialchars($post["nama"]);
    $nisn        = htmlspecialchars($post["nisn"]);
    $email      = htmlspecialchars($post["email"]);
    $jurusan    = htmlspecialchars($post["jurusan"]);
    $gambarLama = htmlspecialchars($post["gambarLama"]);

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE tbl_siswa SET
            nama    = '$nama',
            nisn     = '$nisn',
            email   = '$email',
            jurusan = '$jurusan',
            gambar  = '$gambar' 
            
            WHERE id='$id'";

        mysqli_query($koneksi, $sql);
        return mysqli_affected_rows($koneksi);
}