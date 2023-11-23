<html>
<a href="karyawan.php">kembali</a>
<h3>Edit Buku</h3>
<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from menu where id_menu='$id'");
while ($tampil = mysqli_fetch_array($data)) {
    ?>

    <form method="post" action="edit-aksi-menu.php">
        <table>
            <tr>
                <td>ID menu</td>
                <td><input type="number" name="id_menu" value="<?php echo $tampil['id_menu']; ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama" value="<?php echo $tampil['Nama']; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="Harga" value="<?php echo $tampil['Harga']; ?>"></td>
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