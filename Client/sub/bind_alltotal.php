<?php
 include("../dbConnect/dbConnect.php"); 
$qry="";
$tblnme=strval($_GET['Tname']);
	  $clientId=strval($_GET['clientId']);
$data=array();
if($tblnme == "Employee")
	{
$qry="SELECT count(*)as cnt from Employee where Active=1 and ClientId='$clientId'";

	}
else if($tblnme == "Deductee")
	{
$qry="SELECT count(*)as cnt from Deductee where Active=1  and ClientId='$clientId'";

	}
else if($tblnme == "Challan")
	{
$qry="SELECT count(*)as cnt from Challan where Active=1 and ClientId='$clientId'";

	}
	else if($tblnme == "DeducteeChallan")
	{
$qry="SELECT count(*)as cnt from DeducteeChallan where Active=1  and ClientId='$clientId'";

	}
	else if($tblnme == "Task")
	{
$qry="SELECT count(*)as cnt from Task where ClientId='$clientId'";

	}
	else if($tblnme == "SalaryInformation")
	{
$qry="SELECT count(*)as cnt from SalaryInformation where ClientId='$clientId'";

	}
	else if($tblnme == "SalaryInformation26")
	{
$qry="SELECT count(*)as cnt from SalaryInformation26 where ClientId='$clientId'";

	}
	else if($tblnme == "SalaryInformation27")
	{
$qry="SELECT count(*)as cnt from SalaryInformation27 where ClientId='$clientId'";

	}
		else if($tblnme == "SalaryInformation27e")
	{
$qry="SELECT count(*)as cnt from SalaryInformation27e where ClientId='$clientId'";

	}
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
?>