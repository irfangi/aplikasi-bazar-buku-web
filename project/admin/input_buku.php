<div class="ui small modal " id="modal_tambah">
  <div class="header">Tamabh Buku</div>
  <form class="ui form segment " action="proses.php" method="post">
    <div class="field">
      <label>Judul Buku</label>
      <input type="text" name="judulBuku" placeholder="Judul Buku">
    </div>
    <div class="field">
      <label>Pengarang</label>
      <input type="text" name="pengarang" placeholder="Pengarang">
    </div>
    <div class="field">
      <label>Penerbit</label>
      <select class="ui dropdown" name="penerbit">
        <option value="">Penerbit</option>
        <?php
            $oaoe = mysqli_query($koneksi, "select * from penerbit order by nama_penerbit");
            while($oa = mysqli_fetch_array($oaoe)){
        ?>
          <option value="<?php echo $oa[0]; ?>"><?php echo $oa['nama_penerbit']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="field">
      <label>Harga</label>
      <input type="text" name="harga" placeholder="harga">
    </div>
    <div class="field">
      <label>QTY</label>
      <input type="text" name="qty" placeholder="QTY">
    </div>
    <div class="field">
      <label>Gambar</label>
      <input type="file" name="gambar" >
    </div>
    <div class="actions ">
      <button class="ui primary button" type="submit" name="simpanBaru">Simpan</button>
    </div>
  </form>
</div>

<script>
$('#modal_tambah').modal('attach events', '#plusBuku');
$('#plusBuku').on('click', function(){
	modal = $(this).attr('data-modal');
	$('#'+modal+'.modal').modal(
		'show'
	);
});
</script>
