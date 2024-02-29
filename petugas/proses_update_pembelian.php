<?php
//koneksi database 
include '../koneksi.php';


//menangkap data yang dikirim dari from
$pelanggan_id = $_POST['pelanggan_id'];
$Nama = $_POST['Nama'];
$JenisKelamin = $_POST['JenisKelamin'];
$Alamat = $_POST['Alamat'];
$Kota = $_POST['Kota'];
$KodePost = $_POST['KodePost'];
$NoTelp = $_POST['NoTelp'];

//menginput data ke database
mysqli_query($koneksi, "update pelanggan set Nama='$Nama', JenisKelamin='$JenisKelamin', Alamat='$Alamat', Kota='$Kota', KodePost='$KodePost',NoTelp='$NoTelp' where pelanggan_id='$pelanggan_id'");

//mengalihkan halaman kembali ke pembelian.php
header('location:pembelian.php?pesan=update');

?>