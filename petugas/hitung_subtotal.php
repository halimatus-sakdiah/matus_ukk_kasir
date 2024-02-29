<?php
//koneksi database 
include '../koneksi.php';


//menangkap data yang dikirim dari from
$Stok = $_POST['Stok'];
$produk_id = $_POST['produk_id'];
$JumlahProduk = $_POST['JumlahProduk'];
$Harga = $_POST['Harga'];
$detail_id = $_POST['detail_id'];
$pelanggan_id = $_POST['pelanggan_id'];
$SubTotal = $JumlahProduk * $Harga;
$stok_total = $Stok - $JumlahProduk;

//menginput data ke database
mysqli_query($koneksi, "update detailpenjualan set SubTotal='$SubTotal', JumlahProduk='$JumlahProduk' where detail_id='$detail_id'");
mysqli_query($koneksi, "update produk set Stok='$stok_total' where produk_id='$produk_id'");

//mengalihkan halaman kembali ke detail_pembelian.php
header("location:detail_pembelian.php?pelanggan_id=$pelanggan_id");

?>