<div id="main_content">
    <blockquote>
        <p>User</p>
    </blockquote>
    <div class="tambah">
        <a href="?page=user/user_form.php">Add New User</a>
    </div>

    <div id="tampil">
        <?php
        include 'koneksi.php';
        $tampil = mysqli_query($db, "SELECT * FROM admin ORDER BY id_admin DESC");
        $start = 1;
        ?>
        <table class="table table-bordered table-hover" id="tabel-data">
            <thead>
                <tr class="top">
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($ambil = mysqli_fetch_array($tampil)) {
                    $id = $ambil['id_admin'];
                    $user = $ambil['username'];
                    $pass = $ambil['password'];
                    $stats = $ambil['status'];
                ?>
                    <tr>
                        <td><?php echo $start++; ?></td>
                        <td><?php echo $user; ?></td>
                        <td><?php echo $pass; ?></td>
                        <td><?php echo $stats; ?></td>
                        <td>
                            <a href="?page=user/edit.php&p=<?php echo $id; ?>" class=" btn btn-danger">Edit</a>
                            <a href=" ?page=user/proses.php&p=<?php echo $id; ?>&hapus=hapus" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>