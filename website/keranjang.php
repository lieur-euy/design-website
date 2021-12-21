<?php
include_once('config/koneksi.php');
session_start();
include ('../website/layout/layout.php');
include('../website/komponen/navbar_sdhlogin.php');
if(empty($_SESSION['keranjang'])){
    echo "<script>alert('keranjang kosong belanja');</script>";
    echo "<script>location='index.php';</script>";
}
?>
<div class="pbeli container shadow-lg">
<table class="table">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">nama barang</th>
      <th scope="col">harga barang</th>
      <th scope="col">jumlah</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
    <?php

    $a =1;
    foreach($_SESSION['keranjang'] as $id_produk => $jumlah):
    ?>

      <?php
        $ambil =$conn->query("SELECT * FROM produk WHERE id = '$id_produk'");
        $datane = $ambil->fetch();

        $subharga = $datane['harga']*$jumlah;
        ?>
    <form>
    <input type="hidden"   name="id_pengguna" value="<?= $_SESSION['email']?>">
    <tr>
 
      <th scope="row"><?= $a?></th>
      <td><?= $datane['nama']?></td>
   
      <td><?= $datane['harga']?></td>
      <td><?= $jumlah?></td>
      <td><?= number_format($subharga)?></td>
      <td><a href="hapuskeranjang.php?id=<?=$id_produk?>" class="btn btn-danger">Hapus</a></td>

      <?php $a ++;?>
    </tr>
    </form>
    <?php endforeach ?>
  </tbody>
</table>
<a href="chekout.php?id=<?=$id_produk?>" class="btn btn-primary">Checkout</a>