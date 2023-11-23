<?php
include 'koneksi.php';
$id_transaksi = $_POST['id_transaksi'];
$id_karyawan = $_POST['id_karyawan'];
$id_menu = $_POST['id_menu'];
$Harga = $_POST['harga'];
$Jumlah = $_POST['jumlah'];

mysqli_query($koneksi, "insert into transaksi values ('$id_transaksi','$id_karyawan','$id_menu','$Harga','$Jumlah')");
header("location:transaksi.php");

?>