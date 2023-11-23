<?php
    session_start();
    include "koneksi.php";
    //dapatkan data user dari form register
    $user = [
    	'nama' => $_POST['nama'],
    	'username' => $_POST['username'],
    	'password' => $_POST['password'],
    ];
    //validasi jika password & password_confirmation sama
    if($user['password'] != $user['password_confirmation']){
    	$_SESSION['error'] = 'Password yang anda masukkan tidak sama dengan password confirmation.';
    	header("Location: registrasi.php");
    }
    //check apakah user dengan username tersebut ada di table users
    $query = "select * from user where username = ? limit 1";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param('s', $user['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array(MYSQLI_ASSOC);
    //jika username sudah ada, maka return kembali ke halaman register.
    if($row != null){
    	$_SESSION['error'] = 'Username yang anda masukkan sudah ada di database.';
    	header("Location: registrasi.php");
    }else{
    	//username unik. simpan di database.
    	$query = "insert into user (nama, username, password) values  (?,?,?)";
    	$stmt = $mysqli->stmt_init();
    	$stmt->prepare($query);
    	$stmt->bind_param('sss', $user['nama'],$user['username'],$user['password']);
    	$stmt->execute();
    	$result = $stmt->get_result();
    	var_dump($result);
    	$_SESSION['message']  = 'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.';
    	header("Location: registrasi.php");
    }
    ?>