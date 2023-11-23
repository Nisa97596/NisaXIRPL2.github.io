<?php
include 'koneksi.php';

$id_transaksi = $_GET['id'];
mysqli_query($koneksi, "delete from transaksi where id_transaksi='$id_transaksi'");

header("location: transaksi.php");
?>