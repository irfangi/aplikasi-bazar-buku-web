<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BAZAR BUKU HMJTI</title>
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <style >
      body{
        background-image: url("css/pict/bg1.jpg");
        background-size: cover;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <?php include 'conf/koneksi.php'; ?>
    <div class="ui container segment">
      <div class="ui inverted menu medium borderless">
        <div class="item medium">
          <div class="ui input icon medium">
            <i class="search icon"></i>
            <input placeholder="Cari Buku" name="">
          </div>
        </div>
      </div>
      <div class="ui">
        <?php include 'katalog.php';

        ?>
      </div>
    </div>
  </body>
</html>
