<!DOCTYPE html>
<html>

<head>
    <title>Membuat Login Multi User Level Dengan PHP dan MySQLi - www.malasngoding.com</title>
    <link rel="stylesheet" type="text/css" href="registrasi.css">
</head>

<body>
    <div class="landing">


        <h1>WELCOME TO EUPHORIA STORE</h1>

        <?php

        require_once("koneksi.php");

        if (isset($_POST['register'])) {

            // filter data yang diinputkan
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            // enkripsi password
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


            // menyiapkan query
            $query = "insert into user (id_user,nama, password,level) 
            values ($id_user,$name,$password,$level)";
            $result = $koneksi->prepare($query);

            // bind parameter ke query
        
            // eksekusi query untuk menyimpan ke database
            $koneksi->close();

            // jika query simpan berhasil, maka user sudah terdaftar
            // maka alihkan ke halaman login
            if ($result)
                header("Location: lohin.php");
        }

        ?>


        <div class="kotak_login">
            <p class="tulisan_login">Registrasi</p>

            <form action="registrasi_aksi.php" method="post">
                <label>Username</label>
                <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

                <label>Password</label>
                <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

                <label>Level</label>
                <input type="password" name="password" class="form_login" placeholder="Password .." required="required">
                <input type="submit" class="tombol_login" value="Registrasi">

                <br />
                <br />
                <!-- <center>
                <a class="link" href="https://www.malasngoding.com">kembali</a>
            </center> -->
            </form>

        </div>
    </div>


</body>

</html>