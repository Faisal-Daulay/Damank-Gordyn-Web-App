<div id="main_content">
    <blockquote>
        <p>Customer</p>
    </blockquote>
    <div class="tambah">
        <a href="?page=user/user_form.php">Add New Customer</a>
    </div>

    <div id="tampil">
        <?php
        include 'koneksi.php';
        $tampil = mysqli_query($db, "SELECT * FROM register ORDER BY id_regis DESC");
        $start = 1;
        ?>
        <table class="table table-bordered table-hover" id="tabel-data">
            <thead>
                <tr class="top">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Provinsi</th>
                    <th>Kabupaten</th>
                    <th>Foto Profil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($ambil = mysqli_fetch_array($tampil)) {
                    if ($start % 2 == 0)
                        $color = "ganjil";
                    else
                        $color = "genap";

                    $id = $ambil['id_regis'];
                    $nama = $ambil['nama'];
                    $email = $ambil['email'];
                    $alamat = $ambil['alamat'];
                    $no_tel = $ambil['no_tel'];
                    $jk = $ambil['jk'];
                    $tanggal_lahir = $ambil['tanggal_lahir'];
                    $provinsi = $ambil['provinsi'];
                    $kabupaten = $ambil['kabupaten'];
                    $foto = $ambil['foto'];
                ?>
                    <tr class="<?php echo $color; ?>">
                        <td><?php echo $start++; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $no_tel; ?></td>
                        <td><?php echo $jk; ?></td>
                        <td><?php echo $tanggal_lahir; ?></td>
                        <td><?php echo $provinsi; ?></td>
                        <td><?php echo $kabupaten; ?></td>
                        <td>
                            <img src="../img/profil/<?php echo $foto; ?>.jpg" alt="" width="100">
                        </td>
                        <td>
                            <a class="btn btn-danger" href="?page=user/edit.php&p=<?php echo $id; ?>">Edit</a>
                            <a class="btn btn-danger" href="?page=user/proses.php&p=<?php echo $id; ?>&hapus=hapus">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>