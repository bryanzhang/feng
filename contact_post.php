<?php
  require 'functions.php';
  header('Content-type:application/json');

  $DBlink = openMysql();

  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  if ($email == "" || $message == "") {
    echo '{\"result\" : \"false\", \"desc\" : \"信息不完整!\"}';
  } else {
    $cmd = sprintf("insert into contact(time, name, email, message) values(now(), \"%s\", \"%s\", \"%s\");", $name, $email, $message);
    $result = mysql_query($cmd, $DBlink) or die("{\"result\" : \"false\", \"reason\" : \"Query failed:".mysql_error()."\"}");
    echo '{"result" : "true"}';
  }

  mysql_close($DBlink);
?>
