<?php
include_once('config/koneksi.php');
session_start();
include ('../website/layout/layout.php');
include('../website/komponen/navbar_sdhlogin.php');


$jumlah = $_GET['jumlah'];
$id_produk = $_GET['id'];

if(isset($_SESSION['keranjang'][$id_produk])){
    $_SESSION['keranjang'][$id_produk]+= $jumlah;
}
else{
    $_SESSION['keranjang'][$id_produk]= $jumlah;
}
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
echo "<script>alert('produk telah dimasukan ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>

