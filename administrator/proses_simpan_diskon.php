<?php
include "header.php";
include "navbar.php";
?>

<?php
//koneksi database 
include '../koneksi.php';


$hargaa = $_POST['hargaa'];
$discount = $_POST['discount'];

{
    echo "Harga Barang : $hargaa <br>";
}

    if($hargaa >= 500000){
        $discount = (($hargaa*25)/100);
        $hargaa_bayar = ($hargaa-$discount);
        echo "<p> Selamat Anda Mendapatkan Diskon 25%</p>";
        echo "Harga Setelah Mendapatkan Diskon : Rp . $hargaa_bayar,-";
    } 

    elseif ($hargaa >= 300000){
        $discount = (($hargaa*15)/100);
        $hargaa_bayar = ($hargaa-$discount);
        echo "<p> Selamat Anda Mendapatkan Diskon 15%</p>";
        echo "Harga Setelah Mendapatkan Diskon: Rp . $hargaa_bayar,-";
    } 

    elseif($hargaa <= 300000) {
        echo "<br> Maaf Anda Tidak Mendapatkan Diskon";
    }
?>

<?php
include "footer.php";
?>
