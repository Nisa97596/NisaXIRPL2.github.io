<?php
include 'koneksi.php';
$id_user = $_POST['id'];
$Nama = $_POST['Nama'];
$Password = $_POST['Password'];
$Level = $_POST['Level'];

mysqli_query($koneksi, "insert into user values('$id_user','$Nama','$Password','$Level')");
header("location:user.php");
?>