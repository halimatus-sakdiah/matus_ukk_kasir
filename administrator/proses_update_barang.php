<?php
//koneksi database 
include '../koneksi.php';


//menangkap data yang dikirim dari from
$produk_id = $_POST['produk_id'];
$Nama = $_POST['Nama'];
$Harga = $_POST['Harga'];
$Kategori = $_POST['Kategori'];
$Stok = $_POST['Stok'];

//menginput data ke database
mysqli_query($koneksi, "update produk set Nama='$Nama', Harga='$Harga', Kategori='$Kategori',Stok='$Stok' where produk_id='$produk_id'");

//mengalihkan halaman kembali ke data_barang.php
header('location:data_barang.php?pesan=update');

?>