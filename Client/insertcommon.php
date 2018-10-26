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
	`Name`, 
	`DesignationId`, 
 
	`Pan`, 
	`PanNo`,
	`CreatedOn`
	)
	values
	(
	'1', 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtname"]."', 
	'".$_GET["txtDesig"]."',
	'".$_GET["txtmobile"]."',
	'".$_GET["txtPan"]."', 
	'".$_GET["txtPanRef"]."', 
	'$dte')"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set EmployeeCtr= EmployeeCtr+1 where Id=1");
	
             echo "success";  
    }
}

	}
	
	
	//SalaryInformation
	else if($tblnme == "SalaryInformation")
	{
		

	if(mysqli_query($dbcon,"insert into `dbsilicon`.`SalaryInformation` 
	(
	`Serial`, 
	`EmployeeId`, 
	`Amount`, 
	`PaidDate`, 
	`TaxDeductedDate`,
	`TaxDeducted`,
	`IncTax`,
	`SurchargeAmt`, 
	`EduCessAmt`,
	`ChallanId`,
	`IncomeTax`, 
	
	)
	values
	( 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtEmployeeId"]."', 
	'".$_GET["txtAmount"]."', 
	'".$_GET["txtPaidDate"]."', 
	'".$_GET["txtTaxDeductedDate"]."', 
	'".$_GET["txtTaxDeducted"]."', 
	'".$_GET["txtIncTax"]."', 
	'".$_GET["txtSurchargeAmt"]."', 
	'".$_GET["txtEduCessAmt"]."', 
	'".$_GET["txtChallanId"]."', 
	'".$_GET["txtIncomeTax"]."' 
	)"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set SalaryCtr= SalaryCtr+1 where Id=1");
	
             echo "success";  
    }


	}
	//Challan
	else if($tblnme == "Challan")
	{
		

	if(mysqli_query($dbcon,"insert into `dbsilicon`.`Challan` 
	(
	`SerialNo`, 
	`ChallanNo`, 
	`IncomeTax`, 
	`ChallanDate`, 
	`BSRCode`,
	`Remarks`,
	`QuarterId`)
	values
	( 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtChallanNo"]."', 
	'".$_GET["txtIncomeTax"]."', 
	'".$_GET["txtBankdate"]."', 
	'".$_GET["txtBSRCode"]."', 
	'".$_GET["txtRemarks"]."' ,'".$_GET["QuarterId"]."' 
	)"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set ChallanCtr= ChallanCtr+1 where Id=1");
	
             echo "success";  
    }


	}
	//UploadScannedCopies
	else if($tblnme == "UploadScannedCopies")
	{
	//echo("supritha"); exit;
$file_loc=$_FILES['Image']['tmp_name'];

$folder="upload/";

move_uploaded_file($file_loc,$folder.$_GET['txtuploadfile']);

//move_uploaded_file($_FILES[$tetupfile]["tmp_name"], $target_file);


	 $insert_user="insert into `UploadScannedCopies` (ClientId,FilePath,Quarter,Year,Date,Description,DocType) VALUE ( '".$_GET['txtClient']."','".$_GET['txtuploadfile']."','".$_GET['txtquter']."','".$_GET['txtyear']."','".$_GET['txtChequeDate']."','".$_GET['txtDescription']."','".$_GET['txtDocType']."')";
//echo ($insert_user); exit;

if(mysqli_query($dbcon,$insert_user))
   {
echo "success";
}


}
	
	else
 {
  echo "error";
 }
 
 ?>
