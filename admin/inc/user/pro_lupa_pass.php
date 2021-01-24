<?php
include '../../koneksi.php';
if ($_POST) {
   $username = $_POST['user'];
   $cek = mysqli_query($db, "SELECT username FROM admin WHERE username = '$username' ");
   if (mysqli_num_rows($cek) == 1) {
      $password   = $_POST['pass'];
      $repassword = $_POST['repass'];
      if ($password != $repassword) {
?>
         <script>
            alert("Inputan password tidak sama");
            window.location.href = '../../lupa_pass.php';
         </script>
         <?php
      } else {
         $sql = mysqli_query($db, "UPDATE admin SET password = '$repassword' WHERE username = '$username' ");
         if ($sql) {
         ?>
            <script>
               alert("Password telah di perbarui");
               window.location.href = '../../login.php';
            </script>
         <?php
         } else {
         ?>
            <script>
               alert("Password gagal diperbaharui");
               window.location.href = '../../lupa_pass.php';
            </script>
      <?php
         }
      }
   } else {
      ?>
      <script>
         alert("Pastikan username yang anda masukan benar!");
         window.location.href = '../../lupa_pass.php';
      </script>
<?php
   }
}
?>