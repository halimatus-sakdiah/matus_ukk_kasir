<?php
//koneksi database 
include '../koneksi.php';


//menangkap data yang dikirim dari from
$Nama = $_POST['Nama'];
$Harga = $_POST['Harga'];
$Kategori = $_POST['Kategori'];
$Stok = $_POST['Stok'];

//menginput data ke database
mysqli_query($koneksi, "insert into produk values('', '$Nama','$Harga','$Kategori','$Stok' )");

//mengalihkan halaman kembali ke data_barang.php
header("location:data_barang.php?pesan=simpan");

?>