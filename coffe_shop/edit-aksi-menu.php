<?php
include 'koneksi.php';
$id_menu = $_POST['id_menu'];
$Nama = $_POST['Nama'];
$Harga = $_POST['Harga'];
$Jumlah = $_POST['jumlah'];

mysqli_query($koneksi, "update menu set id_menu='$id_menu',Nama='$Nama',Harga='$Harga' ,Jumlah='$Jumlah' where id_menu='$id_menu'");
header("location:menu.php");
?>