	<?php
	 include("../dbConnect/dbConnect.php"); 

	$tbl=$_GET['tbl'];
 $clientId=strval($_GET['clientId']);
 if($tbl=="Challan")
 {
	 	$cid=$_GET['cid'];
	 $data=array();
$qry="SELECT * FROM Challan where Active=1 and Challan.Id='$cid' and ClientId='$clientId'";

 }
  
else if($tbl=="DeducteeChallan")
 {
	 	$cid=$_GET['cid'];
	 $data=array();
$qry="SELECT * FROM DeducteeChallan where Active=1 and DeducteeChallan.Id='$cid' and ClientId='$clientId'";

 }
 else if($tbl=="Client")
 {
	 $data=array();
$qry="SELECT * FROM Client where Active=1 and Id='$clientId'";

 }
 //echo $qry;
 //exit;
 $q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
	 ?> 