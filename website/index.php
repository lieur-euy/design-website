<?php
include_once('config/koneksi.php');
  include ('../website/layout/layout.php');

?>

<body>
  <!-- navbar-->
  
<?php
session_start();
if (!isset($_SESSION['login'])){
  include('../website/komponen/navbar_login.php');
  include('../website/halaman/homepage/carousel.php');
  include('../website/halaman/homepage/kategori.php');
  include('../website/halaman/homepage/topproduk.php');
  include ('../website/komponen/footer.php');

}
else{

  include('../website/komponen/navbar_sdhlogin.php');
  include('../website/halaman/homepage/carousel.php');
  include('../website/halaman/homepage/kategori.php');
  include('../website/halaman/homepage/topproduk.php');
  include ('../website/komponen/footer.php');
}
exit;
?>




