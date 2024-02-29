<?php
//koneksi database 
include '../koneksi.php';


//menangkap data yang dikirim dari from
$petugas_id = $_POST['petugas_id'];

//menginput data ke database
mysqli_query($koneksi, "delete from petugas where petugas_id='$petugas_id'");

//mengalihkan halaman kembali ke data_pengguna.php
header("location:data_pengguna.php?pesan=hapus");

?>