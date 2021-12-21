<?php
session_start();
include('config/koneksi.php');

  
if(isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
  $email = $_POST['email']; // isi varibel dengan mengambil data email pada form
  $password = $_POST['password'];

   // isi variabel dengan mengambil data password pada form
 
  try {
      $stmt = $conn->prepare("SELECT * FROM pelanggan WHERE email = :a AND password = :b") ; // buat queri select
      $stmt->bindParam(':a', $email);
      $stmt->bindParam(':b', $password);
      $stmt->execute(); // jalankan query
      $datane = $stmt->fetch(); 
      if( ! empty($datane)){ // Jika tidak sama dengan empty (kosong)
            $_SESSION['email'] = $datane['email'];
            $_SESSION['alamat'] = $datane['alamat'];
            $_SESSION['id'] = $datane['id'];
            $_SESSION['login'] = true;

            
            header("location: index.php"); // Kita redirect ke halaman welcome.php
    
      }else{
          echo "Anda tidak dapat login";
          echo '<script language="javascript">
          window.alert("LOGIN GAGAL! Silakan coba lagi");
          window.location.href="index.php";
       </script>';
      }
  }
  catch(PDOException $e) {
      echo $e->getMessage();
  }
}
?>
