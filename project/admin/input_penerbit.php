<div class="ui small tiny modal " id="modalPenerbit" >
  <div class="header">Tamabh Penerbit</div>
  <form class="ui form segment " action="proses.php" method="post">
    <div class="field">
      <label>Nama Penerbit</label>
      <input type="text" name="namaPenerbit" placeholder="Nama Penerbit">
    </div>
    <div class="field">
      <label>Diskon</label>
      <input type="text" name="diskon" placeholder="Diskon">
    </div>
    <div class="actions ">
      <button class="ui primary button" type="submit" name="simpanPenerbit">Simpan</button>
    </div>
  </form>
</div>

<script>
$('#modalPenerbit').modal('attach events', '#plusPenerbit');
$('#plusPenerbit').on('click', function(){
	modal = $(this).attr('data-modal');
	$('#'+modal+'.modal').modal(
		'show'
	);
});
</script>
