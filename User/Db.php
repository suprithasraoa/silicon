<?php
 header("Access-Control-Allow-Origin: *");
 $db_name="HemsFood";
$mysql_user="HemsAdmin";
$mysql_pass="msol@123";
$server_name="148.72.232.182";
$con=mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name) or die ("could not connect database");

?>