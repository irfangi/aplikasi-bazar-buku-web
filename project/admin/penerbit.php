<button data-modal="modalPenerbit" id="plusPenerbit" class="ui icon green small button">
  <i class="plus icon"></i>
</button>
<table class="ui small celled table">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama penerbit</th>
      <th>Diskon Penerbit</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
				$no = 0;
				$sql = mysqli_query($koneksi, "select * from penerbit order by nama_penerbit asc");
				while($r = mysqli_fetch_array($sql)){
					$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $r[1]; ?></td>
				<td><?php echo $r[2]; ?></td>
        <td>
            <a href="proses.php?delPenId=<?php echo $r[0];?>" onclick="return confirm('Apakah anda yakin inngin menghapus data?')">
              <i class="large red remove icon"></i>
            </a>
          <a href="index.php?editPenId=<?php echo $r[0];?>">
            <i class="large yellow edit icon"></i>
          </a>
        </td>
      <?php } ?>
      </tr>
  </tbody>
</table>
