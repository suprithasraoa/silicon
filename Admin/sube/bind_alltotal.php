<?php
 include("../dbConnect/dbConnect.php"); 
$qry="";
$tblnme=strval($_GET['Tname']);

$data=array();
if($tblnme == "User")
	{
$qry="SELECT count(*)as cnt from dbsilicon.User where Active=1"; 

	}
else if($tblnme == "Employee")
	{
$qry="SELECT count(*)as cnt from Employee where Active=1"; 

	}
else if($tblnme == "Deductee")
	{
$qry="SELECT count(*)as cnt from Deductee where Active=1"; 

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
		else if($tblnme == "Client")
	{
$qry="SELECT count(*)as cnt from Client"; 

	}
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
?>