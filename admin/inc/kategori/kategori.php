<div id="main_content">
    <blockquote>
        <p>Kategori</p>
    </blockquote>
    <div class="tambah">
        <a href="?page=kategori/kat_form.php">Add New kategori</a>
    </div>

    <div id="tampil">
        <?php
        // $limit = 5; //Untuk menampilkan jumlah data dari database
        // $hal = $_GET['hal']; //Jumlah halaman di mulai dari 1
        // if (!isset($hal)) {
        //     $hal = 1;
        // }
        // $start = ($hal - 1) * $limit;
        include 'koneksi.php';
        $tampil = mysqli_query($db, "SELECT * FROM kategori ORDER BY id_kategori DESC");
        // $jmlhdata = mysqli_num_rows(mysqli_query($db, "SELECT * FROM kategori"));
        // $jmlhhal = ceil($jmlhdata / $limit);
        // if ($jmlhhal < 1) {
        //     $jmlhhal = 1;
        // }
        ?>
        <table class="table table-bordered table-hover" id="tabel-data">
            <thead>
                <tr class="top">
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $start = 1;
                while ($ambil = mysqli_fetch_array($tampil)) {
                    $id = $ambil['id_kategori'];
                    $namakat = $ambil['nama_kategori'];
                ?>
                    <tr>
                        <td><?php echo $start++; ?></td>
                        <td><?php echo $namakat; ?></td>
                        <td>
                            <a class="btn btn-danger" href="?page=kategori/edit.php&p=<?php echo $id; ?>">Edit</a>
                            <a class="btn btn-danger" href="?page=kategori/proses.php&p=<?php echo $id; ?>&hapus=hapus">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- <div id="page">
        <?php

        echo "<a>Page $hal Of $jmlhhal</a>";

        $satu = 1;
        if ($satu < $hal) {
            echo "<a href='?page=kategori/kategori.php&hal=$satu'>First</a>";
        }

        $prev = $hal - 1;
        if ($hal - 1) {
            echo "<a href='?page=kategori/kategori.php&hal=$prev'>Previous</a>";
        }

        for ($i = 1; $i <= $jmlhhal; $i++) {
            echo "<a href='?page=kategori/kategori.php&hal=$i'>$i</a>";
        }

        $next = $hal + 1;
        if ($hal < $jmlhhal) {
            echo "<a href='?page=kategori/kategori.php&hal=$next'>Next</a>";
        }

        $last = $jmlhhal;
        if ($jmlhhal > $hal) {
            echo "<a href='?page=kategori/kategori.php&hal=$last'>Last</a>";
        }
        ?>
    </div> -->
</div>