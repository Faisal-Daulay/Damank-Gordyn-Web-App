<div class="container">
   <div class="row">
      <div class="col-md-4">
         <?php
            include '../admin/koneksi.php';
            $id_bayar = $_GET['id_bayar'];
            $id_pro = $_GET['id_pro'];
         ?>
         <form action="?page=paket/pro_ulasan.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <label for="exampleInputPassword1">Berikan Ulasan</label>
               <input type="hidden" name="id_bayar" value="<?= $id_bayar ?>">
               <input type="hidden" name="id_pro" value="<?= $id_pro ?>">
               <textarea name="ulasan" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Rating</label>
               <!-- <select name="rating" class="form-control">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
               </select> -->
               <datalist id="rating">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
               </datalist>
               <input list="rating" class="form-control" name="rating">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Send </button>
         </form>
      </div>
   </div>
</div>