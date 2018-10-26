	<?php
	 include("../dbConnect/dbConnect.php"); 
	$cid=$_GET['cid'];
	$tbl=$_GET['tbl'];
 
 if($tbl=="Challan")
 {
	 $data=array();
$qry="SELECT * FROM Challan where Active=1 and Challan.Id='$cid'";

 }
 $q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
	 ?> 