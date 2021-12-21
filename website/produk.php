<?php
include_once('config/koneksi.php');
include('../website/layout/layout.php');
session_start();
if (isset($_SESSION['login'])){
  include('../website/komponen/navbar_login.php');
  ?>
  <!-- search  -->
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
  <!--page-->
<div class="page1 container shadow-lg ">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2" role="group" aria-label="First group">
          <button type="button" class="btn btn-success">1</button>
          <button type="button" class="btn btn-success">2</button>
          <button type="button" class="btn btn-success">3</button>
          <button type="button" class="btn btn-success">4</button>
        </div>
        <div class="btn-group me-2" role="group" aria-label="Second group">
          <button type="button" class="btn btn-secondary">5</button>
          <button type="button" class="btn btn-secondary">6</button>
          <button type="button" class="btn btn-secondary">7</button>
        </div>
        <div class="btn-group" role="group" aria-label="Third group">
          <button type="button" class="btn btn-info">8</button>
        </div>
      </div>
</div>
  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>


  <!--footer-->
    <?php }
    else{
      header('location: index.php');
    }
      include ('../website/komponen/footer.php'); 
    ?>
</html>
  