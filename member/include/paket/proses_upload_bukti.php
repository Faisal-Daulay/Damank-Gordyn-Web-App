<?php
include '../admin/koneksi.php';

if ($_POST) {

   // $id_bayar = $_POST['id'];
   foreach ($_FILES['upload_bukti']['name'] as $key1 => $val1) {

      foreach ($_POST['id_prooduk'] as $key => $value) {
         $nama_file   = $_FILES['upload_bukti']['name'][$key1];
         $lokasi_awal = $_FILES['upload_bukti']['tmp_name'][$key1];

         $tgl_upload = date('Y-m-d');
         $lokasi_baru = "../img/bukti_bayar/" . $nama_file;

         $id_pro = $_POST['id_prooduk'][$key];

         move_uploaded_file($lokasi_awal, $lokasi_baru);
         $sql = mysqli_query($db, "UPDATE pembayaran SET bukti_pembayaran = '$nama_file', tgl_bayar='$tgl_upload' WHERE id_bayar = '$id_pro' ");
      }
   }

?>
   <div class="main_content">
      <h1>Bukti Pembayaran Sudah di Kirim</h1>
      <p>
         Pesanan anda sedang di proses
      </p>
      <p>
         Terima kasih sudah belanja di website kami, Toko Kami akan menghubungi anda secepat mungkin untuk memproses belanja anda
      </p>
      <a href="?page=aksesoris.php" class="btn btn-default">LANJUTKAN BELANJA</a>
   </div>

   <div class="row">
      <h3 class="text-center">HANYA UNTUK KAMU</h3>
      <hr width="200">
      <?php
      include '../admin/koneksi.php';
      $cari = $_REQUEST['cari'];
      $sql = mysqli_query($db, "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_produk LIKE '%$cari%' AND nama_kategori='Aksesoris' ORDER BY produk.id_produk DESC");
      while ($ambil = mysqli_fetch_array($sql)) {
         $id = $ambil['id_produk'];
         $napro = $ambil['nama_produk'];
         $kualitas = $ambil['kualitas'];
         $desk = $ambil['desk'];
         $stok = $ambil['stok'];
         $harga = $ambil['harga'];
         $diskon = $ambil['diskon'];

         $dml = mysqli_query($db, "SELECT * FROM img_produk WHERE id_produk='$id' ");
         $ambil_img = mysqli_fetch_array($dml);
         $img = $ambil_img['img'];

         $diskon1 = (($harga * $diskon) / 100);
         $bayar1 = ($harga - $diskon1);

         if ($kualitas == 'Baru') {
            $color = 'btn-primary';
         } else {
            $color = 'btn-warning';
         }
      ?>
         <div class="col-md-3">
            <div class="produk">
               <p>
                  <small class="<?php echo $color; ?>"><?php echo $kualitas; ?></small>
                  <small class="btn-danger" style="padding: 2px; font-size: 18px; border-radius: 10px;"><?php echo $diskon; ?>%</small>
               </p>
               <div class="imgpro">
                  <img src="../img/produk/<?php echo $img; ?>">
               </div>
               <div class="caption">
                  <h3 class="text-capitalize"><?php echo $napro; ?></h3>
                  <p style="color: grey">
                     <del>
                        <?php echo "Rp. " . number_format($harga, 0, ',', '.'); ?>
                     </del>
                  </p>
                  <p>
                     <?php echo "Rp. " . number_format($bayar1, 0, ',', '.'); ?>
                  </p>
                  <p>
                     <small>Stok : <?php echo $stok; ?></small>
                  </p>
                  <p>
                     <a href="?page=detail.php&detail=<?php echo $id; ?>" class="btn btn-primary" role="button">Lihat Detail</a>
                  </p>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>
<?php } else {

   $hapus = $_GET['hapus'];

   $sql = mysqli_query($db, "DELETE FROM pembayaran WHERE id_bayar='$hapus' ");
?>
   <div class="main_content text-center">
      <h1>Anda telah membatalkan pembelian..</h1>
      <a href="?page=aksesoris.php" class="btn btn-default">LANJUTKAN BELANJA</a>
      <hr>
   </div>
   <div class="row">
      <h3 class="text-center">HANYA UNTUK KAMU</h3>
      <hr width="200">
      <?php
      include '../admin/koneksi.php';
      $cari = $_REQUEST['cari'];
      $sql = mysqli_query($db, "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_produk LIKE '%$cari%' AND nama_kategori='Aksesoris' ORDER BY produk.id_produk DESC");
      while ($ambil = mysqli_fetch_array($sql)) {
         $id = $ambil['id_produk'];
         $napro = $ambil['nama_produk'];
         $kualitas = $ambil['kualitas'];
         $desk = $ambil['desk'];
         $stok = $ambil['stok'];
         $harga = $ambil['harga'];
         $diskon = $ambil['diskon'];

         $dml = mysqli_query($db, "SELECT * FROM img_produk WHERE id_produk='$id' ");
         $ambil_img = mysqli_fetch_array($dml);
         $img = $ambil_img['img'];

         $diskon1 = (($harga * $diskon) / 100);
         $bayar1 = ($harga - $diskon1);

         if ($kualitas == 'Baru') {
            $color = 'btn-primary';
         } else {
            $color = 'btn-warning';
         }
      ?>
         <div class="col-md-3">
            <div class="produk">
               <p>
                  <small class="<?php echo $color; ?>"><?php echo $kualitas; ?></small>
                  <small class="btn-danger" style="padding: 2px; font-size: 18px; border-radius: 10px;"><?php echo $diskon; ?>%</small>
               </p>
               <div class="imgpro">
                  <img src="../img/produk/<?php echo $img; ?>">
               </div>
               <div class="caption">
                  <h3 class="text-capitalize"><?php echo $napro; ?></h3>
                  <p style="color: grey">
                     <del>
                        <?php echo "Rp. " . number_format($harga, 0, ',', '.'); ?>
                     </del>
                  </p>
                  <p>
                     <?php echo "Rp. " . number_format($bayar1, 0, ',', '.'); ?>
                  </p>
                  <p>
                     <small>Stok : <?php echo $stok; ?></small>
                  </p>
                  <p>
                     <a href="?page=detail.php&detail=<?php echo $id; ?>" class="btn btn-primary" role="button">Lihat Detail</a>
                  </p>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>
<?php } ?>