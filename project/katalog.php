<div class="ui grid segment">
    <?php
    $qTampil=mysqli_query($koneksi,"SELECT * FROM buku");
    if (!$qTampil){
      echo "gagal tampil buku";
    }else {
      ?>
      <div class="ui grid">
        <div class="doubling two column row">
          <?php
          while ($dBuku=mysqli_fetch_array($qTampil)) {
            ?>
            <div class ="column medium">
              <div class="ui items segment">
                <div class="item">
                  <div class="ui medium image">
                    <img src="css/pict/bg1.jpg" >
                  </div>
                  <div class="content">
                    <div class="header"><?php echo $dBuku['judul_buku']; ?></div>
                    <div class="meta">
                      <span class="price">$000</span>
                      <span class="stay">dskfksj dfdf dfdf dfdf dfdf erer erere erere </span>
                    </div>
                  </div>
                </div>
                <!-- <div class="item">
                </div> -->
              </div>
            </div>
            <?php
            }
           ?>
         </div>
        </div>
        <?php
    }
   ?>
</div>
<div class="ui right aligned grid ">
  <div class="right floated left aligned four wide column">
    <div class="ui pagination menu">
      <a class="icon item" href="#"><i class="left chevron icon"></i></a>
      <a class="item " href="#">1</a>
      <a class="item " href="#">2</a>
      <a class="item " href="#">3</a>
      <a class="icon item" href="#"><i class="right chevron icon"></i></a>
    </div>
  </div>
</div>
