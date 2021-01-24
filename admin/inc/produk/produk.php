<div id="main_content">
    <blockquote>
        <p>Produk</p>
    </blockquote>
    <div class="tambah">
        <a href="?page=produk/pro_form.php">Add New Produk</a>
    </div>

    <div id="tampil">
        <?php
        include 'koneksi.php';
        $tampil = mysqli_query($db, "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori INNER JOIN img_produk ON produk.id_produk = img_produk.id_produk ORDER BY produk.id_produk DESC");
        $start = 1;
        ?>
        <table class="table table-bordered table-hover" id="tabel-data">
            <thead>
                <tr class="top">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Kualitas</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Image</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($ambil = mysqli_fetch_array($tampil)) {
                    $id = $ambil['id_produk'];
                    $napro = $ambil['nama_produk'];
                    $kualitas = $ambil['kualitas'];
                    $desk = $ambil['desk'];
                    $stok = $ambil['stok'];
                    $harga = $ambil['harga'];
                    $nama_kategori = $ambil['nama_kategori'];
                    $img = $ambil['img'];
                ?>
                    <tr>
                        <td><?php echo $start++; ?></td>
                        <td><?php echo $napro; ?></td>
                        <td><?php echo $nama_kategori; ?></td>
                        <td><?php echo $kualitas; ?></td>
                        <td><?php echo $desk; ?></td>
                        <td><?php echo $stok; ?></td>
                        <td>
                            <img src="../img/produk/<?php echo $img; ?>" class="img-fluid">
                        </td>
                        <td><?php echo "Rp. " . number_format($harga, 0, ',', '.'); ?></td>
                        <td>
                            <a class="btn btn-danger" href="?page=produk/edit.php&p=<?php echo $id; ?>">Edit</a>
                            <a class="btn btn-danger" href="?page=produk/proses.php&p=<?php echo $id; ?>&hapus=hapus">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>