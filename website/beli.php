<?php
include_once('config/koneksi.php');
if (!isset($_SESSION['login'])){
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .pbeli{
            background-color: rgb(255, 255, 255);
            text-align: center;
            width: auto;
            margin: 1rem auto;
            padding: 1rem;
            border-radius: 10px;
            font-weight: bold;
            font-family: 'Roboto Mono', monospace;
        }
        .menu-produk{
          margin: 1rem auto;
          padding: 2rem;
          border-radius: 10px;
        }
        .container-kategori{
          border-radius: 10px;
        }
        .page1{
            background-color: rgb(255, 255, 255);
            text-align: center;
            width: auto;
            margin: 1rem auto;
            padding: 1rem;
            border-radius: 10px;
            font-weight: bold;
        }
        .footer1{
          background-color: white;
          text-align: center;
          padding: 1rem auto;
        }
        .linkfooter{
          text-align: left;
        }
        .pproduk{
    font-weight: bold;
    }
    .pform{
        text-align: left;
    }
            </style>

    <title>beli</title>
  </head>
  <body>
<!--  navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a href="#" ><img src="./src/logo.png" style="width: 10%;"> </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.html">About Us</a>
          </li>
    
  
        </ul>
        <div class="d-grid gap-4 d-md-flex justify-content-md-end">
          <input class="form-control me-2" type="search" placeholder="Cari apa?" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        
      </div>
    </div>
  </nav>
<!-- produk -->


<?php
$id = $_GET['id'];
$query = "SELECT * FROM produk WHERE id = '$id'";
        $data = $conn->prepare($query);
        $data->execute();
        $selectproduk = $data->fetch()
        ?>
      
<div class="container-kategori container bg-white shadow-lg">
    <div class=" row text-center">
      <div class="col-lg-6 col-md-3 col-sm-5 col-8">
        <div class="menu-produk shadow-lg">
            <h3 class="pproduk"><?= $selectproduk['nama'] ?></h3>
            <a href="#"> <img src="../gambarproduk/<?= $selectproduk['img'] ?>" style="width: 400px; height: 300px;"></a>
            <br><br><br>
            <h3 class="pproduk  pform">Harga </h3>
            <h4 class="pform">Rp. <?= $selectproduk['harga'] ?></h4>
            <h3 class="pproduk">Deskripsi</h3>
            <p><?= $selectproduk['deskripsi'] ?></p>
                <h3 class="pproduk">Stock produk</h3>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $selectproduk['stock'] ?></div>
                  </div>
        </div> 
      </div>

      <?php
if(isset($_POST['submit_form'])) {
    $jumlah = $_POST['jumlah'];
    header("location: beli_keranjang.php?jumlah=$jumlah&id=$id");
}
?>

      <div class="col-lg-6 col-md-3 col-sm-5 col-8">
        <div class="menu-produk shadow-lg">
            <form action="" method="POST">
            <div class="input-group flex-nowrap input-group mb-3 ">

                <input type="hidden" class="form-control" placeholder="Username" aria-label="id pelanggan" aria-describedby="addon-wrapping">
              </div>

              <div class="input-group flex-nowrap input-group mb-3 ">
                <span class="input-group-text" id="addon-wrapping">Jumlah</span>
                <input type="text" class="form-control" id="jumlah" onchange="total()" name="jumlah">

                <input type="hidden" class="form-control"  name="id_produk" value="<?= $selectproduk['id'] ?>">
              
              </div>
              <h5>Total Harga Rp. <input type="text " class="color-light"  id="hasilnya" name="harga" disabled></h5>
              <div class="bg-wite pform">
              
                <?php 
                ?>
              </div>
              <input type="hidden" class="form-control"  name="hidden_id" value="<?= $selectproduk['id'] ?>">
              <button name="submit_form" class="btn btn-success" role="button" >Masukan Keranjang</button>
              <script type="text/javascript">
                function total() {
                  var jumlah = document.getElementById('jumlah').value ;

                  var grand_total= jumlah * <?= $selectproduk['harga']?>;
                  document.getElementById('hasilnya').value = grand_total;
                  }

                </script>
            </form>

        </div> 
      </div>
      
    </div>
  </div>

  <div class="pbeli container shadow-lg">
    <p>Produk lainnya</p>
   </div>

  <!-- produk lainnya -->
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
            <a href="#"> <img src="../gambarproduk/<?= $data_produk['img']?>" style="width: 80%;"></a>
            <br><br><br>
            <p class="pproduk"><?= $data_produk['nama']?></p>
            <div class="footer d-grid gap-2 d-md-flex justify-content-md-end">
              <p class="pproduk">Rp.<?= $data_produk['harga']?></p>
              <button class="btn btn-success me-md-2" type="button">Beli</button>
          </div>
        </div> 
      </div>
      <?php 
        }
  ?>
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
  <footer class=" text-center text-lg-start" style="background-color: rgb(143, 153, 153);">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Menu</h5>
  
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-dark">Home</a>
            </li>
            <li>
              <a href="#!" class="text-dark">produk</a>
            </li>
            <li>
              <a href="#!" class="text-dark">About us</a>
            </li>
  
          </ul>
  
        </div>
        <!--Grid column-->
  
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Alamat</h5>
  
          <p>
            Jalan Gang Cupu, Ruko No. 5, Blk. A, Rancamanyar, Kec. Baleendah, Bandung, Jawa Barat 40375
          </p>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgb(8, 39, 26);">
      
      <a class="text-light" href="#">© 2021 Copyright: Yayat Hidayatulloh</a>
    </div>
    <!-- Copyright -->
  </footer>
</html>
<?php
}
?>