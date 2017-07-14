<?php
  $id=$_GET['editBukId'];
  $sql=mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku=$id");
  $data=mysqli_fetch_array($sql);
 ?>
 <div class="header">Tamabh Buku</div>
 <form class="ui form segment " action="proses.php" method="post">
   <div class="field">
     <label>Judul Buku</label>
     <input type="text" name="judulBuku" value="<?php echo $data[1];?>">
   </div>
   <div class="field">
     <label>Pengarang</label>
     <input type="text" name="pengarang" value="<?php echo $data[2];?>">
   </div>
   <div class="field">
     <label>Penerbit</label>
     <select class="ui dropdown" name="penerbit">
       <?php
          $o = mysqli_query($koneksi, "select * from penerbit where id_penerbit='$data[3]' order by nama_penerbit");
          $s = mysqli_fetch_array($o);
       ?>
       <option value="<?php echo $s[0];?>"><?php echo $s[1];?></option>
       <?php
           $oaoe = mysqli_query($koneksi, "select * from penerbit where id_penerbit!='$data[3]' order by nama_penerbit");
           while($oa = mysqli_fetch_array($oaoe)){
       ?>
         <option value="<?php echo $oa[0]; ?>"><?php echo $oa['nama_penerbit']; ?></option>
       <?php } ?>
     </select>
   </div>
   <div class="field">
     <label>Harga</label>
     <input type="text" name="harga" value="<?php echo $data[4];?>">
   </div>
   <div class="field">
     <label>QTY</label>
     <input type="text" name="qty" value="<?php echo $data[5];?>">
   </div>
   <div class="field">
     <label>Gambar</label>
     <input type="file" name="gambar" value="<?php echo $data[6];?>" >
   </div>
   <input type="hidden" name="id" value="<?php echo $data[0];?>">
   <div class="actions ">
     <button class="ui primary button" type="submit" name="updateBuku">Simpan</button>
   </div>
 </form>
