<?php

$con = mysql_connect("127.0.0.1","root","");
if (!$con){
die('banco não encontrado:'.mysql_error());
}
mysql_select_db("farmacia",$con);
?>