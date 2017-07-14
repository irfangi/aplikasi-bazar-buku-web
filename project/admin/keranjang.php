<table class="ui small celled table">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul Buku</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Diskon</th>
      <th>Harga Diskon</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 0;
      $totHarga=0;
      $disHarga=0;
      $sql = mysqli_query($koneksi, "select * from kerajang");
      while ($datKer=mysqli_fetch_array($sql)) {
        $no++;
        ?>
        <tr>
          <?php
            $sqlbuk=mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$datKer[1]'");
            $datBuk=mysqli_fetch_array($sqlbuk);
            $sqlPen=mysqli_query($koneksi,"SELECT * FROM penerbit WHERE id_penerbit='$datBuk[3]'");
            $datPen=mysqli_fetch_array($sqlPen);
            $di= $datPen[2]-5;
            $disHarga=($datKer[2]*$datBuk[4])-($datKer[2]*$datBuk[4]*($di/100));
            $totHarga+=$disHarga;
           ?>
            <td><?php echo $no; ?></td>
            <td><?php echo $datBuk[1]; ?></td>
            <td><?php echo $datKer[2]; ?></td>
            <td><?php echo $datBuk[4]; ?></td>
            <td><?php
            echo $di."%";
            ?></td>
            <td><?php echo $disHarga; ?></td>
            <td>
              <a href="proses.php?delKerId=<?php echo $datKer[0];?>&idBuk=<?php echo $datBuk[0]; ?>&qty=<?php echo $datKer[2];?>" onclick="return confirm('Apakah anda yakin inngin menghapus data?')">
                <button class="ui icon red  button">
                  <i class="remove icon"></i>
                </button>
              </a>
              <button class="ui icon yellow  button">
                <i class="edit icon"></i>
              </button>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="2">
        <label>Total :</label>
        <div class="ui input small">
          <input type="text" name="" value="<?php echo $totHarga;?>" disabled>
        </div>
      </th>
      <th colspan="2">
        <label>bayar :</label>
        <div class="ui input small">
          <input type="text" name="bayar">
        </div>
      </th>
      <th colspan="2">
        <label>kembali :</label>
        <div class="ui input small">
          <input type="text" name="bayar" disabled>
        </div>
      </th>
      <th >
        <div class="ui right floated menu">
          <a class="icon item" href="proses.php?page=bayar&totHarga=<?php echo $totHarga;?>"><i class="shopping bag icon"></i></a>
          <a class="icon item" href="#"><i class="remove circle icon"></i></a>
        </div>
      </th>
    </tr>
  </tfoot>
</table>
