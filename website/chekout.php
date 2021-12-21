<?php
include_once('config/koneksi.php');
session_start();
include ('../website/layout/layout.php');
include('../website/komponen/navbar_sdhlogin.php');

?>
<div class="pbeli container shadow-lg">
<table class="table">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">namabarang</th>
      <th scope="col">harga barang</th>
      <th scope="col">jumlah</th>
      <th scope="col">Total</th>

    </tr>
  </thead>
  <tbody>
  
    <?php
    $a = 1;
    $totalbelanja = 0;
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

      <?php $a ++;?>

    </tr>
    <?php $totalbelanja+=$subharga ?>
    </form>
    <?php endforeach ?>
  </tbody>
  <tfoot>
    
    <tr>
    <th></th>
    <th></th>
    <th></th>
      <th>Total</th>
      <th><p>Rp. <?= number_format($totalbelanja) ?></p></th>
    </tr>
    <tr>
    <th>Email</th>

      <th><input type="disabled " class="color-light"  id=""  value="<?= $_SESSION['email']?>" ></th>
      </tr>
    <tr>
      <th>Alamat</th>
      <th><input type="disabled " class="color-light"  id=""  value="<?= $_SESSION['alamat']?>" ></th>
      </tr>
      <tr>
      <th>Pembayaran</th>
      <th>
      <select class="form-select" aria-label="Default select example" name="pembayaran"> 
      <?php
        $queryy = "SELECT * FROM pembayaran";
        $pembayarann = $conn->prepare($queryy);
        $pembayarann->execute();

        while($bayar = $pembayarann->fetch()){
          ?>
          <option value="<?= $bayar['id']?>"><?=$bayar['bank']?></option>
          <?php
        }
  ?>
     </select>
      </th>
      </tr>
     <tr>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <form action="inputorder.php" method="POST">
      <input type="hidden"   name="id" value="<?= $id_produk?>">
      <input type="hidden"   name="id_pelanggan" value="<?= $_SESSION['id']?>">
      <input type="hidden"   name="harga" value="<?= number_format($totalbelanja)?>">
    
      <th><button type="submit" class="btn btn-primary" name="submit" >Beli</button></th>
    </form>
    </tr>

  </tfoot>
</table>
