	<?php
	 include("../dbConnect/dbConnect.php"); 
	$cid=$_GET['cid'];
 
 
$data=array();
$qry="SELECT * FROM Client ";
if( $cid== "0")
{
	$showno=$_GET['show'];
$qry.="  ORDER BY id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" where Client.id='$cid'";
	
}
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
	 ?> 