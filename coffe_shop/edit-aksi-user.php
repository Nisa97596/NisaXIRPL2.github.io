<?php
include 'koneksi.php';
$id_user = $_POST['id'];
$Nama = $_POST['Nama'];
$Password = $_POST['Password'];
$level = $_POST['level'];

mysqli_query($koneksi, "update user set id_user='$id_user',nama='$Nama',Password='$Password',level='$level'   Where id_user='$id_user'");
header("location:user.php");
?>