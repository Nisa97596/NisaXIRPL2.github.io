<?php
include 'koneksi.php';
$id_user = $_GET['id'];
mysqli_query($koneksi, "delete from user where id_user='$id_user'");
header("location: user.php");
?>