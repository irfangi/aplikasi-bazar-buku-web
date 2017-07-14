<th>Laporan Penjualan</th>
<form class="ui form segment" action="" method="post">
  <div class="field">
    <label></label>
    <div class="ui input">
      <select class="ui dropdown" name="namLap">
        <?php
            $oaoe = mysqli_query($koneksi, "select * from penerbit order by nama_penerbit");
            while($oa = mysqli_fetch_array($oaoe)){
        ?>
          <option value="<?php echo $oa[0]; ?>"><?php echo $oa['nama_penerbit']; ?></option>
        <?php } ?>
      </select>
      <button type="submit" name="kirLap"><i class="right chevron icon"></i></button>
    </div>
  </div>
</form>
<div class="">
  <?php include 'lapHarian.php'; ?>
</div>
