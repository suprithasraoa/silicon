<?php
 
 include("../dbConnect/dbConnect.php"); 
$dte = date('Y/m/d H:i:s');
$tblnme=strval($_GET['Tname']);

//Employee
	if($tblnme == "Employee")
	{
		
	$login = mysqli_query($dbcon,"select * from `Employee` where `Name`='".$_GET["txtname"]."' and `Mobile`='".$_GET["txtmobile"]."'");

if(mysqli_num_rows($login)>0)
{
echo "exist";
}
else
{
	if(mysqli_query($dbcon,"insert into `dbsilicon`.`Employee` 
	(
	`ClientId`, 
	`SerialNo`, 
	`NameInitial`, 
	`Name`, 
	`FahersName`, 
	`ResidentialStatus`, 
	`Address1`, 
	`Address2`, 
	`Address3`, 
	`City`, 
	`State`, 
	`Pincode`, 
	`DOB`, 
	`EmployeeStatus`, 
	`Gender`, 
	`SeniorCitizen`, 
	`DesignationId`, 
	`FromDate`, 
	`ToDate`, 
	`Phone`, 
	`Mobile`, 
	`Email`, 
	`Pan`, 
	`PanNo`,
	`CreatedOn`
	)
	values
	(
	'1', 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtinital"]."', 
	'".$_GET["txtname"]."', 
	'".$_GET["txtFatherName"]."', 
	'".$_GET["txtresidential"]."', 
	'".$_GET["txtAddress1"]."', 
	'".$_GET["txtAddress2"]."', 
	'".$_GET["txtAddress3"]."', 
	'".$_GET["txtCity"]."', 
	'".$_GET["txtState"]."', 
	'".$_GET["txtPincode"]."', 
	'".$_GET["txtdob"]."', 
	'".$_GET["txtesc"]."', 
	'".$_GET["txtgender"]."', 
	'".$_GET["txtsc"]."', 
	'".$_GET["txtDesig"]."', 
	'".$_GET["txtFrmdate"]."', 
	'".$_GET["txtTodate"]."', 
	'".$_GET["txtPhone"]."', 
	'".$_GET["txtmobile"]."', 
	'".$_GET["txtemail"]."', 
	'".$_GET["txtPan"]."', 
	'".$_GET["txtPanRef"]."', 
	'$dte')"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set EmployeeCtr= EmployeeCtr+1 where Id=1");
	
             echo "success";  
    }
}

	}
	
	else
 {
  echo "error";
 }
 
 ?>
