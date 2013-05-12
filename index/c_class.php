  <h2 class="index_related-title"><span><a href="http://www.zhuangxiufeng.com/search.php?score=C" target="_blank">C类装修公司 / 尚未申请到装修资质的公司</a></span></h2>
  <?php
    $class = "C";
    $limit = 4;
    $query = sprintf("select * from shop where score_all='%s' order by has_picture DESC, length(abstract) DESC  limit %s", $class, $limit);
    $result = mysql_query($query, $DBlink) or die("Query failed:".mysql_error());
    for ($i = 0; $i < $limit; ++$i) {
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
  ?>
  <?php include 'index/shop_item.php' ?>
  <?php } ?>
