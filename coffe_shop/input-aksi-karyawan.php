<?php
include 'koneksi.php';
$id_karyawan = $_POST['id_karyawan'];
$Nama = $_POST['Nama'];
$Gender  = $_POST['Gender'];

mysqli_query($koneksi,"insert into karyawan values('$id_karyawan','$Nama','$Gender')");
header("location:karyawan.php");

?>