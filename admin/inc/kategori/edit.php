<div id="main_content">
    <blockquote>
      <p>Ubah Kategori</p>
    </blockquote>
    <div class="tambah">
      <a href="?page=kategori/kategori.php">Back</a>
    </div>
    <div class="style_form">
      <form method="post" action="?page=kategori/proses.php">
            <?php 
              include 'koneksi.php';
              $id = $_REQUEST['p'];
              $sql = mysqli_query($db, "SELECT * FROM kategori WHERE id_kategori = '$id' ");
              while ($ambil = mysqli_fetch_array($sql)) {
                $id = $ambil['id_kategori'];
                $namakat = $ambil['nama_kategori'];
            ?>
            <table>
                <tr>
                    <td>Nama Kategori</td>
                    <td>  
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="text" name="judul" value="<?php echo $namakat; ?>" />
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