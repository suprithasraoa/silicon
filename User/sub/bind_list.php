	<?php
	 include("../dbConnect/dbConnect.php");
date_default_timezone_set('Asia/Kolkata');	 
	$cid=$_GET['cid'];
	$tbl=$_GET['tbl'];
 $startPr=" 00:00:00";
$timePr=date("h:i:s");

	  $data=array();
 if($tbl=="Client")
 {
$userid =$_GET["userid"];
$qry="SELECT * FROM Client where Active=1 and  UserId='$userid' ";
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
	
	$qry.=" and Client.Id='$cid'";
	
}

 }
 else if($tbl=="Employee")
 {
$userid =$_GET["userid"];
$qry="SELECT *,(SELECT Client.Name FROM dbsilicon.Client WHERE Client.Id = Employee.ClientId)AS CName FROM Employee WHERE Active=1  AND (SELECT UserId FROM dbsilicon.Client WHERE Employee.ClientId = Client.Id)='$userid'";
if( $cid== "0")
{
	 $txtclientid=$_GET["CltId"];
	 if($txtclientid!="0")
	 {
	 $qry.=" and Employee.ClientId='$txtclientid'";
	 }
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

$qry="SELECT *,(SELECT Client.Name FROM dbsilicon.Client WHERE Client.Id = Challan.ClientId)AS CName FROM Challan where Active=1 ";
if( $cid== "0")
{
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].' '.$timePr;
	  $qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' "; 
	$showno=$_GET['show'];
	 $txtclientid=$_GET["clientId"];
	 if($txtclientid!="0")
	 {
	 $qry.=" and ClientId='$txtclientid'";
	 }
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
	
$qry="SELECT *,(SELECT Client.Name FROM dbsilicon.Client WHERE Client.Id = SalaryInformation.ClientId)AS CName,(SELECT Employee.Name FROM Employee WHERE Employee.Id=SalaryInformation.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan WHERE Challan.Id=SalaryInformation.ChallanId)AS challanname FROM SalaryInformation ";
if( $cid== "0")
{
	 $txtclientid=$_GET["clientId"];
	$showno=$_GET['show'];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].' '.$timePr;
	  $qry.=" where CreatedOn>='$txtdate' and CreatedOn<='$txtenddate' "; 
	  
	 if($txtclientid!="0")
	 {
	 $qry.=" and ClientId='$txtclientid'";
	 }
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
 else if($tbl=="UploadScannedCopies")
 {
$data=array();	
$userid =$_GET["userid"];		
$qry="SELECT UploadScannedCopies.Id,UploadScannedCopies.FilePath,UploadScannedCopies.ClientId,UploadScannedCopies.Quarter,
UploadScannedCopies.Year,UploadScannedCopies.Date,UploadScannedCopies.Description,UploadScannedCopies.DocType,
UploadScannedCopies.Active,UploadScannedCopies.CreatedOn,User.Id AS UId,User.Name AS UName,Client.Name AS CName FROM UploadScannedCopies INNER JOIN dbsilicon.Client ON Client.Id=UploadScannedCopies.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId WHERE User.Active = 1 AND  Client.Active = 1 AND UploadScannedCopies.Active=1 and User.Id='$userid'";
//echo $qry;
if( $cid== "0")
{
	$txtclientid=$_GET["CltId"];
	$showno=$_GET['show'];
$txtdate=$_GET["txtdate"].$startPr;
 $txtenddate=$_GET["txtenddate"].' '.$timePr;

 $qry.=" and UploadScannedCopies.CreatedOn>='$txtdate' and UploadScannedCopies.CreatedOn<='$txtenddate' "; 

 if($txtclientid!="0")
	 {
	 $qry.=" and UploadScannedCopies.ClientId='$txtclientid'";
	 }

}
else
{
	
	$qry.=" and UploadScannedCopies.Id='$cid'";

}

$qry.="  ORDER BY id DESC "; 

 }
//task
 else if($tbl=="Task")
 {
$userid =$_GET["userid"];	 
$qry="SELECT *,(SELECT Client.Name FROM dbsilicon.Client WHERE Client.Id = Task.ClientId)AS CName FROM Task Where (SELECT UserId FROM dbsilicon.Client WHERE Task.ClientId = Client.Id)='$userid'";
 
if( $cid== "0")
{
 $txtclientid=$_GET["CltId"];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].' '.$timePr;
	$showno=$_GET['show'];
$qry.=" and CreatedOn>='$txtdate' and CreatedOn<='$txtenddate'"; 
   
	 if($txtclientid!="0")
	 {
	 $qry.=" and Task.ClientId='$txtclientid'";
	 }

}

else
{
	
	$qry.=" and Task.Id='$cid' ";
	
}
$qry.="  ORDER BY Id DESC "; 
}

$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
	 ?> 