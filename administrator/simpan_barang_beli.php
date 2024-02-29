<?php
include '../koneksi.php';

$produk_id = $_POST['produk_id'];
$detail_id = $_POST['detail_id'];
$pelanggan_id = $_POST['pelanggan_id'];

mysqli_query($koneksi, "update detailpenjualan set produk_id='$produk_id' where detail_id='$detail_id'");

header("location:detail_pembelian.php?pelanggan_id=$pelanggan_id");
?>