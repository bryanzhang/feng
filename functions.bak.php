<?php
  $host = "http://www.zhuangxiufeng.com/";
  $searchUrl = $host."search.php";

  function companyUrl($Id) {
    global $host;
    return $host."company.php?id=".$Id;
  }

  // open mysql connection
  function openMysql() {
    $DBlink = mysql_connect("0.0.0.0","root","19861022",1) or die("Could not connect: ".mysql_error());
    mysql_select_db("zxfdb",$DBlink) or die("Could not select database");
    mysql_query("SET   NAMES   UTF8");
    return $DBlink;
  }

  function queryShopById($DBlink, $id) {
    $query = "select * from shop where Id=".$id;
    $result = mysql_query($query, $DBlink) or die("Query failed:" .mysql_error());
    return mysql_fetch_array($result, MYSQL_ASSOC);
  }

  function queryShops($DBlink, $keyword, $distinct) {
    // TODO(junhaozhang): implement.
    $query = "select * from shop";
    $result = mysql_query($query, $DBlink) or die("Query failed:".mysql_error());
    return mysql_fetch_array($result, MYSQL_ASSOC);
  }

  function getShopInfo($row) {
    global $Id, $shopname, $district, $zone, $dp_star, $dp_price, $dp_reviewnum;
    global $headshopid, $shopsite, $abstract, $shoptype, $score_all, $foundtime, $score_service, $staffnum;
    global $price, $pomo, $score_worth, $score_design, $score_material, $score_construction, $review, $addr, $tel, $contactinfo, $tag, $addtime;
    global $updatetime, $opentime, $dp_url, $shopid_img, $shopImg;

    $Id = $row['Id'];
    $shopname = $row['shopname'];
    $district = $row['district'];
    $zone = $row['zone'];
    $dp_star = $row['dp_star'];
    $dp_price = $row['dp_price'];
    $dp_reviewnum = $row['dp_reviewnum'];
    $headshopid = $row['headshopid'];
    $shopsite = $row['shopsite'];
    $abstract = $row['abstract'];
    $shoptype = $row['shoptype'];
    $score_all = $row['score_all'];
    $foundtime = $row['foundtime'];
    $score_service = $row['score_service'];
    $staffnum = $row['staffnum'];
    $price = $row['price'];
    $promo = $row['promo'];
    $score_worth = $row['score_worth'];
    $score_design = $row['score_design'];
    $score_material = $row['score_material'];
    $score_construction = $row['score_construction'];
    $review = $row['review'];
    $addr = $row['addr'];
    $tel = $row['tel'];
    $contactinfo = $row['contactinfo'];
    $tag = $row['tag'];
    $addtime = $row['addtime'];
    $updatetime = $row['updatetime'];
    $opentime = $row['opentime'];
    $dp_url = $row['dp_url'];
    $shopImg = $row['image'];
    if ($shopImg != "") {
      $shopImg = "/images/shop/".$Id."/".$shopImg;
    } else {
      $shopImg = getRandomImage();
    }
    if ($headshopid!=0) {  // NOTE(junhaozhang): need evaluated.
      $shopid_img=$headshopid;
    } else {
      $shopid_img=$Id;
    }
  }

  function getRandomImage() {
    return "/images/rand_shop.jpg";
  }
?>
