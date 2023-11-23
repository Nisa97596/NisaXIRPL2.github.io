<?php
include 'koneksi.php';
$id_transaksi = $_POST['id'];
$id_karyawan = $_POST['id_karyawan'];
$id_menu = $_POST['id_menu'];
$Harga = $_POST['Harga'];
$Jumlah = $_POST['Jumlah'];

mysqli_query($koneksi, "update transaksi set id_transaksi='$id_transaksi',id_karyawan='$id_karyawan',id_menu='$id_menu',Harga='$Harga',Jumlah='$Jumlah' where id_transaksi='$id_transaksi'");
header("location:transaksi.php");
?>