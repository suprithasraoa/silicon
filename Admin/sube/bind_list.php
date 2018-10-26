	<?php
	 include("../dbConnect/dbConnect.php"); 
	$cid=$_GET['cid'];
	$tbl=$_GET['tbl'];
 $startPr=" 00:00:00";
$timePr=date("h:i:sa");
	  $data=array();
	  if($tbl=="User")
 {

$qry="SELECT * FROM dbsilicon.User where Active=1";
if( $cid== "0")
{
	
$qry.="  ORDER BY Id DESC "; 

}
else
{
	
	$qry.=" and dbsilicon.User.Id='$cid'";
	
}

 }
else if($tbl=="Client")
 {

$qry="SELECT *,(select User.Name from User where User.Id=Client.UserId)as uname FROM Client where Active=1 ";
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
	
	$qry.=" and Client.id='$cid'";
	
}

 }
 else if($tbl=="Employee")
 {

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
 else if($tbl=="Deductee")
 {

$qry="SELECT * FROM Deductee where Active=1 ";
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

$qry="SELECT * FROM Challan where Active=1 ";
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

$qry="SELECT * FROM DeducteeChallan where Active=1 ";
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
	
$qry="SELECT *,(SELECT Employee.Name FROM Employee WHERE Employee.Id=SalaryInformation.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan WHERE Challan.Id=SalaryInformation.ChallanId)AS challanname FROM SalaryInformation ";
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
echo $qry;
exit;
}

 else if($tbl=="UploadScannedCopies")
 {
	
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
//task
 else if($tbl=="Task")
 {
	 
$qry="SELECT * FROM Task ";
 
if( $cid== "0")
{

	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	$showno=$_GET['show'];
$qry.=" where CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" where Task.Id='$cid' ";
	
}

}

$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
	 ?> 