<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "UnicornglLen3550";
$db['db_name'] = "cms";

foreach ($db as $key => $val) {
  define(strtoupper($key), $val);
}

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die(mysqli_connect_error());
$result = mysqli_query($link, "set character set utf8");

?>