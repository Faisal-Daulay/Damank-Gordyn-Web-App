<div id="main_content">
    <blockquote>
        <p>Tambah Produk</p>
    </blockquote>
    <div class="tambah">
        <a href="?page=produk/produk.php">Back</a>
    </div>
    <div class="style_form">
        <form method="post" action="?page=produk/proses.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nama Produk</td>
                    <td>
                        <input type="text" name="napro" />
                    </td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori">
                            <option>--PILIH--</option>
                            <?php
                            include 'koneksi.php';
                            $show = mysqli_query($db, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                            while ($dapat = mysqli_fetch_array($show)) {
                            ?>
                                <option value="<?php echo $dapat['id_kategori']; ?>"><?php echo $dapat['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kualitas</td>
                    <td>
                        <input type="text" name="kualitas" />
                    </td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>
                        <input type="text" name="desk" />
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td>
                        <input type="text" name="stok" />
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>
                        <input type="text" name="harga" />
                    </td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>
                        <input type="text" name="diskon" />
                    </td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td>
                        <input type="file" name="upload[]" accept="image/*" multiple="multiple" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="tombol" value="Simpan">
                        <input type="reset" name="tombol" value="Delete">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>