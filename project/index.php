<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BAZAR BUKU HMJTI</title>
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
            <input name="search_text" id="search_text" placeholder="cari berdasarkan judul" class="form-control" />
          </div>
        </div>
      </div>
      <div class="ui grid segment" id="result">
        <!--  menampilkan data  -->
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
      </div>
    </div>
  </body>
</html>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
