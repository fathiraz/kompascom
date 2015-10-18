<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "kompas.com";

$konek = mysql_connect($db_host, $db_user, $db_pass, $db_name);
if ($konek) {
    mysql_select_db($db_name);
}
?>
