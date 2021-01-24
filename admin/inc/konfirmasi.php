<?php

include 'koneksi.php';

if ($transfer = $_GET['transfer']) {
?>
   <div id="main_content">
      <blockquote>
         <p>Produk</p>
      </blockquote>
      <div class="col-md-3">
         <form action="?page=proses_konfirmasi.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <label>No Resi</label>
               <input type="hidden" class="form-control" name="id_transfer" value="<?= $transfer; ?>">
               <input type="text" class="form-control" name="resi" placeholder="Input  No Resi">
            </div>
            <div class="form-group">
               <input type="submit" value="Upload Resi" class="btn btn-success">
            </div>
         </form>
      </div>
   </div>
<?php
} elseif ($cod = $_GET['cod']) {

   $sql = mysqli_query($db, "UPDATE pembayaran SET status_paket = 'dalam pengiriman' WHERE id_bayar = '$cod' ");

   echo "
      <script>
         window.location = '?page=content.php'
      </script>';
   ";
}
?>