<?php
  $id=$_GET['inKerId'];
  $sqlBuk=mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku=$id");
  $datBuk=mysqli_fetch_array($sqlBuk);
 ?>
 <div class="header">Tambahkan ke-Keranjang</div>
 <form class="ui form segment" action="proses.php" method="post">
   <div class="field">
     <label>Judul Buku</label>
     <input type="text" name="judulBuku" value="<?php echo $datBuk[1]; ?>" disabled>
   </div>
   <div class="field">
     <label>QTY <i>(*minimal 1 tidak boleh lebih dari <?php echo $datBuk[5]; ?>)</i></label>
     <input type="text" name="qty" value="1">
   </div>
   <input type="hidden" name="id" value="<?php echo $datBuk[0]; ?>">
   <div class="actions ">
     <button class="ui primary button" type="submit" name="isiKeranjang">Tambah ke keranjang</button>
   </div>
 </form>
