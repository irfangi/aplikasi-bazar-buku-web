<?php
  $id=$_GET['editPenId'];
  $sql=mysqli_query($koneksi,"SELECT * FROM penerbit WHERE id_penerbit=$id");
  $data=mysqli_fetch_array($sql);
 ?>
<div class="header">Edit Penerbit</div>
<form class="ui form segment " action="proses.php" method="post">
  <div class="field">
    <label>Nama Penerbit</label>
    <input type="text" name="namaPenerbit" value="<?php echo $data[1]; ?>">
  </div>
  <div class="field">
    <label>Diskon</label>
    <input type="text" name="diskon" value="<?php echo $data[2]; ?>">
  </div>
  <input type="hidden" name="id" value="<?php echo $data[0]; ?>">
  <div class="actions ">
    <button class="ui primary button" type="submit" name="updatePenerbit">Perbaharui</button>
  </div>
</form>
