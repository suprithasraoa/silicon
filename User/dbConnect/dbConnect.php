
<?php

$dbhost="148.72.232.182";
$dbuser="siliconadmin";
$dbpass="msol@123";
$dbname="dbsilicon";

$dbcon=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$dbcon){
echo "Not connected to Database";
}
?>