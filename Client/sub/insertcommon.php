<?php
 
 include("../dbConnect/dbConnect.php"); 
$dte = date('Y/m/d H:i:s');
$tblnme=strval($_GET['Tname']);
$clientId=strval($_GET['clientId']);
//Employee
	if($tblnme == "Employee")
	{
		
	$login = mysqli_query($dbcon,"select * from `Employee` where  `Mobile`='".$_GET["txtmobile"]."'");

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
	'$clientId', 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtname"]."', 
	'".$_GET["txtDesig"]."',
	'".$_GET["txtmobile"]."',
	'".$_GET["txtPan"]."', 
	'".$_GET["txtPanRef"]."', 
	'$dte')"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set EmployeeCtr= EmployeeCtr+1 where ClientId='$clientId'");
	
             echo "success";  
    }
}

	}
	//Deductee
	else if($tblnme == "Deductee")
	{
		
	$login = mysqli_query($dbcon,"select * from `Deductee` where `Mobile`='".$_GET["txtmobile"]."'");

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
	'$clientId', 
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
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set DeducteeCtr= DeducteeCtr+1   where ClientId='$clientId'");
	
             echo "success";  
    }
}

	}
	
	
	//SalaryInformation24Q
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
	`ClientId`,
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
	'".$_GET["txtIncomeTax"]."' ,
	'$clientId',
	'$dte'
	)"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set SalaryCtr= SalaryCtr+1  where ClientId='$clientId'");
	
             echo "success";  
    }


	}
	
		
	//SalaryInformation26Q
	else if($tblnme == "SalaryInformation26")
	{
	if(mysqli_query($dbcon,"insert into `dbsilicon`.`SalaryInformation26` 
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
	`ClientId`,
	`CreatedOn`,
	`Section`
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
	'".$_GET["txtIncomeTax"]."' ,
	'$clientId',
	'$dte',
	'".$_GET["txtSection"]."'
	)"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set Salary26Ctr= Salary26Ctr+1  where ClientId='$clientId'");
	
             echo "success";  
    }


	}
	
		//SalaryInformation27eQ
	else if($tblnme == "SalaryInformation27e")
	{
	if(mysqli_query($dbcon,"insert into `dbsilicon`.`SalaryInformation27e` 
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
	`ClientId`,
	`CreatedOn`,
	`Section`
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
	'".$_GET["txtIncomeTax"]."' ,
	'$clientId',
	'$dte',
	'".$_GET["txtSection"]."'
	)"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set Salary27eCtr= Salary27eCtr+1  where ClientId='$clientId'");
	
             echo "success";  
    }


	}
	//SalaryInformation27Q
	else if($tblnme == "SalaryInformation27")
	{
		

	if(mysqli_query($dbcon,"insert into `dbsilicon`.`SalaryInformation27` 
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

	
	`ClientId`,
	`CreatedOn`,
	`TDSasPer`,
	`AckNo`,
	`NatureOfRemit`,
	`CountryofRes`,
	`Section`
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

	'$clientId',
	'$dte',
	'".$_GET["txttdsrate"]."',
	'".$_GET["txtAckNo"]."',
	'".$_GET["txtnatureof"]."',
	'".$_GET["txtCountry"]."',
	'".$_GET["txtSection"]."'
	)"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set Salary27Ctr= Salary27Ctr+1  where ClientId='$clientId'");
	
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
	
	`ExcessCessPaid`,
	`InterestPaid`,
	`TotalAmtPaid`,
	`ChallanDate`, 
	`BSRCode`,
	`Remarks`,
	`NatureOfAmt`,
	`TypeofPayment`,
	`ModeofPayment`,
	`QuarterId`,`ClientId`,`CreatedOn`)
	values
	( 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtChallanNo"]."', 
	'".$_GET["txtIncomeTax"]."', 
	'".$_GET["txtEducationCess"]."', 
	'".$_GET["txtInterest"]."', 
	'".$_GET["txtTotalPaid"]."', 
	'".$_GET["txtBankdate"]."', 
	'".$_GET["txtBSRCode"]."', 
	'".$_GET["txtRemarks"]."' ,'".$_GET["txtnatureof"]."' ,'".$_GET["txttypeof"]."' ,'".$_GET["rdbmodeof"]."' ,'".$_GET["QuarterId"]."','$clientId','$dte'
	)"))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set ChallanCtr= ChallanCtr+1  where ClientId='$clientId'");
	
             echo "success";  
    }


	}
		
		//DeducteeChallan
	else if($tblnme == "DeducteeChallan")
	{
		$qry="insert into `dbsilicon`.`DeducteeChallan` 
	(
	`SerialNo`, 
	`ChallanNo`, 
	`IncomeTax`, 
	`ChallanDate`, 
	`BSRCode`,
	`Remarks`,
	`QuarterId`,`TypeId`,`NatureId`,`Section`,`CreatedOn`,`ClientId`)
	values
	( 
	'".$_GET["txtSerial"]."', 
	'".$_GET["txtChallanNo"]."', 
	'".$_GET["txtIncomeTax"]."', 
	'".$_GET["txtBankdate"]."', 
	'".$_GET["txtBSRCode"]."', 
	'".$_GET["txtRemarks"]."' ,'".$_GET["QuarterId"]."','".$_GET["txtType"]."','".$_GET["txtnature"]."','".$_GET["sect"]."','$dte','$clientId'
	)";
//echo $qry;
//exit;
	if(mysqli_query($dbcon,$qry))
	{
		
		mysqli_query($dbcon,"update dbsilicon.Parameter set DeducteeChallanCtr= DeducteeChallanCtr+1  where ClientId='$clientId'");
	
             echo "success";  
    }


	}
		//Task
	
	else if($tblnme == "Task")
	{
		

	$qry="insert into `dbsilicon`.`Task` 
	(
	`SerialNo`,
	`Remarks`,	
	`ClientId`, 
	`Quarter`, 
	`DataRcvDate`,
	`RecvStatus1`, 	
	`CreatedOn`
	)
	values
	(
	'".$_GET["txtSerialNo"]."',
	'".$_GET["txtRemarks"]."',
	'$clientId',
	'".$_GET["txtQuarter"]."', 
	'".$_GET["txtTaskdate1"]."','".$_GET["txtstatus1"]."','$dte')";
	
	//echo $qry;
	//exit;
	if(mysqli_query($dbcon,$qry))
	{
		mysqli_query($dbcon,"update dbsilicon.Parameter set TaskCtr= TaskCtr+1  where ClientId='$clientId'");
	
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
