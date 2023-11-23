<html>
<a href="karyawan.php">kembali</a>
<h3>Edit Buku</h3>
<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from transaksi where id_transaksi='$id'");
while ($tampil = mysqli_fetch_array($data)) {
    ?>

    <form method="post" action="edit-aksi-transaksi.php">
        <table>
            <tr>
                <td>id_transaksi</td>
                <td><input type="number" name="id_transaksi" value="<?php echo $tampil['id_transaksi']; ?>"></td>
            </tr>
            <tr>
                <td>id_karyawan</td>
                <td><input type="number" name="id_karyawan" value="<?php echo $tampil['id_karyawan']; ?>"></td>
            </tr>
            <tr>
                <td>id_menu</td>
                <td><input type="number" name="id_menu" value="<?php echo $tampil['id_menu']; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="Harga" value="<?php echo $tampil['Harga']; ?>"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="number" name="Jumlah" value="<?php echo $tampil['Jumlah']; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="simpan"></td>
            </tr>
        </table>
    </form>

    <?php
}
?>

</html>