<div id="main_content">
    <blockquote>
      <p>Ubah User</p>
    </blockquote>
    <div class="tambah">
      <a href="?page=user/user.php">Back</a>
    </div>
    <div class="style_form">
      <form method="post" action="?page=user/proses.php">
            <?php 
              include 'koneksi.php';
              $id = $_REQUEST['p'];
              $sql = mysqli_query($db, "SELECT * FROM admin WHERE id_admin = '$id' ");
              while ($ambil = mysqli_fetch_array($sql)) {
                $id = $ambil['id_admin'];
                $user = $ambil['username'];
                $pass = $ambil['password'];
                $stats = $ambil['status'];
            ?>
            <table>
                <tr>
                    <td>Username</td>
                    <td>  
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="text" name="user" value="<?php echo $user; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>    
                        <input type="password" name="pass" value="<?php echo $pass; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>    
                        <select name="stat">
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>    
                    </td>
                </tr>
                <tr>
                  <td></td>
                    <td>
                        <input type="submit" name="tombol" value="Ubah">
                        <input type="reset" name="tombol" value="Delete">
                    </td>
                </tr>
            </table>
            <?php } ?>
        </form>
    </div>
</div>