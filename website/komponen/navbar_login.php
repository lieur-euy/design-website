<?php
include ('./config/koneksi.php');


if(isset($_POST['registrasi'])) {
;
    $pass = $_POST['password'];

    $ipt =$conn->prepare("INSERT INTO pelanggan VALUES ('','$_POST[email]','$pass','$_POST[no_hp]','$_POST[alamat]')"); 
    $ipt->execute();
    $_SESSION ['udaregis'] = 'Berhasil Registrasi';
    header('location:index.php');
}




?>

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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="produk.php">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>


      </ul>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleregistrasi" data-bs-whatever="@mdo" >Registrasi</button>
        <br>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#examplelogin" data-bs-whatever="@mdo">LOGIN</button>
      
    </div>
  </div>
</nav>
<?php
if (isset($_SESSION['udaregis'])) :?>
<div class="alert alert-success alert-dismissible fade show fade in" role="alert">
    <?=$_SESSION['udaregis']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden='true'>&times;</span>
    </button>
</div>
<?php
    unset($_SESSION['udaregis']);
endif;
?>
<!-- Modal login -->
<div class="container-fluid">
  <div class="modal fade" id="examplelogin" tabindex="-1" aria-labelledby="exampleloginLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="./login.php" method="POST">
          <input type="hidden" class="form-control" id="recipient-name" name="id">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Email</label>
              <input type="text" class="form-control" id="recipient-name" name="email">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Password</label>
              <input type="password" class="form-control" id="recipient-name" name="password">
            
            </div>
            <div class="row">
            <div class="col-4">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleregistrasi" data-bs-whatever="@mdo">Registrasi</button>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-secondary" name="login">Login</button>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Modal registrasi -->
<div class="container-fluid">
  <div class="modal fade" id="exampleregistrasi" tabindex="-1" aria-labelledby="exampleregistrasiLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="POST" action="">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Email</label>
              <input type="text" class="form-control"  name="email">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Password</label>
              <input type="password" class="form-control" " name="password">
            </div>            <div class="mb-3">
              <label for="message-text" class="col-form-label">Confirm Password</label>
              <input type="password" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">no hp</label>
              <input type="text" class="form-control"  name="no_hp">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">alamat</label>
              <input type="text" class="form-control"  name="alamat">
            </div>  
            <button type="submit" class="btn btn-secondary" name="registrasi">Registrasi</button>
  
        </form>
        </div>
      </div>
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


  
</html>