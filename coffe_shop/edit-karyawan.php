<html>
<a href="karyawan.php">kembali</a>
<h3>Edit Buku</h3>
<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from karyawan where id_karyawan='$id'");
while ($tampil = mysqli_fetch_array($data)) {
    ?>

    <form method="post" action="edit-aksi-karyawan.php">
        <table>
            <tr>
                <td>ID Karyawan</td>
                <td><input type="number" name="id_karyawan" value="<?php echo $tampil['id_karyawan']; ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama" value="<?php echo $tampil['Nama']; ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="Gender" value="<?php echo $tampil['Gender']; ?>"></td>
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