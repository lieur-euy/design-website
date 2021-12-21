<?php
include('config/koneksi.php');

if(isset($_POST['submit'])) {  
    $query ="INSERT INTO order VALUES('','$_POST[id_pelanggan]',$_POST[harga]','$_POST[pembayaran]')"; 
    $data = $conn -> prepare($query);
    $data->execute();
    header('location:index.php');
    
}
?>