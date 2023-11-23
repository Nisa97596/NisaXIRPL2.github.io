<?php
include 'koneksi.php';
$id_menu = $_POST['id_menu'];
$Nama = $_POST['Nama'];
$Harga = $_POST['Harga'];
$Jumlah = $_POST['Jumlah'];

mysqli_query($koneksi, "insert into menu values('$id_menu','$Nama','$Harga','$Jumlah')");
header("location:menu.php");

?>