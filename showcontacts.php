<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>反馈记录</title>
<table border="1">
  <tr>
    <td>id</td>
    <td>time</td>
    <td>name</td>
    <td>email</td>
    <td>message</td>
  </tr>
  <?php
    require 'functions.php';
    $DBlink = openMysql();

    $query = "select id,time,name,email,message from contact;";
    $result = mysql_query($query, $DBlink) or die("query failed!");
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  ?>
  <tr>
    <td><?=$row["id"];?></td>
    <td><?=$row["time"];?></td>
    <td><?=$row["name"];?></td>
    <td><?=$row["email"];?></td>
    <td><?=$row["message"];?></td>
  </tr>
  <?php
    }
    mysql_close();
  ?>
</table>
