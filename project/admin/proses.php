<?php
  include '../conf/koneksi.php';
  if(isset($_POST['simpanBaru'])){
		$judul = $_POST['judulBuku'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$harga = $_POST['harga'];
		$jumlah = $_POST['qty'];

		$nama_file=$_FILES['gambar']['name'];
		$alamat_file=$_FILES['gambar']['tmp_name'];
		move_uploaded_file($alamat_file,"buku/images/$nama_file");

		$simpan = mysqli_query($koneksi, "insert into buku (judul_buku, pengarang, penerbit, harga, jumlah, foto)
					values ('$judul', '$pengarang', '$penerbit', '$harga', '$jumlah', '$nama_file')");
		if($simpan){
      ?>
      <script type="text/javascript">
        window.location.href = "index.php";
      </script>
      <?php
		}else {
		  ?>
      <script type="text/javascript">
        alert("GAGAL INPUT BUKU");
        window.location.href = "index.php";
      </script>
      <?php
		}
	}
  if(isset($_POST['simpanPenerbit'])){
		$napen = $_POST['namaPenerbit'];
		$diskon = $_POST['diskon'];
		$simpan = mysqli_query($koneksi, "INSERT INTO penerbit(nama_penerbit, diskon_penerbit) VALUES ('$napen','$diskon')");
		if($simpan){
      ?>
      <script type="text/javascript">
        alert("BERHASIL INPUT PENERBIT");
        window.location.href = "index.php?page=penerbit";
      </script>
      <?php
		}else {
		  ?>
      <script type="text/javascript">
        alert("GAGAL INPUT PENERBIT");
        window.location.href = "index.php?page=penerbit";
      </script>
      <?php
		}
	}
  if ($_GET['delPenId']) {
    $id=$_GET['delPenId'];
    $del=mysqli_query($koneksi,"DELETE FROM penerbit WHERE id_penerbit='$id'");
    if ($del) {
      echo '<script language="javascript">
    	alert ("Data Berhasil Di Hapus"); document.location="index.php?page=penerbit";
    	</script>';
    }else {
      echo '<script language="javascript">
    	alert ("Data Gagal Di Hapus"); document.location="index.php?page=penerbit";
    	</script>';
    }
  }
  if ($_GET['delBukId']) {
    $id=$_GET['delBukId'];
    $del=mysqli_query($koneksi,"DELETE FROM buku WHERE id_buku='$id'");
    if ($del) {
      echo '<script language="javascript">
    	alert ("Data Berhasil Di Hapus"); document.location="index.php";
    	</script>';
    }else {
      echo '<script language="javascript">
    	alert ("Data Gagal Di Hapus"); document.location="index.php";
    	</script>';
    }
  }
  if (isset($_POST['updatePenerbit'])) {
    $id=$_POST['id'];
    $naPen=$_POST['namaPenerbit'];
    $dis=$_POST['diskon'];
    $update=mysqli_query($koneksi,"UPDATE penerbit SET nama_penerbit='$naPen',diskon_penerbit='$dis' WHERE `id_penerbit`='$id';");
    if (!$update) {
      echo "string";
    }else {
      echo '<script language="javascript">
    	alert ("Data Berhasil di Edit"); document.location="index.php?page=penerbit";
    	</script>';
    }
  }
  if (isset($_POST['updateBuku'])) {
    $id = $_POST['id'];
    $judul = $_POST['judulBuku'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$harga = $_POST['harga'];
		$jumlah = $_POST['qty'];

		$nama_file=$_FILES['gambar']['name'];
		$alamat_file=$_FILES['gambar']['tmp_name'];
		move_uploaded_file($alamat_file,"buku/images/$nama_file");

		$simpan = mysqli_query($koneksi, "UPDATE buku SET judul_buku='$judul',pengarang='$pengarang',penerbit='$penerbit',harga='$harga',jumlah='$jumlah',foto='$nama_file' WHERE id_buku='$id'");
		if($simpan){
      ?>
      <script type="text/javascript">
        window.location.href = "index.php";
      </script>
      <?php
		}
  }
  if (isset($_POST['isiKeranjang'])) {
    $id=$_POST['id'];
    $qty=$_POST['qty'];
    //untuk menambah ke keranjang
    $sql=mysqli_query($koneksi,"INSERT INTO kerajang(id_buku, qty) VALUES ('$id','$qty')");
    //untuk mengupdate di data buku
    $sqlisi=mysqli_query($koneksi,"SELECT * FROM buku where id_buku='$id'");
    $datisi=mysqli_fetch_array($sqlisi);
    $jum=$datisi[5]-$qty;
    $sqlUpBuku=mysqli_query($koneksi,"UPDATE buku SET jumlah='$jum' WHERE  id_buku='$id'");

    if (!$sql) {
      echo "string";
    }else {
      echo '<script language="javascript">
    	alert ("Berhasil Menambah Ke Keranjang Cek Page Keranjang"); document.location="index.php";
    	</script>';
    }
  }
  if ($_GET['delKerId']) {
    $id=$_GET['delKerId'];
    $idBuk=$_GET['idBuk'];
    $qty=$_GET['qty'];
    //update buku
    $sql=mysqli_query($koneksi,"DELETE FROM kerajang WHERE id_keranjang='$id'");
    $sqlisi=mysqli_query($koneksi,"SELECT * FROM buku where id_buku='$idBuk'");
    $datisi=mysqli_fetch_array($sqlisi);
    $jum=$datisi[5]+$qty;
    $sqlUpBuku=mysqli_query($koneksi,"UPDATE buku SET jumlah='$jum' WHERE  id_buku='$idBuk'");
    if (!$sql) {
      echo "string";
    }else {
      echo '<script language="javascript">
    	alert ("Berhasil menghapus Buku dari Keranjang"); document.location="index.php?page=keranjang";
    	</script>';
    }
  }
  if ($_GET['page']==bayar) {
    $cek=$_GET['totHarga'];
    if ($totHarga!=0) {
      echo '<script language="javascript">
    	alert ("Keranjang kosong silahkan masuk ke menu buku untuk mengisi keranjang"); document.location="index.php";
    	</script>';
    }else {
      $sql=mysqli_query($koneksi,"SELECT * FROM kerajang");
      $sqlInKer=mysqli_query($koneksi,"INSERT INTO keranjang(id_tgl, total_harga) VALUES (CURRENT_TIMESTAMP,'$_GET[totHarga]')");
      while ($datKer=mysqli_fetch_array($sql)) {
        $sqlBayar=mysqli_query($koneksi,"INSERT INTO bayar(id_buku, qty, tanggal) VALUES ('$datKer[1]','$datKer[2]',CURRENT_TIMESTAMP)");
        if ($sqlBayar) {
          $sqlDelKer=mysqli_query($koneksi,"DELETE FROM kerajang where id_keranjang='$datKer[0]'");
        }
      }
      echo '<script language="javascript">
    	alert ("Berhasil Membayar"); document.location="index.php?page=keranjang";
    	</script>';
    }
  }
 ?>
