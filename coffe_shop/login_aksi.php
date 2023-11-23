<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$nama = $_POST['nama'];
$password = $_POST['Password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from user where nama='$nama' and Password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['level'] == "Admin") {

		// buat session login dan username
		$_SESSION['nama'] = $nama;
		$_SESSION['level'] = "Admin";
		// alihkan ke halaman dashboard admin
		header("location:hal_admin.php");

		// cek jika user login sebagai pegawai
	} else if ($data['level'] == "user") {
		// buat session login dan username
		$_SESSION['Nama'] = $nama;
		$_SESSION['level'] = "user";
		// alihkan ke halaman dashboard pegawai
		header("location:indeks.php");

	} else {

		// alihkan ke halaman login kembali
		header("location:indeks.php?pesan=gagal");
	}
} else {
	header("location:indeks.php?pesan=gagal");
}

?>