<?php
 
 include("../dbConnect/dbConnect.php"); 
$dte = date('Y/m/d H:i:s');
$tblnme=strval($_GET['Tname']);
//User
	if($tblnme == "User")
	{
		
	$qry="update dbsilicon.User set 
	`Name`='".$_GET["txtname"]."', 
	`Phone`='".$_GET["txtmobile"]."', `EmailId`='".$_GET["txtEmailId"]."', 
	`Password`='".$_GET["txtPassword"]."' where dbsilicon.User.Id='".$_GET["pkvId"]."'";
	echo $qry;
	exit;
	if(mysqli_query($dbcon,$qry))
	{
             echo "success";  
    }


	}
//Employee
	else if($tblnme == "Employee")
	{
		
	
	if(mysqli_query($dbcon,"update Employee set 
	`Name`='".$_GET["txtname"]."', 

	`DesignationId`='".$_GET["txtDesig"]."', 
	
	`Mobile`='".$_GET["txtmobile"]."', 

	`Pan`='".$_GET["txtPan"]."', 
	`PanNo`='".$_GET["txtPanRef"]."' where Employee.Id='".$_GET["pkvId"]."'"))
	{
             echo "success";  
    }


	}

	//Deductee
	else if($tblnme == "Deductee")
	{
		
	
	if(mysqli_query($dbcon,"update Deductee set 
	`Name`='".$_GET["txtname"]."', 
`Code`='".$_GET["txtCode"]."', 
	`DesignationId`='".$_GET["txtDesig"]."', 
	
	`Mobile`='".$_GET["txtmobile"]."', 

	`Pan`='".$_GET["txtPan"]."', 
	`PanNo`='".$_GET["txtPanRef"]."' where Deductee.Id='".$_GET["pkvId"]."'"))
	{
             echo "success";  
    }


	}
	//Challan
	else if($tblnme == "Challan")
	{

	if(mysqli_query($dbcon,"update Challan set 

	`ChallanNo`='".$_GET["txtChallanNo"]."', 
`IncomeTax`='".$_GET["txtIncomeTax"]."', 
	`ChallanDate`='".$_GET["txtBankdate"]."', 
	
	`BSRCode`='".$_GET["txtBSRCode"]."', 

	`Remarks`='".$_GET["txtRemarks"]."' where Challan.Id='".$_GET["pkvId"]."'"))
	{
             echo "success";  
    }


	}
		//DeducteeChallan
	else if($tblnme == "DeducteeChallan")
	{

	if(mysqli_query($dbcon,"update Challan set 

	`ChallanNo`='".$_GET["txtChallanNo"]."', 
`IncomeTax`='".$_GET["txtIncomeTax"]."', 
	`ChallanDate`='".$_GET["txtBankdate"]."', 
	
	`BSRCode`='".$_GET["txtBSRCode"]."', 

	`Remarks`='".$_GET["txtRemarks"]."' where DeducteeChallan.Id='".$_GET["pkvId"]."'"))
	{
             echo "success";  
    }


	}
			//UploadScannedCopies
else if($tblnme == "UploadScannedCopies")
	{
$qry="update UploadScannedCopies set `FilePath`='".$_GET["txtuploadfile"]."', 
	`ClientId`='".$_GET["txtClient"]."', 
	
	`Quarter`='".$_GET["txtquter"]."', 
	`Year`='".$_GET["txtyear"]."', 
	`Description`='".$_GET["txtDescription"]."', 
	`Date`='".$_GET["txtChequeDate"]."', 
	`DocType`='".$_GET["txtDocType"]."', 
	
	where UploadScannedCopies.Id='".$_GET["pkvId"]."'";
	echo $qry;
	exit;
	if(mysqli_query($dbcon,$qry));
	{
             echo "success";  
    }


	}
	//Client
else if($tblnme == "Client")
	{
$qry="update Client set `Name`='".$_GET["txtName"]."', 
	`Address1`='".$_GET["txtAddress1"]."', 
	
	`Address2`='".$_GET["txtAddress2"]."', 
	`Address3`='".$_GET["txtAddress3"]."', 
	`City`='".$_GET["txtCity"]."', 
	`State`='".$_GET["txtState"]."', 
	`Pincode`='".$_GET["txtPincode"]."', 
	`TAN`='".$_GET["cmbTan"]."', 
	`Tan_Number`='".$_GET["txtesc"]."', 
	`Fax`='".$_GET["txtFax"]."', 
	`PhoneNo`='".$_GET["txtPhoneNo"]."', 
	`EmailId`='".$_GET["txtEmail"]."', 
	`FinancialYearFrm`='".$_GET["txtfinancialYearfrm"]."', 
	`FinancialYearTo`='".$_GET["txtfinancialYearto"]."', 
	`AsstYearFrm`='".$_GET["txtasstYearfrm"]."', 
	`AsstYearTo`='".$_GET["txtasstYearto"]."', 
	`ExistingTDS`='".$_GET["cmbTDSassesse"]."', 
	`DeductorStatus`='".$_GET["cmbStatus"]."', 
	`DeductorType`='".$_GET["cmbDeductorType"]."',
	`ReturnType`='".$_GET["cmbReturntype"]."', 
	`DeductorPAN`='".$_GET["txtDeductorPAN"]."', 
	`DeductorGSTIN`='".$_GET["txtGSTIN"]."', 
	`Branch`='".$_GET["txtbranch"]."', 
	`GovtAIN`='".$_GET["txtGAIN"]."',
`GovtState`='".$_GET["txtGState"]."', 
	`GovtPAOCode`='".$_GET["txtGPAOCode"]."', 
	`GovtPAORegNo`='".$_GET["txtGPRegnNo"]."',

`GovtDDOCode`='".$_GET["txtGDDOCode"]."', 
	`GovtDDORegNo`='".$_GET["txtDPRegnNo"]."', 
	`GovtMinistry`='".$_GET["txtMinistry"]."', 
	`GovtOtherName`='".$_GET["txtOtherName"]."', 
	`RespPersonPAN`='".$_GET["txtRPAN"]."', 
	`RespPersonName`='".$_GET["txtRName"]."', 
	`RespPersonGender`='".$_GET["RespPersonGender"]."',
	`RespPersonDesig`='".$_GET["txtRDesignation"]."', 
	`RespPersonPhNo`='".$_GET["txtRMobile"]."', 
	`RespPersonPassword`='".$_GET["txtEmail"]."', 
	`RespPersonAddress1`='".$_GET["txtRAddress1"]."',
`RespPersonAddress2`='".$_GET["txtRAddress2"]."', 
	`RespPersonAddress3`='".$_GET["txtRAddress3"]."', 
	`RespPersonCity`='".$_GET["txtRCity"]."',

	
`RespPersonState`='".$_GET["txtRState"]."', 
	`RespPersonPincode`='".$_GET["txtRPincode"]."', 
	`RespPersonEmailId`='".$_GET["txtREmail"]."' 
	
	where Client.Id='".$_GET["pkvId"]."'";
	//echo $qry;
	//exit;
	if(mysqli_query($dbcon,$qry));
	{
             echo "success";  
    }


	}
	//task
	else if($tblnme == "Task")
	{
	
	
$qryres="update Task set `DateGiven`='".$_GET["DateGiven"]."', 
	`Task`='".$_GET["Task"]."' where Task.Id='".$_GET["pkvId"]."'";
//echo $qryres;
//exit;
	if(mysqli_query($dbcon,$qryres));
	{
             echo "success";  
    }



	}	
	else
 {
  echo "error";
 }
 
 ?>
