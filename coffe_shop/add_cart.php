<?php
if (isset($_GET['id_menu']) && isset($_GET['jumlah'])) {
    $id_menu = $_GET['id_menu'];
    $jumlah = $_GET['jumlah'];
    include 'koneksi.php';
    $sql = "select * from menu where id_menu='$id_menu'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    $id_menu = $data['id_menu'];
    $Nama = $data['Nama'];
    $Harga = $data['Harga'];
    $Jumlah = $data['Jumlah'];
} else {
    $id_menu = "";
    $jumlah = 0;
}

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
} else {
    $aksi = "";
}

switch ($aksi) {
    case "tambah_produk":
        $itemArray = array($id_menu => array('id_menu' => $id_menu, 'nama' => $Nama, 'jumlah' => $jumlah, 'Harga' => $Harga, 'Jumlah' => $Jumlah));
        if (!empty($_SESSION["add_cart"])) {
            if (in_array($data['id_menu'], array_keys($_SESSION["keranjang_belanja"]))) {
                foreach ($_SESSION["keranjang_belanja"] as $k => $v) {
                    if ($data['id_menu'] == $k) {
                        $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"], $itemArray);
                    }
                }
            } else {
                $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"], $itemArray);
            }
        } else {
            $_SESSION["keranjang_belanja"] = $itemArray;
        }
        break;
    //Fungsi untuk menghapus item dalam cart
    case "hapus":

        if (!empty($_SESSION["keranjang_belanja"])) {
            foreach ($_SESSION["keranjang_belanja"] as $k => $v) {
                if ($_GET["id_menu"] == $k)
                    unset($_SESSION["keranjang_belanja"][$k]);
                if (empty($_SESSION["keranjang_belanja"]))
                    unset($_SESSION["keranjang_belanja"]);
            }
        }
        break;

    case "update":
        $itemArray = array($kode_produk => array('id_menu' => $id_menu, 'nama' => $nama, 'jumlah' => $jumlah, 'Harga' => $Harga));
        if (!empty($_SESSION["keranjang_belanja"])) {
            foreach ($_SESSION["keranjang_belanja"] as $k => $v) {
                if ($_GET["id_menu"] == $k)
                    $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"], $itemArray);
            }
        }
        break;
}
?>
<div class="row">
    <h2 style="margin-bottom:30px;">Keranjang Belanja</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th width="40%">Nama</th>
                <th>Harga</th>
                <th width="10%">QTY</th>
                <th>Sub Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sub_total = 0;
            $total = 0;
            $total_berat = 0;
            if (!empty($_SESSION["keranjang_belanja"])):
                foreach ($_SESSION["keranjang_belanja"] as $item):
                    $no++;
                    $sub_total = $item["jumlah"] * $item['Harga'];
                    $total += $sub_total;
                    ?>
                    <input type="hidden" name="id_menu[]" class="id_menu" value="<?php echo $item["id_menu"]; ?>" />
                    <tr>
                        <td>
                            <?php echo $item["id_menu"]; ?>
                        </td>
                        <td>
                            <?php echo $item["nama"]; ?>
                        </td>
                        <td>Rp.
                            <?php echo number_format($item["Harga"], 0, ',', '.'); ?>
                        </td>
                        <td>
                            <input type="number" min="1" value="<?php echo $item["jumlah"]; ?>" class="form-control"
                                id="jumlah<?php echo $no; ?>" name="jumlah[]">
                            <script>
                                $("#jumlah<?php echo $no; ?>").bind('change', function () {
                                    var jumlah<?php echo $no; ?> = $("#jumlah<?php echo $no; ?>").val();
                                    $("#jumlaha<?php echo $no; ?>").val(jumlah<?php echo $no; ?>);
                                });
                                $("#jumlah<?php echo $no; ?>").keydown(function (event) {
                                    return false;
                                });

                            </script>

                        </td>
                        <td>Rp.
                            <?php echo number_format($sub_total, 0, ',', '.'); ?>
                        </td>

                        <td>
                            <form method="get">
                                <input type="hidden" name="id_menu" value="<?php echo $item['id_menu']; ?>"
                                    class="form-control">
                                <input type="hidden" name="aksi" value="update" class="form-control">
                                <input type="hidden" name="halaman" value="keranjang-belanja" class="form-control">
                                <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>"
                                    id="jumlaha<?php echo $no; ?>" value="" class="form-control">
                                <input type="submit" class="btn" value="Update">
                            </form>
                            <a href="add_cart.php?halaman=keranjang-belanja&id_menu=<?php echo $item['id_menu']; ?>&aksi=hapus"
                                class="btn" role="button">Delete</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
    <h3>Total Pembayaran Rp.
        <?php echo number_format($total, 2, ',', '.'); ?>
    </h3>
</div>