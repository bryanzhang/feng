<?php
  require 'functions.php';
  require 'doctype.php';
?>
<html>
  <head>
    <meta name="keywords" content="上海装修,上海建材,上海家具,上海装修网,上海装修公司大全" />
    <meta name="description" content="装修风上海装修建材家具体验馆为你提供上海装修市场上各种装修设计方案，各种物美价廉装修解决方案尽在装修风。" />
    <meta name="baidu-site-verification" content="rrOoagSKIdbRqyzl" />
    <title>装修风 - 上海装修公司、装修风格、装修设计网</title>
    <?php include 'layout/head.php'; ?>
  </head>
  <body id="top">
    <?php include 'layout/header.php' ?>
    <?php include 'index/logo_slide.php' ?>
    <?php include 'index/search_category.php' ?>
    <div class="container">
      <div id="portfolio-wrapper"  style="height:630px; padding-top:20px;">
        <?php $DBlink = openMysql(); ?>
        <?php include 'index/a_class.php' ?>
        <?php include 'index/b_class.php' ?>
        <?php include 'index/c_class.php' ?>
        <?php mysql_close($DBlink); ?>
      </div>
    </div>
    <?php include 'layout/footer.php' ?>
  </body>
  <?php include 'layout/scripts.php' ?>
  <script type="text/javascript" src="/js/index.js"></script>
</html>
