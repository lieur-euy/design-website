<?php

include ('../koneksi.php');
$query ="DELETE FROM produk WHERE id ='$_GET[id]'"; 
$data = $conn->prepare($query);
$data->execute();
header("location:produk.php");

?>
