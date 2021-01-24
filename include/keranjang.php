<?php
include 'admin/koneksi.php';
$tombol = $_REQUEST['tombol'];

function tambah()
{
      $id = $_REQUEST['id_produk'];
      $jumlah1 = $_REQUEST['jumlah1'];

      $napro = $_SESSION['nama_produk'];
      $harga = $_SESSION['harga'];
      $stok = $_SESSION['stok'];
      $img = $_SESSION['img'];
      $diskon = $_SESSION['diskon'];
      $id = $_SESSION['id_produk'];

      $_SESSION['jlh_item']++;
      $urut = $_SESSION['jlh_item'];

      $_SESSION['item'][$urut]['id_produk'] = $id;
      $_SESSION['item'][$urut]['nama_produk'] = $napro;
      $_SESSION['item'][$urut]['harga'] = $harga;
      $_SESSION['item'][$urut]['jumlah1'] = $jumlah1;
      $_SESSION['item'][$urut]['stok'] = $stok;
      $_SESSION['item'][$urut]['img'] = $img;
      $_SESSION['item'][$urut]['diskon'] = $diskon;

      $total += $harga;
      $_SESSION['harga'] = $total;

      //header("location: ?page=detail.php&detail=$id ");
      echo
            "
                  <script>
                        window.location = '?page=aksesoris.php'
                  </script>
            ";
}

function beli()
{
      $id = $_REQUEST['id_produk'];
      $jumlah1 = $_REQUEST['jumlah1'];

      $napro = $_SESSION['nama_produk'];
      $harga = $_SESSION['harga'];
      $stok = $_SESSION['stok'];
      $img = $_SESSION['img'];
      $diskon = $_SESSION['diskon'];
      $id = $_SESSION['id_produk'];

      $_SESSION['jlh_item']++;
      $urut = $_SESSION['jlh_item'];

      $_SESSION['item'][$urut]['id_produk'] = $id;
      $_SESSION['item'][$urut]['nama_produk'] = $napro;
      $_SESSION['item'][$urut]['harga'] = $harga;
      $_SESSION['item'][$urut]['jumlah1'] = $jumlah1;
      $_SESSION['item'][$urut]['stok'] = $stok;
      $_SESSION['item'][$urut]['img'] = $img;
      $_SESSION['item'][$urut]['diskon'] = $diskon;

      $total += $harga;
      $_SESSION['harga'] = $total;

      //header("location: ?page=detail.php&detail=$id ");
      echo
            "
                  <script>
                        window.location = '?page=bayar/bayar.php&member=member'
                  </script>
            ";
}

function hapus()
{
      $item = $_REQUEST['del'];
      $id = $_REQUEST['keranjang'];
      if ($item != "") {
            foreach ($item as $barang) {
                  $_SESSION['total_bayar'] -= $_SESSION['item'][$barang]['total'];
                  unset($_SESSION['item'][$barang]);
            }
      } else {
            echo
                  "
                     <script>
                        alert('Pilih dahulu data yang ingin di hapus')
                        window.location = '?page=content.php';
                     </script>
                  ";
      }

      //header("location: ?page=detail.php&detail=$id ");
      echo
            "
                  <script>
                        window.location = '?page=content.php'
                  </script>
            ";
}



switch ($tombol) {
      case 'Tambah ke Troli':
            tambah();
            break;
      case 'Beli Sekarang':
            beli();
            break;
      case '+':
            tambah();
            break;
      case 'Hapus Item':
            hapus();
            break;
}
