<?php
  require 'functions.php';
  $Id = $_GET["id"];
  if ($Id == "") {
    header('HTTP/1.1 404 Not Found');
    header("location: /404.html");
    $Id = 6;
  }
  require 'doctype.php';
?>
<html>
  <head>
    <?php include 'head.php'; ?>
    <?php
      $DBlink = openMysql();
      getShopInfo(queryShopById($DBlink, $Id));
      $cmd = sprintf("update shop set visits = visits+1 where Id=%s", $Id);
      mysql_query($cmd, $DBlink) or die("Inc failed:".mysql_error());
      mysql_close($DBlink);
    ?>
    <title><?=$shopname;?> - 装修风，免费送50元话费</title>
  </head>
  <body>
    <?php include 'layout/header.php' ?>
    <script type='text/javascript'>
      var jsonData = {
        'name' : "<?=$shopname;?>",
        'id' : <?=$Id;?>
      };
    </script>
    <script type='text/javascript' src="js/reservebox.js"></script>
    <script type='text/javascript' src="js/company.js"></script>
    <div id="subtitle">
      <div class="container">
        <div class="sixteen columns">
          <h3><?=$shopname;?></h3>
        </div>
      </div>
    </div>
    <br />
    <div class="container">
      <?php include 'company/right.php' ?>
      <?php include 'company/left.php' ?>
    </div>
    <?php include 'layout/footer.php' ?>
    <div id="popup-reserve-mask" class="popup-reserve-mask"></div>
    <?php include 'company/reserve.php' ?>
  </body>
</html>
