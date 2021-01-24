<?php
include 'koneksi.php';

if ($_POST) {

   $id_transfer = $_POST['id_transfer'];

   $resi = $_POST['resi'];

   $sql = mysqli_query($db, "UPDATE pembayaran SET status_paket = 'dalam pengiriman', bukti_resi = '$resi' WHERE id_bayar = '$id_transfer' ");
   echo "
      <script>
         window.location = '?page=content.php'
      </script>';
   ";
} else {
   $hapus = $_GET['hapus'];

   $sql = mysqli_query($db, "DELETE FROM pembayaran WHERE id_bayar='$hapus' ");
   echo "
      <script>
         window.location = '?page=content.php'
      </script>';
   ";
}
