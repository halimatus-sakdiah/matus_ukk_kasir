<?php
//koneksi database 
include '../koneksi.php';


//menangkap data yang dikirim dari from
$Nama = $_POST['Nama'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$level = $_POST['level'];

//menginput data ke database
mysqli_query($koneksi, "insert into petugas values('', '$Nama','$Username','$Password','$level' )");

//mengalihkan halaman kembali ke data_barang.php
header("location:data_pengguna.php?pesan=simpan");

?>