	<?php
	 include("../dbConnect/dbConnect.php"); 

	$tbl=$_GET['tbl'];
 
 if($tbl=="Challan")
 {
	 $data=array();
$qry="SELECT * FROM Challan where Active=1 and Challan.Id='$cid'";

 }
  else if($tbl=="Client")
 {
	 $data=array();
	 $stype=$_GET["Stype"];
$qry="SELECT 0  AS Id,'--select--' AS Description UNION ALL SELECT Id,Description FROM DeductorType where Stype='$stype'";

 }
 $q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
	 ?> 