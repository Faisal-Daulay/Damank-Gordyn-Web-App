<div id="main_content">
    <blockquote>
        <p>Ubah Produk</p>
    </blockquote>
    <div class="tambah">
        <a href="?page=produk/produk.php">Back</a>
    </div>
    <div class="style_form">
        <form method="post" action="?page=produk/proses.php" enctype="multipart/form-data">
            <?php
            include 'koneksi.php';
            $id = $_REQUEST['p'];
            $sql = mysqli_query($db, "SELECT * FROM produk WHERE id_produk='$id' ");
            while ($ambil = mysqli_fetch_array($sql)) {

                $id = $ambil['id_produk'];
                $id_kat = $ambil['id_kategori'];
                $napro = $ambil['nama_produk'];
                $kualitas = $ambil['kualitas'];
                $desk = $ambil['desk'];
                $stok = $ambil['stok'];
                $harga = $ambil['harga'];
            ?>
                <table>
                    <tr>
                        <td>Nama Produk</td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="text" name="napro" value="<?php echo $napro; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            <select name="kategori">
                                <?php
                                include 'koneksi.php';
                                $show = mysqli_query($db, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                                while ($dapat = mysqli_fetch_array($show)) {
                                    if ($dapat['id_kategori'] == $id_kat) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                ?>
                                    <option value="<?php echo $dapat['id_kategori']; ?>" <?= $select ?> >
                                        <?php echo $dapat['nama_kategori']; ?>        
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kualitas</td>
                        <td>
                            <input type="text" name="kualitas" value="<?php echo $kualitas; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>
                            <input type="text" name="desk" value="<?php echo $desk; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td>
                            <input type="text" name="stok" value="<?php echo $stok; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>
                            <input type="text" name="harga" value="<?php echo $harga; ?>" />
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
                            <input type="submit" name="tombol" value="Ubah Data">
                            <input type="reset" name="tombol" value="Delete">
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </form>
    </div>
</div>