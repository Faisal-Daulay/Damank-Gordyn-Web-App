<?php
include 'koneksi.php';
?>
<div id="main_content">
    <blockquote>
        <p>Howdy <?php echo $username; ?></p>
    </blockquote>
    <h1>
        Konfirmasi Pembayaran
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="tabel-data">
            <thead>
                <tr class="top">
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Produk</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Bukti Pembayaran</th>
                    <th>No Resi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'koneksi.php';

                $sql = mysqli_query($db, "SELECT * FROM pembayaran INNER JOIN produk ON pembayaran.id_produk = produk.id_produk INNER JOIN register ON pembayaran.id_regis = register.id_regis ORDER BY id_bayar DESC");
                $no = 1;
                while ($ambil = mysqli_fetch_array($sql)) {
                    $id_bayar = $ambil['id_bayar'];
                    $nama_produk = $ambil['nama_produk'];
                    $nama = $ambil['nama'];
                    $invoice = $ambil['invoice'];
                    $metode_bayar = $ambil['metode_bayar'];
                    $tgl_pesan = $ambil['tgl_pesan'];
                    $tgl_bayar = $ambil['tgl_bayar'];
                    $jumlah = $ambil['jumlah'];
                    $total = $ambil['total'];
                    $status_paket = $ambil['status_paket'];
                    $bukti_pembayaran = $ambil['bukti_pembayaran'];
                    $bukti_resi = $ambil['bukti_resi'];

                    if ($metode_bayar == "transfer") {
                        $tombol_aksi = "<a href='?page=konfirmasi.php&transfer=$id_bayar' class='btn btn-primary'>Upload Resi</a>";
                        $tombol_batal = "<a href='?page=proses_konfirmasi.php&hapus=$id_bayar' class='btn btn-danger'>Batal</a>";
                    } elseif ($metode_bayar == "cod") {
                        $tombol_aksi = "<a href='?page=konfirmasi.php&cod=$id_bayar' class='btn btn-primary'>Kirim</a>";
                        $tombol_batal = "<a href='?page=proses_konfirmasi.php&hapus=$id_bayar' class='btn btn-danger'>Batal</a>";
                    }

                    if ($status_paket == "dalam proses") {

                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $invoice; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $nama_produk; ?></td>
                        <td class="text-capitalize"><?= $metode_bayar; ?></td>
                        <td><?= $tgl_pesan; ?></td>
                        <td><?= $tgl_bayar; ?></td>
                        <td><?= $jumlah; ?></td>
                        <td><?php echo "Rp. " . number_format($total, 0, ',', '.'); ?></td>
                        <td class="text-capitalize"><?= $status_paket; ?></td>
                        <td><img src="../img/bukti_bayar/<?= $bukti_pembayaran ?>" width="200" alt="<?= $metode_bayar; ?>"></td>
                        <td><?= $bukti_resi;  ?></td>
                        <td>
                            <?= $tombol_aksi; ?>
                            <?= $tombol_batal; ?>
                        </td>
                    </tr>
                <?php } elseif ($status_paket == "dalam pengiriman") { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $invoice; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $nama_produk; ?></td>
                        <td class="text-capitalize"><?= $metode_bayar; ?></td>
                        <td><?= $tgl_pesan; ?></td>
                        <td><?= $tgl_bayar; ?></td>
                        <td><?= $jumlah; ?></td>
                        <td><?php echo "Rp. " . number_format($total, 0, ',', '.'); ?></td>
                        <td class="text-capitalize"><?= $status_paket; ?></td>
                        <td><img src="../img/bukti_bayar/<?= $bukti_pembayaran ?>" width="200" alt="<?= $metode_bayar; ?>"></td>
                        <td><?= $bukti_resi; ?></td>
                        <td><button class="btn btn-warning text-capitalize"><?= $status_paket; ?></button></td>
                    </tr>
                <?php } elseif ($status_paket == "selesai") { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $invoice; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $nama_produk; ?></td>
                        <td class="text-capitalize"><?= $metode_bayar; ?></td>
                        <td><?= $tgl_pesan; ?></td>
                        <td><?= $tgl_bayar; ?></td>
                        <td><?= $jumlah; ?></td>
                        <td><?php echo "Rp. " . number_format($total, 0, ',', '.'); ?></td>
                        <td class="text-capitalize"><?= $status_paket; ?></td>
                        <td><img src="../img/bukti_bayar/<?= $bukti_pembayaran ?>" width="200" alt="<?= $metode_bayar; ?>"></td>
                        <td><?= $bukti_resi; ?></td>
                        <td><button class="btn btn-success text-capitalize"><?= $status_paket; ?></button></td>
                    </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>