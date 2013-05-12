  <h2 class="index_related-title"><span><a href="http://www.zhuangxiufeng.com/search.php?score=A" target="_blank">A类装修公司 / 上海十大家装品牌</a></span></h2>
  <?php
    $class = "A";
    $limit = 4;
    $query = sprintf("select * from shop where score_all='%s' order by image <> '' DESC, length(abstract) DESC  limit %s", $class, $limit);
    $result = mysql_query($query, $DBlink) or die("Query failed:".mysql_error());
    for ($i = 0; $i < $limit; ++$i) {
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
  ?>
  <?php include 'index/shop_item.php' ?>
  <?php } ?>
