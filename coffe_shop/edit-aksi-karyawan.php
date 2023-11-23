<?php
include 'koneksi.php';
$id = $_POST['id_karyawan'];
$Nama = $_POST['Nama'];
$Gender = $_POST['Gender'];

mysqli_query($koneksi, "update karyawan set id_karyawan='$id',Nama='$Nama',Gender='$Gender' where id_karyawan='$id'");
header("location:karyawan.php");
?>