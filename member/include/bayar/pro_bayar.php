<?php
include '../admin/koneksi.php';
if (is_array($_SESSION['item'])) {
   foreach ($_SESSION['item'] as $index => $barang) {
      $napro = $barang['nama_produk'];
      $id = $barang['id_produk'];
      $harga = $barang['harga'];
      $jumlah1 = $barang['jumlah1'];
      $diskon = $barang['diskon'];

      $diskon1 = (($harga * $diskon) / 100);
      $bayar1 = ($harga - $diskon1);
      $tobay = $jumlah1 * $bayar1;
      $subtotal += $tobay;

      unset($_SESSION['item'][$index]);
   }
}

$metode = $_POST['metode'];
$id_produk = $_POST['id_produk'];
$jumlah_barang = $_POST['jumlah_barang'];
$total_bayar = $_POST['total_bayar'];
$bayar_transfer = $_POST['bayar_transfer'];
$bayar_cod = $_POST['bayar_cod'];

// MENGAMBIL DATA UNTUK URUTAN INVOICE
$query = mysqli_query($db, "SELECT max(invoice) as inv FROM pembayaran");
$data = mysqli_fetch_array($query);
$invoice = $data['inv'];

$noUrut = (int) substr($invoice, 8, 1);
$noUrut++;

$order = date('Y-m-d');
list($year1, $month1, $day1) = explode('-', $order);
$tgl1 = $day1 . $month1 . $year1;

$invoice = sprintf("%03s", $tgl1 . $noUrut);

if ($metode == "transfer") {
   $bayar_total_transfer = $bayar_transfer + $total_bayar;
   foreach ($id_produk as $key => $val) {

      //echo ' id produk = ' . $id_produk[$key] . ' jumlah barang = ' . $jumlah_barang[$key] . '<br/>';
      $id_pro = $id_produk[$key];
      $jumbar = $jumlah_barang[$key];

      $sql = mysqli_query($db, "INSERT INTO pembayaran (id_produk, id_regis, invoice, metode_bayar, tgl_pesan, jumlah, total, status_paket) VALUES ('$id_pro', '$id_regis', '$invoice', '$metode', '$order', '$jumbar', '$bayar_total_transfer', 'dalam proses')");

      $id_bayar = mysqli_insert_id($db);

      echo
         "
      		<script>
      			window.location = '?page=paket/upload_bukti.php&id=$invoice'
      		</script>
         ";
   }
} elseif ($metode == "cod") {

   foreach ($id_produk as $key => $val) {

      //echo ' id produk = ' . $id_produk[$key] . ' jumlah barang = ' . $jumlah_barang[$key] . '<br/>';
      $id_pro = $id_produk[$key];
      $jumbar = $jumlah_barang[$key];

      $sql = mysqli_query($db, "INSERT INTO pembayaran (id_produk, id_regis, invoice, metode_bayar, tgl_pesan, jumlah, total, status_paket) VALUES ('$id_pro', '$id_regis', '$invoice', '$metode', NOW(), '$jumbar', '$total_bayar', 'dalam proses')");

      echo
         "
      		<script>
      			window.location = '?page=paket/lacak_paket.php'
      		</script>
         ";
   }
} else {
   echo
      "
			<script>
				alert('Transaksi Gagal');
				window.location = '?page=bayar/bayar.php&member=member'
			</script>
        ";
}
