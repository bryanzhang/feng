<?php
  require 'functions.php';

  $Id = $_GET['shop'];
  $name = $_GET['name'];
  $phone = $_GET['phone'];
  $info = $_GET['info'];

  $DBlink = openMysql();
  $now = date('Y-m-d H:i:s');
  $query = sprintf('insert into reserve (time,shop,name,phone,info) values("%s", %s, "%s", "%s", "%s")', $now, $Id, $name, $phone, $info);
  mysql_query($query, $DBlink) or die("Failed: ".mysql_error());
  mysql_close($DBlink); 
?>
