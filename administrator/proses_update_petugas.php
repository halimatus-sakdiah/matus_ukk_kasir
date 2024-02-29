<?php
//koneksi database 
include '../koneksi.php';


//menangkap data yang dikirim dari from
$petugas_id = $_POST['petugas_id'];
$Nama = $_POST['Nama'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$level = $_POST['level'];


//menginput data ke database
if(!$Password){
    mysqli_query($koneksi, "update petugas set Nama='$Nama', Username='$Username', Password='$Password',level='$level' where petugas_id='$petugas_id'");
} else {
    mysqli_query($koneksi, "update petugas set Nama='$Nama', Username='$Username', Password='$Password',level='$level' where petugas_id='$petugas_id'");
}

//mengalihkan halaman kembali ke data_pengguna.php
header('location:data_pengguna.php?pesan=update');

?>