<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "root", "hmjti_standBuku");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM buku
  WHERE judul_buku LIKE '%".$search."%'
  OR pengarang LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM buku ORDER BY judul_buku
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  ?>
  <div class="ui grid">
    <div class="doubling two column row"><?php
     while($row = mysqli_fetch_array($result))
     {
      // $output .= '
      //  <tr>
      //   <td>'.$row["judul_buku"].'</td>
      //   <td>'.$row["pengarang"].'</td>
      //   <td>'.$row["harga"].'</td>
      //  </tr>
      // ';
      ?>
      <div class ="column medium">
        <div class="ui items segment">
          <div class="item">
            <div class="ui medium image">
              <img src="css/pict/bg1.jpg" >
            </div>
            <div class="content">
              <div class="header"><?php echo $row['judul_buku']; ?></div>
              <div class="meta">
                <span class="price">$<?php echo $row['harga'];?></span><br>
                <span class="stay">Pengarang : <?php echo $row['pengarang']."<br>"; ?> Stok : <?php echo $row['jumlah']; ?></span>
              </div>
            </div>
          </div>
          <!-- <div class="item">
          </div> -->
        </div>
      </div><?php
    }?>
  </div>
 </div>
<?php
 // echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
