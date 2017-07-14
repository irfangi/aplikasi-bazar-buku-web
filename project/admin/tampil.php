<button data-modal="modaltmbh" id="plusBuku" class="ui icon green small button">
  <i class="plus icon"></i>
</button>
<table class="ui small celled table">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul Buku</th>
      <th>Pengarang</th>
      <th>Penerbit</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Diskon</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
				$no = 0;
				$sql = mysqli_query($koneksi, "select * from buku order by judul_buku asc");
				while($r = mysqli_fetch_array($sql)){
					$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $r[1]; ?></td>
				<td><?php echo $r[2]; ?></td>
        <td>
          <?php
          $penerbit=mysqli_query($koneksi,"SELECT * from penerbit where id_penerbit='$r[3]'");
          $e=mysqli_fetch_array($penerbit);
          $dis=$e[2]-5;
          echo $e[1];
          ?>
        </td>
				<td>Rp <?php echo number_format($r[4], 0, ',', '.'); ?></td>
				<td><?php echo $r[5]; ?></td>
        <td><?php echo $dis."%"; ?></td>
        <td>
          <a href="proses.php?delBukId=<?php echo $r[0];?>" onclick="return confirm('Apakah anda yakin inngin menghapus data?')">
            <i class="remove icon red large"></i>
          </a>
          <a href="index.php?editBukId=<?php echo $r[0]?>">
            <i class="edit icon yellow large"></i>
          </a>
          <a href="index.php?inKerId=<?php echo $r[0]?>">
            <i class="large green shop icon"></i>
          </a>
        </td>
      <?php } ?>
      </tr>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="8">
        <div class="ui right floated pagination menu">
          <a class="icon item" href="#"><i class="left chevron icon"></i></a>
          <a class="item " href="#">1</a>
          <a class="item " href="#">2</a>
          <a class="item " href="#">3</a>
          <a class="icon item" href="#"><i class="right chevron icon"></i></a>
        </div>
      </th>
    </tr>
  </tfoot>
</table>
