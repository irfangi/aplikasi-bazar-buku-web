<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ADMIN STAND BUKU HMJTI </title>
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="../css/semantic.min.js"></script>

    <style>
      body {
        background-image: url("../css/pict/bg1.jpg");
        background-size: cover;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body class="ui container " >
    <?php include '../conf/koneksi.php'; ?>
    <div class="ui segment">
      <div class="ui inverted borderless content menu ">
        <a class="header item">Admin Stand Buku</a>
        <div class="item">
          <div class="ui small input">
            <input placeholder="Search..." />
          </div>
        </div>
      </div>
      <div class="ui grid ">
        <div class="four wide column">
          <div class="ui vertical fluid tabular menu segment">
            <a class="item " href="index.php">
              Buku
            </a>
            <a class="item" href="index.php?page=keranjang">
              Keranjang
            </a>
            <a class="item" href="index.php?page=penerbit">
              Penetbit
            </a>
            <a class="item" href="index.php?page=laporan">
              Laporan Penjualan
            </a>
          </div>
        </div>
        <div class="twelve wide stretched column">
          <div class="ui container">
            <?php
            if ($_GET['page']==keranjang) {
              include 'keranjang.php';
            }else if($_GET['page']==laporan){
              include 'laporan.php';
            }else if($_GET['page']==penerbit){
              include 'penerbit.php';
              include 'input_penerbit.php';
            }else if($_GET['editPenId']){
              include 'editPenerbit.php';
            }else if($_GET['editBukId']){
              include 'editBuku.php';
            }else if($_GET['inKerId']){
              include 'input_keranjang.php';
            }else
            {
              include 'tampil.php';
              include 'input_buku.php';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
