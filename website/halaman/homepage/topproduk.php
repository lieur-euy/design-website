<!-- text -->
<div class="pbeli container shadow-lg">
  <p>Beli sekarang</p>
 </div>
<!-- produk -->
<div class="container-kategori container bg-white shadow-lg">
  <div class=" row text-center">
  <?php
        $query = "SELECT * FROM produk";
        $data = $conn->prepare($query);
        $data->execute();
        ?>
        <?php 
        while($data_produk = $data->fetch()){
          ?>
    <div class="col-lg-3 col-md-3 col-sm-5 col-8">
      <div class="menu-produk shadow-lg">
          <a href="#"> <img src=".././gambarproduk/<?= $data_produk['img']?>" style="width: 100px; height: 100px;"></a>
          <br><br><br>
          <p class="pproduk"><?= $data_produk['nama']?></p>
          <div class="footer d-grid gap-2 d-md-flex justify-content-md-end">
            <p class="pproduk"><?= $data_produk['harga']?></p>
            <a href="./beli.php?id=<?= $data_produk['id']?>" class="btn btn-success me-md-2" type="button">Beli</a>
        </div>
      </div> 
    </div>
<?php
}
?>
  </div>
</div>
