<?php
 include("../dbConnect/dbConnect.php"); 
$qry="";
$tblnme=strval($_GET['tbl']);

$data=array();
if($tblnme=="Challan")
{
	
$qry="SELECT ''  AS Id,'--select--' AS ChallanNo UNION ALL SELECT Id,CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan  where ClientId='".$_GET['clientId']."'";
}

//echo $qry;
//exit;
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
?>