<?php
//koneksi database 
include '../koneksi.php';


//menangkap data yang dikirim dari from
$pelanggan_id = $_POST['pelanggan_id'];

//menginput data ke database
mysqli_query($koneksi, "delete from pelanggan where pelanggan_id='$pelanggan_id'");
mysqli_query($koneksi, "delete from penjualan where pelanggan_id='$pelanggan_id'");

//mengalihkan halaman kembali ke pembelian.php
header("location:pembelian.php?pesan=hapus");

?>