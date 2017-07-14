<table class="ui celled table">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul Buku</th>
      <th>Penerbit</th>
      <th>QTY</th>
      <th>Harga Asli</th>
      <th>Harga Jual</th>
      <th>Keuntungan</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $penerbit=$_POST['namLap'];
    $no=0;
    $sqlPen=mysqli_query($koneksi,"SELECT * FROM penerbit WHERE id_penerbit='$penerbit'");
    $datPen=mysqli_fetch_array($sqlPen);
    $sqlBuk=mysqli_query($koneksi,"SELECT * FROM buku WHERE penerbit='$penerbit'");
    if ($sqlBuk) {
      while ($datBuk=mysqli_fetch_array($sqlBuk)) {
        $sqlBay=mysqli_query($koneksi,"SELECT * FROM bayar WHERE id_buku='$datBuk[0]'");
        if ($sqlBay) {
          while ($datBay=mysqli_fetch_array($sqlBay)) {
            $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $datBuk[1]; ?></td>
              <td><?php echo $datPen[1]; ?></td>
              <td><?php
                $totQty+=$datBay[2];
                echo $datBay[2];?>
              </td>
              <td><?php
                $asli=($datBay[2]*$datBuk[4])-($datBay[2]*$datBuk[4]*($datPen[2]/100));
                $totAsli+=$asli;
                echo $asli; ?>
              </td>
              <td><?php
                $jual=($datBay[2]*$datBuk[4])-($datBay[2]*$datBuk[4]*(($datPen[2]-5)/100));
                $totJual+=$jual;
                echo $jual; ?>
              </td>
              <td><?php
                $untung=$jual-$asli;
                $totUntung+=$untung;
                echo $untung; ?>
              </td>
            </tr>
            <?php
          }
        }
      }
    }
   ?>
  </tbody>
  <tfoot>

  </tfoot>
</table>
<div class="ui segment">
  <?php
    echo "total omset : ".$totJual;
    echo " total buku terjual : ".$totQty;
    echo " total keuntungan : ".$totUntung;
   ?>
</div>
