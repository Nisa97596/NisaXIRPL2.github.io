<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_cart.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header>
            <a href="shop.php?halaman=keranjang-belanja">
                <h1> Menu Kopi Kami </h1><br>
            </a>
            <div class="shopping">
                <a href="add_cart.php?halaman=keranjang-belanja"><img src="keranjang.png">
                <span class="jumlah">0
                    <!-- <?php echo $cart_count; ?> -->
                </span>
            </a>
            </div>
        </header>
        <?php
        // ?>
        <div class="list">
            <?php
            include 'koneksi.php';
            $sql = "select * from menu ";
            $hasil = mysqli_query($koneksi, $sql);
            $jumlah = mysqli_num_rows($hasil);
            if ($jumlah > 0) {
                while ($data = mysqli_fetch_array($hasil)):
                    ?>
                    <div class="item">
                        <img class="produk" src="shop1.png">
                        <div class="title">
                            <?php echo $data['Nama']; ?>
                        </div>
                        <div class="price">Rp.
                            <?php echo number_format($data['Harga'], 2, ',', '.'); ?>
                        </div>
                        <a href="add_cart.php?halaman=keranjang-belanja&id_menu=<?php echo $data['id_menu']; ?>&aksi=tambah_produk&jumlah=1"
                            class="button" role="button">Masukan Keranjang</a>
                    </div>
                    <div class="item">
                        <img class="produk" src="shop2.png">
                        <div class="title">PRODUK NAME 2</div>
                        <div class="price">120,000</div>
                        <button onclick="addToCard(0)">Add To Card</button>
                    </div>
                    <div class="item">
                        <img class="produk" src="shop3.png">
                        <div class="title">PRODUK NAME 3</div>
                        <div class="price">120,000</div>
                        <button onclick="addToCard(0)">Add To Card</button>
                    </div>
                    <div class="item">
                        <img class="produk" src="shop4.png">
                        <div class="title">PRODUK NAME 4</div>
                        <div class="price">120,000</div>
                        <button onclick="addToCard(0)">Add To Card</button>
                    </div>
                    <div class="item">
                        <img class="produk" src="shop5.png">
                        <div class="title">PRODUK NAME 5</div>
                        <div class="price">120,000</div>
                        <button onclick="addToCard(0)">Add To Card</button>
                    </div>
                    <div class="item">
                        <img class="produk" src="shop6.png">
                        <div class="title">PRODUK NAME 6</div>
                        <div class="price">120,000</div>
                        <button onclick="addToCard(0)">Add To Card</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <h1>Card</h1>
                <ul class="listCard"></ul>
                <div class="checkout">
                    <div class="total">0</div>
                    <div class="tutupShop">Tutup</div>
                </div>
            </div>
            <!-- <?php
                endwhile;
            } else {
                echo "<div class='alert alert-warning'> Tidak ada produk pada kategori ini.</div>";
            }
            ;
            ?> -->
    <script src="keranjang.js"></script>
</body>

</html>