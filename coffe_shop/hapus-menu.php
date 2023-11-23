<?php
include 'koneksi.php';

$id_menu = $_GET['id'];
mysqli_query($koneksi, "delete from menu where id_menu='$id_menu'");

header("location: menu.php");
?>