<?php
 include("../dbConnect/dbConnect.php"); 
$qry="";
$tblnme=strval($_GET['Tname']);

$data=array();
if($tblnme == "Employee")
	{
$qry="SELECT count(*)as cnt from Employee where Active=1"; 

	}
else if($tblnme == "Deductee")
	{
$qry="SELECT count(*)as cnt from Deductee where Active=1"; 

	}
	else if($tblnme == "Client")
	{
		$userid =$_GET["userid"];
$qry="SELECT count(*)as cnt from Client where Active=1 and UserId='$userid'"; 

	}
else if($tblnme == "Challan")
	{
$qry="SELECT count(*)as cnt from Challan where Active=1"; 

	}
	else if($tblnme == "DeducteeChallan")
	{
$qry="SELECT count(*)as cnt from DeducteeChallan where Active=1"; 

	}
	else if($tblnme == "Task")
	{
$qry="SELECT count(*)as cnt from Task"; 

	}
	else if($tblnme == "SalaryInformation")
	{
$qry="SELECT count(*)as cnt from SalaryInformation"; 

	}
	else if($tblnme == "UploadScannedCopies")
{
$qry="SELECT count(*)as cnt from UploadScannedCopies where Active=1"; 

}
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
?>