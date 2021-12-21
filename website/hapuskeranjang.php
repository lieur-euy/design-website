<?php
include_once('config/koneksi.php');
session_start();
include ('../website/layout/layout.php');
include('../website/komponen/navbar_sdhlogin.php');
$id_produk = $_GET['id'];
unset ($_SESSION["keranjang"][$id_produk]);
echo "<script>alert('produk telah dihapus dari keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>