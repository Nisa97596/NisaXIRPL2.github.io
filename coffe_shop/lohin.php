<!DOCTYPE html>
<html>

<head>
    <title>Membuat Login Multi User Level Dengan PHP dan MySQLi - www.malasngoding.com</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

    <h1>WELCOME TO EUPHORIA STORE</h1>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>

        <form action="login_aksi.php" method="post">
            <label>Username</label>
            <input type="text" name="nama" class="form_login" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="password" name="Password" class="form_login" placeholder="Password .." required="required">

            <input type="submit" class="tombol_login" value="LOGIN">

            <br />
            <br />
            <!-- <center>
                <a class="link" href="https://www.malasngoding.com">kembali</a>
            </center> -->
        </form>

    </div>


</body>

</html>