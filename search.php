<?php
  require 'functions.php';
  require 'doctype.php';
  $keyword = $_GET["keyword"];
  $distinct = $_GET["distinct"];
  $pagenum = $_GET["page"];
  if ($pagenum == "") {
    $pagenum = 0;
  }
  $limit = 10;
  $score = $_GET["score"];
  $qualify = $_GET["qualify"];
  $average = $_GET["average"];
  $sortType = $_GET["sort"];
  if ($sortType == "") {
    $sortType = "score_all";
  }
?>
<html>
  <head>
    <?php include 'layout/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/search.css">
    <title>装修风 - 上海装修公司、装修风格、装修设计网</title>
  </head>
  <body id="top">
    <?php include 'layout/header.php' ?>
    <?php include 'search/input.php' ?>
    <div class="container">
      <?php include 'search/left.php' ?>
      <?php include 'search/right.php' ?>
    </div>
    <?php include 'layout/footer.php' ?>
    <div id="popup-reserve-mask" class="popup-reserve-mask"></div>
    <?php include 'company/reserve.php' ?>
  </body>
  <?php include 'layout/scripts.php'; ?>
  <script type='text/javascript'>
    var jsonData = {
      "keyword" : "<?= $keyword; ?>",
      "distinct" : "<?=$distinct; ?>",
      "page" : <?=$pagenum; ?>,
      "limit" : <?=$limit; ?>,
      "score" : "<?=$score; ?>",
      "qualify" : "<?=$qualify; ?>",
      "average" : "<?=$average; ?>",
      "sortType" : "<?=$sortType; ?>"
    };
  </script>
  <script type='text/javascript' src="/js/reservebox.js"></script>
  <script type='text/javascript' src="/js/search.js"></script>
</html>
