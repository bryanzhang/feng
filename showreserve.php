<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>预约记录</title>
<table border="1">
<tr>
  <td>id</td>
  <td>time</td>
  <td>shop</td>
  <td>name</td>
  <td>phone</td>
  <td>info</td>
</tr>
<?php
  // connect to mysql server
  $DBlink = mysql_connect("0.0.0.0","root","19861022",1) or die("Could not connect: ".mysql_error());
  mysql_select_db(/*"zsp201_db"*/"zxfdb",$DBlink) or die("Could not select database");
  mysql_query("SET   NAMES   UTF8");

  $query="select id,time,shop,name,phone,info from reserve;";
  $result=mysql_query($query, $DBlink);
  while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $id=$row["id"];
    $time=$row["time"];
    $shop=$row["shop"];
    $name=$row["name"];
    $phone=$row["phone"];
    $info=$row["info"];
    print("<tr><td>$id</td><td>$time</td><td>$shop</td><td>$name</td><td>$phone</td><td>$info</td></tr>");
  }
  mysql_close();
?>
</table>
