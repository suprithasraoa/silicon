	<?php
	 include("../dbConnect/dbConnect.php"); 
	$cid=$_GET['cid'];
	$tbl=$_GET['tbl'];
 
 if($tbl=="Client")
 {
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

 }
 else if($tbl=="Employee")
 {
	 $data=array();
$qry="SELECT * FROM Employee where Active=1 ";
if( $cid== "0")
{
	$showno=$_GET['show'];
$qry.="  ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and Employee.Id='$cid'";
	
}
}
 else if($tbl=="Challan")
 {
	 $data=array();
$qry="SELECT * FROM Challan where Active=1 ";
if( $cid== "0")
{
	$showno=$_GET['show'];
$qry.="  ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and Challan.Id='$cid'";
	
}
}
 else if($tbl=="SalaryInformation")
 {
	 $data=array();
$qry="SELECT *,(SELECT Employee.Name FROM Employee WHERE Employee.Id=SalaryInformation.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan WHERE Challan.Id=SalaryInformation.ChallanId)AS challanname FROM SalaryInformation ";
if( $cid== "0")
{
	$showno=$_GET['show'];
$qry.="  ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and SalaryInformation.Id='$cid'";
	
}
}
 else if($tbl=="UploadScannedCopies")
 {
	 $data=array();
$qry="SELECT * FROM UploadScannedCopies where Active=1";
//echo $qry;
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
	
	$qry.=" and UploadScannedCopies.Id='$cid'";
	//echo $qry;
}
}
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
	 ?> 