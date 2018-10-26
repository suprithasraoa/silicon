<?php
 
 include("../dbConnect/dbConnect.php"); 
$dte = date('Y/m/d H:i:s');
$tblnme=strval($_GET['Tname']);
//Employee
	if($tblnme == "User")
	{
		
	$login = mysqli_query($dbcon,"select * from `User` where `Phone`='".$_GET["txtmobile"]."'");

if(mysqli_num_rows($login)>0)
{
echo "exist";
}
else
{
	$qry="insert into `User` 
	(
	`Name`, 
	`Phone`, 
	`EmailId`, 
	`Password` 
  	
	)
	values
	(
	
	'".$_GET["txtname"]."', 
	'".$_GET["txtmobile"]."', 
	'".$_GET["txtEmailId"]."',
	'".$_GET["txtPassword"]."'
	)";
	//echo $qry;
	//exit;
	if(mysqli_query($dbcon,$qry))
	{
	
             echo "success";  
    }
}

	}
//Employee
	else if($tblnme == "Employee")
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
  	`Mobile`, 
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
		

	$qry="insert into `dbsilicon`.`Task` 
	(
	`ClientId`, 
	`DateGiven`, 
	`Task`,
	`CreatedOn`
	)
	values
	(
	'1', 
	'".$_GET["txtTaskdate"]."', 
	'".$_GET["txtTask"]."','$dte')";
	
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

		//Client
	else if($tblnme == "Client")
	{
		//echo("shivatest"); exit;
		 $insert_user="insert into `dbsilicon`.`Client` 
	(
	Name,
Address1,
Address2,
Address3,
City,
State,
Pincode,
TAN,

Fax,
PhoneNo,
EmailId,
FinancialYearFrm,
FinancialYearTo,
AsstYearFrm,
AsstYearTo,
ExistingTDS,
DeductorStatus,
DeductorType,
ReturnType,
DeductorPAN,
DeductorGSTIN,
Branch,
GovtAIN,
GovtState,
GovtPAOCode,
GovtPAORegNo,
GovtDDOCode,
GovtDDORegNo,
GovtMinistry,
GovtOtherName,
RespPersonPAN,
RespPersonName,
RespPersonGender,
RespPersonDesig,
RespPersonPhNo,

RespPersonPassword,
RespPersonAddress1,
RespPersonAddress2,
RespPersonAddress3,
RespPersonCity,
RespPersonState,
RespPersonPincode,
UserId,
RespPersonEmailId)
	values
	( 
	'".$_GET["txtName"]."', 
	'".$_GET["txtAddress1"]."', 
	'".$_GET["txtAddress2"]."', 
	'".$_GET["txtAddress3"]."', 
	'".$_GET["txtCity"]."', 
	'".$_GET["txtState"]."' ,
	'".$_GET["txtPincode"]."',
	'".$_GET["cmbTan"]."', 
	
	'".$_GET["txtFax"]."', 
	'".$_GET["txtPhoneNo"]."', 
	'".$_GET["txtEmail"]."', 
	'".$_GET["txtfinancialYearfrm"]."' ,
	'".$_GET["txtfinancialYearto"]."',
	'".$_GET["txtasstYearfrm"]."', 
	'".$_GET["txtasstYearto"]."', 
	'".$_GET["cmbTDSassesse"]."', 
	'".$_GET["cmbStatus"]."', 
	'".$_GET["cmbDeductorType"]."', 
	'".$_GET["cmbReturntype"]."' ,
	'".$_GET["txtDeductorPAN"]."',
	'".$_GET["txtGSTIN"]."', 
	'".$_GET["txtbranch"]."', 
	'".$_GET["txtGAIN"]."', 
	'".$_GET["txtGState"]."', 
	'".$_GET["txtGPAOCode"]."', 
	'".$_GET["txtGPRegnNo"]."' ,
	'".$_GET["txtGDDOCode"]."',
	'".$_GET["txtDPRegnNo"]."', 
	'".$_GET["txtMinistry"]."', 
	'".$_GET["txtOtherName"]."', 
	'".$_GET["txtRPAN"]."', 
	'".$_GET["txtRName"]."', 
	'".$_GET["RespPersonGender"]."' ,
	'".$_GET["txtRDesignation"]."',
	'".$_GET["txtRMobile"]."',
	
	'".$_GET["txtPassword"]."', 
	
	'".$_GET["txtRAddress1"]."', 
	'".$_GET["txtRAddress2"]."', 
	'".$_GET["txtRAddress3"]."', 
	'".$_GET["txtRCity"]."' ,
	'".$_GET["txtRState"]."',
	'".$_GET["txtRPincode"]."' ,
	
	'".$_GET["userid"]."' ,
	'".$_GET["txtREmail"]."'
	)";
//echo $insert_user; exit;
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
