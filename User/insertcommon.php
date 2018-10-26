<?php
 
 include("../dbConnect/dbConnect.php"); 
 date_default_timezone_set('Asia/Kolkata');
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
	`FahersName`,`ResidentialStatus`,`Address1`,`Address2`,`Address3`,`City`,`State`,`Pincode`,`DOB`,
	`EmployeeStatus`,`DesignationId`,`Gender`,`SeniorCitizen`,`FromDate`,`ToDate`,`Phone`,
  	`Mobile`,`Email`,
	`Pan`, 
	`PanNo`,
	`CreatedOn`
	)
	values
	(
	'".$_GET["txtClientId"]."', 
	'".$_GET["txtSerial"]."', '".$_GET["txtinital"]."', 
	'".$_GET["txtname"]."', '".$_GET["txtFatherName"]."', '".$_GET["txtresidential"]."', '".$_GET["txtAddress1"]."', '".$_GET["txtAddress2"]."', '".$_GET["txtAddress3"]."',
	'".$_GET["txtCity"]."','".$_GET["txtState"]."','".$_GET["txtPincode"]."','".$_GET["txtdob"]."','".$_GET["txtesc"]."','".$_GET["txtDesig"]."',
	'".$_GET["txtgender"]."','".$_GET["txtsc"]."','".$_GET["txtFrmdate"]."','".$_GET["txtTodate"]."','".$_GET["txtPhone"]."','".$_GET["txtmobile"]."',
	'".$_GET["txtemail"]."','".$_GET["txtPan"]."', 
	'".$_GET["txtPanRef"]."', 
	'$dte')"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set EmployeeCtr= EmployeeCtr+1 where Id=1");
	
             echo "success";  
    }
}

	}
	//Deductee
	else if($tblnme == "Deductee")
	{
		
	$login = mysqli_query($dbcon,"select * from `Deductee` where `Name`='".$_GET["txtname"]."' and `Mobile`='".$_GET["txtmobile"]."'");

if(mysqli_num_rows($login)>0)
{
echo "exist";
}
else
{
	$qry="insert into `dbsilicon`.`Deductee` 
	(
	`ClientId`, 
	`SerialNo`,
      `Code`,	
	`Name`, 
	`DesignationId`, 
 	`Mobile`, 
	`Pan`, 
	`PanNo`,
	`CreatedOn`
	)
	values
	(
	'1', 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtCode"]."', 
	'".$_GET["txtname"]."', 
	'".$_GET["txtDesig"]."',
	'".$_GET["txtmobile"]."',
	'".$_GET["txtPan"]."', 
	'".$_GET["txtPanRef"]."', 
	'$dte')";
	//echo $qry;
	//exit;
	if(mysqli_query($dbcon,$qry))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set DeducteeCtr= DeducteeCtr+1 where Id=1");
	
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
	`CreatedOn`
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
	'".$_GET["txtIncomeTax"]."' ,'$dte'
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
	`QuarterId`,`CreatedOn`)
	values
	( 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtChallanNo"]."', 
	'".$_GET["txtIncomeTax"]."', 
	'".$_GET["txtBankdate"]."', 
	'".$_GET["txtBSRCode"]."', 
	'".$_GET["txtRemarks"]."' ,'".$_GET["QuarterId"]."','$dte'
	)"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set ChallanCtr= ChallanCtr+1 where Id=1");
	
             echo "success";  
    }


	}
		
		//DeducteeChallan
	else if($tblnme == "DeducteeChallan")
	{
		

	if(mysqli_query($dbcon,"insert into `dbsilicon`.`DeducteeChallan` 
	(
	`SerialNo`, 
	`ChallanNo`, 
	`IncomeTax`, 
	`ChallanDate`, 
	`BSRCode`,
	`Remarks`,
	`QuarterId`,`CreatedOn`)
	values
	( 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtChallanNo"]."', 
	'".$_GET["txtIncomeTax"]."', 
	'".$_GET["txtBankdate"]."', 
	'".$_GET["txtBSRCode"]."', 
	'".$_GET["txtRemarks"]."' ,'".$_GET["QuarterId"]."','$dte'
	)"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set DeducteeChallanCtr= DeducteeChallanCtr+1 where Id=1");
	
             echo "success";  
    }


	}
		//Task
	
	else if($tblnme == "Task")
	{
		
$Tstatus = $_GET["txtStatus"];
if($Tstatus == "2"){
	$qry="insert into `dbsilicon`.`Task` 
	(
	`ClientId`,`DateGiven`, `Task`,`DateComplete`,`CompletedByUserId`,`Status`,`CreatedOn`)
	values
	(
	'".$_GET["txtClientId"]."',  '".$_GET["txtTaskdate"]."', '".$_GET["txtTask"]."','$dte', '".$_GET["userid"]."','".$_GET["txtStatus"]."','$dte')";
}else{
	$qry="insert into `dbsilicon`.`Task` 
	(
	`ClientId`,`DateGiven`, `Task`,`CompletedByUserId`,`Status`,`CreatedOn`)
	values
	(
	'".$_GET["txtClientId"]."',  '".$_GET["txtTaskdate"]."', '".$_GET["txtTask"]."', '".$_GET["userid"]."','".$_GET["txtStatus"]."','$dte')";
}
	//echo $qry;
	//exit;
	if(mysqli_query($dbcon,$qry))
	
	{
		
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
