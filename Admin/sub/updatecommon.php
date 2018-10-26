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
	//echo $qry;
	//exit;
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
	
	`TAN`='".$_GET["cmbTan"]."', 
	
	`RespPersonName`='".$_GET["txtRName"]."', 
	
	`RespPersonPhNo`='".$_GET["txtRMobile"]."', 
	`RespPersonPassword`='".$_GET["txtPassword"]."', 

	
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
