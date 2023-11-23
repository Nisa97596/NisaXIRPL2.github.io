<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="hal_admin.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="hal_admin.php">Euphoria Admin Site</a>
        <!-- Sidebar Toggle-->
        <img src="coffe_logo.png" width="40px" height="40px">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><img class="img_akun" src="e1.jpeg" width="40px"
                        height="40">&nbsp;Earth&nbsp;</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="hal_admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashbor
                        </a>
                        <div class="sb-sidenav-menu-heading">Tabel</div>
                        <a class="nav-link" href="user.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            user
                        </a>
                        <a class="nav-link" href="menu.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-mug-saucer"></i></div>
                            Menu
                        </a>
                        <a class="nav-link" href="karyawan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users-rectangle"></i></div>
                            Karyawan
                        </a>
                        <a class="nav-link" href="transaksi.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill"></i></div>
                            Transaksi
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="Tabel_menu">
                    <div class="judul">
                        <h1 class="judul1">Tabel</h1>
                    </div>
                    <div class="main_tabel">

                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data User
                            <a href="input-karyawan.php"><button class="btn_tambah">Tambah Data Baru</button></a>
                        </div>
                        <table border="1">
                            <thead>
                                <tr>
                                    <th> id_karyawan </th>
                                    <th> Nama </th>
                                    <th> Gender </th>
                                    <th> Aksi </th>
                                </tr>
                            </thead>
                    </div>
                    <?php
                    include 'koneksi.php';
                    $data = mysqli_query($koneksi, "select * from karyawan");
                    while ($tampil = mysqli_fetch_array($data)) {
                        ?>

                        <tr class="head">
                            <td>
                                <?php echo $tampil['id_karyawan'] ?>
                            </td>
                            <td>
                                <?php echo $tampil['Nama'] ?>
                            </td>
                            <td>
                                <?php echo $tampil['Gender'] ?>
                            </td>

                            <td>
                                <a href="hapus-karyawan.php?id=<?php echo $tampil['id_karyawan']; ?>"><button
                                        class="hapus">Hapus</button></a>
                                <a href="edit-karyawan.php?id=<?php echo $tampil['id_karyawan']; ?>"><button
                                        class="edit">Edit</button></a>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>


                    </table>

                </div>
        </div>
    </div>
    </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>