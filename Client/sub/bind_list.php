	<?php
	 include("../dbConnect/dbConnect.php");
date_default_timezone_set('Asia/Kolkata');	 
	$cid=$_GET['cid'];
	$tbl=$_GET['tbl'];
 $startPr=" 00:00:00";
//$timePr=" ".date("h:i:s");
$timePr=" 24:00:00";
	  $data=array();
	  $clientId=strval($_GET['clientId']);
 if($tbl=="Client")
 {

$qry="SELECT *,(select DeductorType.Description from DeductorType where DeductorType.Id=Client.DeductorType )as dedtype FROM Client ";
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
	
	$qry.=" where Client.Id='$cid'";
	
}

 }
 else if($tbl=="Employee")
 {

$qry="SELECT * FROM Employee where Active=1 and ClientId='$clientId'";
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
 else if($tbl=="Deductee")
 {

$qry="SELECT * FROM Deductee where Active=1 and ClientId='$clientId'";
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
	
	$qry.=" and Deductee.Id='$cid'";
	
}
}
 else if($tbl=="Challan")
 {

$qry="SELECT * FROM Challan where Active=1 and ClientId='$clientId'";
if( $cid== "0")
{
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' "; 
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
//echo $qry;
//exit;
}

else if($tbl=="DeducteeChallan")
 {

$qry="SELECT * FROM DeducteeChallan where Active=1 and  ClientId='$clientId'";
if( $cid== "0")
{
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' "; 
	$showno=$_GET['show'];
$qry.="  ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and DeducteeChallan.Id='$cid'";
	
}
//echo $qry;
//exit;
}

 else if($tbl=="SalaryInformation")
 {
	
$qry="SELECT *,(SELECT Employee.Name FROM Employee WHERE Employee.Id=SalaryInformation.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan WHERE Challan.Id=SalaryInformation.ChallanId)AS challanname FROM SalaryInformation where ClientId='$clientId'";
if( $cid== "0")
{
	$showno=$_GET['show'];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' "; 
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
//echo $qry;
//exit;
}

 else if($tbl=="SalaryInformation26")
 {
	
$qry="SELECT *,(SELECT Deductee.Name FROM Deductee WHERE Deductee.Id=SalaryInformation26.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM DeducteeChallan WHERE DeducteeChallan.Id=SalaryInformation26.ChallanId)AS challanname FROM SalaryInformation26 where ClientId='$clientId'";
if( $cid== "0")
{
	$showno=$_GET['show'];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' "; 
$qry.="  ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and SalaryInformation26.Id='$cid'";
	
}
//echo $qry;
//exit;
}
 else if($tbl=="SalaryInformation27e")
 {
	
$qry="SELECT *,(SELECT Deductee.Name FROM Deductee WHERE Deductee.Id=SalaryInformation27e.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM DeducteeChallan WHERE DeducteeChallan.Id=SalaryInformation27e.ChallanId)AS challanname FROM SalaryInformation27e where ClientId='$clientId'";
if( $cid== "0")
{
	$showno=$_GET['show'];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' "; 
$qry.="  ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and SalaryInformation27e.Id='$cid'";
	
}
//echo $qry;
//exit;
}
 else if($tbl=="SalaryInformation27")
 {
	
$qry="SELECT *,(SELECT Deductee.Name FROM Deductee WHERE Deductee.Id=SalaryInformation27.EmployeeId)AS empname FROM SalaryInformation27 where ClientId='$clientId'";
if( $cid== "0")
{
	$showno=$_GET['show'];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' "; 
$qry.="  ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and SalaryInformation27.Id='$cid'";
	
}
//echo $qry;
//exit;
}
 else if($tbl=="UploadScannedCopies")
 {
	
$qry="SELECT * FROM UploadScannedCopies where Active=1 and ClientId='$clientId'";
//echo $qry;
if( $cid== "0")
{
	
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' "; 
$qry.="  ORDER BY Id DESC "; 

}
else
{
	
	$qry.=" and UploadScannedCopies.Id='$cid'";
	//echo $qry;
}
//echo $qry;
//exit;
}
//task
 else if($tbl=="Task")
 {
	 
$qry="SELECT * FROM Task where ClientId='$clientId'";
 
if( $cid== "0")
{

	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	$showno=$_GET['show'];
$qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and Task.Id='$cid' ";
	
}

}
//echo $qry;
//exit;
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
	 ?> 