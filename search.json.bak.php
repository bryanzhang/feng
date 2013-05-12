<?php
  require 'functions.php';
  header('Content-type:application/json');
  $jsonData = file_get_contents("php://input");
  $obj = json_decode($jsonData);

  $DBlink = openMysql();

  // query shops
  $query = "";

  // keyword
  if ($obj->{'keyword'} != "") {
    if ($query == "") {
      $query = $query . " where";
    } else {
      $query = $query . " and";
    }
    $query = $query . sprintf(" ((shopname like binary '%%%s%%') or (score_all like binary '%%%s%%') or (abstract like binary '%%%s%%') or (qualification like binary '%%%s%%'))", $obj->{'keyword'}, $obj->{'keyword'}, $obj->{'keyword'}, $obj->{'keyword'});
  }

  // district
  if ($obj->{'distinct'} != "") {
    if ($query == "") {
      $query = $query . " where";
    } else {
      $query = $query . " and";
    }
    $query = $query . sprintf(" district=\"%s\"", $obj->{'distinct'});
  }

  // score
  if ($obj->{'score'} != "") {
    if ($query == "") {
      $query = $query . " where";
    } else {
      $query = $query . " and";
    }
    $query = $query . sprintf(" score_all=\"%s\"", $obj->{'score'});
  }

  // qualification
  if ($obj->{'qualify'} != "") {
    if ($query == "") {
      $query = $query . " where";
    } else {
      $query = $query . " and";
    }
    if ($obj->{'qualify'} == "none") {
      $query = $query . " qualification is null";
    } else {
      switch ($obj->{'qualify'}) {
        case "sjsg1":
          $qualify = "设计施工一级";
          break;
        case "sjsg2":
          $qualify = "设计施工二级";
          break;

        case "sjsg3":
          $qualify = "设计施工三级";
          break;

        case "sj1":
          $qualify = "设计一级";
          break;

        case "pro":
          $qualify = "专业级";
          break;

        case "pro_intern":
          $qualify = "专业级(暂定)";
          break;
 
        default:
          $qualify = $obj->{'qualify'};
      }
      $query = $query . sprintf(" qualification like binary '%%%s%%'", $qualify);
    }
  }

  // average
  if ($obj->{'average'} != "") {
    if ($query == "") {
      $query = $query . " where";
    } else {
      $query = $query . " and";
    }
    switch ($obj->{'average'}) {
      case '3to5':
        $cond = ' dp_price >= 30000 and dp_price <= 50000';
        break;

      case '5to7':
        $cond = ' dp_price >= 50000 and dp_price <= 70000';
        break;

      case '7to10':
        $cond = ' dp_price >= 70000 and dp_price <= 100000';
        break;

      case '10to15':
        $cond = ' dp_price >= 100000 and dp_price <= 150000';
        break;

      case '15up':
        $cond = ' dp_price >= 150000';
        break;
      default:
        $cond = $obj->{'average'};
    }
    $query = $query . $cond;
  }

  // count
  $countQuery = "select COUNT(*) from shop" . $query .";";
  $result = mysql_query($countQuery, $DBlink) or die("Query failed:".mysql_error());
  list($count) = mysql_fetch_row($result);
  $count = intval($count, 10);
  $limitStart = $obj->{'page'} * $obj->{'limit'};
  if ($limitStart > $count) {
    $page = (int)($count / $obj->{'limit'});
    $limitStart = $page * $obj->{'limit'};
  } else {
    $page = $obj->{'page'};
  }

  // order by
  $orderClause = sprintf(" order by image<>\"\" DESC, %s DESC", $obj->{'sortType'});

  // limit clause
  $limitClause = sprintf(" limit %d, %d", $limitStart, $obj->{'limit'});

  // shops
  $query = "select * from shop" . $query . $orderClause . $limitClause;
  $result = mysql_query($query, $DBlink) or die("Query failed:".mysql_error());
  $arr = Array();
  $num = 0;
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $arr[$num] = $row;
    $num++; 
  }

  // close connection
  mysql_close($DBlink);

  $retObj->count = $count;
  $retObj->arr = $arr;
  $retObj->page = $page;
  echo json_encode($retObj);
?>
