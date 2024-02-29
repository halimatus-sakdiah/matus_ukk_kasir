<?php
//koneksi database 
include '../koneksi.php';


//menangkap data yang dikirim dari from
$produk_id = $_POST['produk_id'];

//menginput data ke database
mysqli_query($koneksi, "delete from produk where produk_id='$produk_id'");

//mengalihkan halaman kembali ke data_barang.php
header("location:data_barang.php?pesan=hapus");

?>