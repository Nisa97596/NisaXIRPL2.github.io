<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$Nama = $_POST['nama'];
$Password = $_POST['Password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from user where nama='$Nama' and Password='$Password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {

        // buat session login dan username
        $_SESSION['nama'] = $Nama;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:hal_admin.php");

        // cek jika user login sebagai pegawai
    } else if ($data['level'] == "user") {
        // buat session login dan username
        $_SESSION['nama'] = $Nama;
        $_SESSION['level'] = "user";
        // alihkan ke halaman dashboard pegawai
        header("location:hal_user.php");

    } else {

        // alihkan ke halaman login kembali
        header("location:indexs.php?pesan=gagal");
    }
} else {
    header("location:indexs.php?pesan=gagal");
}

?>