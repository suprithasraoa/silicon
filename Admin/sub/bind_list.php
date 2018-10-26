	<?php
	 include("../dbConnect/dbConnect.php"); 
	 date_default_timezone_set('Asia/Kolkata');	
	$cid=$_GET['cid'];
	$tbl=$_GET['tbl'];
 $startPr=" 00:00:00";
$timePr=' '.date("h:i:s");
	  $data=array();
	   if($tbl=="User")
 {

$qry="SELECT * FROM dbsilicon.User where Active=1";
if( $cid== "0")
{
	
$qry.="  ORDER BY Id DESC "; 

}
else
{
	
	$qry.=" and dbsilicon.User.Id='$cid'";
	
}

 }
 else if($tbl=="Client")
 {

$qry="SELECT *,(select User.Name from User where User.Id=Client.UserId)as uname FROM Client where Active=1 ";
if( $cid== "0")
{$userid =$_GET["userid"];
	 if($userid!="0")
	 {
	 $qry.=" and UserId='$userid'";
	 }
	$showno=$_GET['show'];
$qry.="  ORDER BY id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and Client.id='$cid'";
	
}
//echo $qry;
//exit;
 }
 else if($tbl=="Employee")
 {

$userid =$_GET["userid"];
$qry="SELECT Employee.Id,Employee.ClientId,Employee.SerialNo,Employee.NameInitial,Employee.Name AS EName,Employee.FathersName,Employee.ResidentialStatus,Employee.Address1,Employee.Address2,
Employee.Address3,Employee.City,Employee.State,Employee.Pincode,Employee.DOB,Employee.EmployeeStatus,
Employee.Gender,Employee.SeniorCitizen,Employee.DesignationId,Employee.FromDate,Employee.ToDate,Employee.Phone,
Employee.Mobile,Employee.Email,Employee.Pan,Employee.PanNo,Employee.Active,Employee.CreatedOn,User.Id AS UId,User.Name AS UName,Client.Name AS CName FROM Employee INNER JOIN dbsilicon.Client ON Client.Id=Employee.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId  where User.Active = 1 and  Client.Active = 1 and Employee.Active = 1";
if( $cid== "0")
{
	 $txtclientid=$_GET["CltId"];
 if($userid!="0")
	 {
	 $qry.=" and User.Id='$userid'";
	 }
	 if($txtclientid!="0")
	 {
	 $qry.=" and Employee.ClientId='$txtclientid'";
	 }
	$showno=$_GET['show'];
$qry.="  ORDER BY Employee.Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}

}

else
{
	
	$qry.=" and Employee.Id='$cid'";
	
}

}
 else if($tbl=="Deductee")
 {
$userid =$_GET["userid"];
$qry="SELECT Deductee.Id,Deductee.ClientId,Deductee.SerialNo,Deductee.Code,Deductee.NameInitial,Deductee.Name AS EName,User.Name AS UName,Client.Name AS CName,Deductee.FahersName,Deductee.ResidentialStatus,Deductee.Address1,Deductee.Address2,
Deductee.Address3,Deductee.City,Deductee.State,Deductee.Pincode,Deductee.DOB,Deductee.EmployeeStatus,
Deductee.Gender,Deductee.SeniorCitizen,Deductee.DesignationId,Deductee.FromDate,Deductee.ToDate,Deductee.Phone,
Deductee.Mobile,Deductee.Email,Deductee.Pan,Deductee.PanNo,Deductee.Active,Deductee.CreatedOn,User.Id AS UId,User.Name AS UName,
Client.Name AS CName FROM Deductee INNER JOIN dbsilicon.Client ON Client.Id=Deductee.ClientId 
INNER JOIN dbsilicon.User ON User.Id=Client.UserId  WHERE User.Active = 1 AND  Client.Active = 1 AND Deductee.Active = 1 ";
if( $cid== "0")
{
	
	 $txtclientid=$_GET["CltId"];
 if($userid!="0")
	 {
	 $qry.=" and User.Id='$userid'";
	 }
	 if($txtclientid!="0")
	 {
	 $qry.=" and Deductee.ClientId='$txtclientid'";
	 }
	$showno=$_GET['show'];
$qry.="  ORDER BY Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and Deductee.Id='$cid'";
	
}
}
 else if($tbl=="Challan")
 {
$userid =$_GET["userid"];
$qry="SELECT  User.Name AS UName,Client.Name AS CName,Challan.Id, Challan.SerialNo, Challan.ChallanNo, Challan.IncomeTax, Challan.FeesPaid, Challan.SurchargePaid, Challan.ExcessCessPaid,
 Challan.InterestPaid, Challan.PenaltyPaid, Challan.OtherAmtPaid, Challan.TotalAmtPaid, Challan.TDSInterestAmt, Challan.TDSOtherAmt, Challan.NatureOfAmt, 
 Challan.TypeofPayment, Challan.ModeofPayment, ChallanDate, Challan.NSDLorTraces, Challan.ChequeNo, Challan.BankDate, Challan.DrawnOn, Challan.BSRCode, 
 Challan.TaxDeductedFrom, Challan.Remarks, Challan.CreatedOn, Challan.QuarterId, Challan.Active, Challan.ClientId FROM Challan
INNER JOIN dbsilicon.Client ON Client.Id=Challan.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId WHERE User.Active = 1 AND  Client.Active = 1 AND Challan.Active = 1 ";
if( $cid== "0")
{
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and Challan.CreatedOn>='$txtdate' and Challan.CreatedOn<='$txtenddate' "; 
	  	 $txtclientid=$_GET["CltId"];
 if($userid!="0")
	 {
	 $qry.=" and User.Id='$userid'";
	 }
	 if($txtclientid!="0")
	 {
	 $qry.=" and Challan.ClientId='$txtclientid'";
	 }
	$showno=$_GET['show'];
$qry.="  ORDER BY Challan.Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and Challan.Id='$cid'";
	
}
echo $qry;
exit;
}

else if($tbl=="DeducteeChallan")
 {
$userid =$_GET["userid"];
$qry="SELECT  User.Name AS UName,Client.Name AS CName,DeducteeChallan.Id, DeducteeChallan.SerialNo, DeducteeChallan.ChallanNo, DeducteeChallan.IncomeTax, DeducteeChallan.FeesPaid, DeducteeChallan.SurchargePaid, DeducteeChallan.ExcessCessPaid,
 DeducteeChallan.InterestPaid, DeducteeChallan.PenaltyPaid, DeducteeChallan.OtherAmtPaid, DeducteeChallan.TotalAmtPaid, DeducteeChallan.TDSInterestAmt, DeducteeChallan.TDSOtherAmt, DeducteeChallan.NatureOfAmt, 
 DeducteeChallan.TypeofPayment, DeducteeChallan.ModeofPayment, DeducteeChallan.ChallanDate, DeducteeChallan.NSDLorTraces, DeducteeChallan.ChequeNo, DeducteeChallan.BankDate, DeducteeChallan.DrawnOn, DeducteeChallan.BSRCode, 
 DeducteeChallan.TaxDeductedFrom, DeducteeChallan.Remarks, DeducteeChallan.CreatedOn, DeducteeChallan.QuarterId, DeducteeChallan.Active, DeducteeChallan.ClientId FROM DeducteeChallan
INNER JOIN dbsilicon.Client ON Client.Id=DeducteeChallan.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId WHERE User.Active = 1 AND  Client.Active = 1 AND DeducteeChallan.Active = 1 ";
if( $cid== "0")
{
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and DeducteeChallan.CreatedOn>='$txtdate' and DeducteeChallan.CreatedOn<='$txtenddate' "; 
	   	 $txtclientid=$_GET["CltId"];
 if($userid!="0")
	 {
	 $qry.=" and User.Id='$userid'";
	 }
	 if($txtclientid!="0")
	 {
	 $qry.=" and DeducteeChallan.ClientId='$txtclientid'";
	 }
	$showno=$_GET['show'];
$qry.="  ORDER BY DeducteeChallan.Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and DeducteeChallan.Id='$cid'";
	
}
//echo $qry;
//exit;
}

 else if($tbl=="SalaryInformation")
 {
	$userid =$_GET["userid"];
$qry="SELECT SalaryInformation.Serial,SalaryInformation.EmployeeId,SalaryInformation.Amount,User.Name AS UName,Client.Name AS CName,SalaryInformation.PaidDate,SalaryInformation.TaxDeducted,SalaryInformation.TaxDeductedDate,SalaryInformation.IncTax,SalaryInformation.SurchargeAmt,SalaryInformation.EduCessAmt,SalaryInformation.ChallanId,SalaryInformation.IncomeTax,SalaryInformation.TotalAmt,SalaryInformation.CreatedOn,SalaryInformation.ClientId,(SELECT Employee.Name FROM Employee WHERE Employee.Id=SalaryInformation.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan WHERE Challan.Id=SalaryInformation.ChallanId)AS challanname FROM SalaryInformation INNER JOIN dbsilicon.Client ON
  Client.Id=SalaryInformation.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId WHERE User.Active = 1 AND Client.Active = 1  ";
if( $cid== "0")
{
	$showno=$_GET['show'];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and SalaryInformation.CreatedOn>='$txtdate' and SalaryInformation.CreatedOn<='$txtenddate' "; 
	   $txtclientid=$_GET["CltId"];
 if($userid!="0")
	 {
	 $qry.=" and User.Id='$userid'";
	 }
	 if($txtclientid!="0")
	 {
	 $qry.=" and SalaryInformation.ClientId='$txtclientid'";
	 }
$qry.="  ORDER BY SalaryInformation.Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and SalaryInformation.Id='$cid'";
	
}
//echo $qry;
//exit;
}
 else if($tbl=="SalaryInformation26")
 {
	$userid =$_GET["userid"];
$qry="SELECT SalaryInformation26.Serial,SalaryInformation26.EmployeeId,SalaryInformation26.Amount,User.Name AS UName,Client.Name AS CName,SalaryInformation26.PaidDate,SalaryInformation26.TaxDeducted,SalaryInformation26.TaxDeductedDate,SalaryInformation26.IncTax,SalaryInformation26.SurchargeAmt,SalaryInformation26.EduCessAmt,SalaryInformation26.ChallanId,SalaryInformation26.IncomeTax,SalaryInformation26.TotalAmt,SalaryInformation26.CreatedOn,SalaryInformation26.ClientId,(SELECT Employee.Name FROM Employee WHERE Employee.Id=SalaryInformation26.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan WHERE Challan.Id=SalaryInformation26.ChallanId)AS challanname FROM SalaryInformation26 INNER JOIN dbsilicon.Client ON
  Client.Id=SalaryInformation26.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId WHERE User.Active = 1 AND Client.Active = 1  ";
if( $cid== "0")
{
	$showno=$_GET['show'];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and SalaryInformation26.CreatedOn>='$txtdate' and SalaryInformation26.CreatedOn<='$txtenddate' "; 
	   $txtclientid=$_GET["CltId"];
 if($userid!="0")
	 {
	 $qry.=" and User.Id='$userid'";
	 }
	 if($txtclientid!="0")
	 {
	 $qry.=" and SalaryInformation26.ClientId='$txtclientid'";
	 }
$qry.="  ORDER BY SalaryInformation26.Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and SalaryInformation26.Id='$cid'";
	
}
//echo $qry;
//exit;
}
 else if($tbl=="SalaryInformation27")
 {
	$userid =$_GET["userid"];
$qry="SELECT SalaryInformation27.Serial,SalaryInformation27.EmployeeId,SalaryInformation27.Amount,User.Name AS UName,Client.Name AS CName,SalaryInformation27.PaidDate,SalaryInformation27.TaxDeducted,SalaryInformation27.TaxDeductedDate,SalaryInformation27.IncTax,SalaryInformation27.SurchargeAmt,SalaryInformation27.EduCessAmt,SalaryInformation27.ChallanId,SalaryInformation27.IncomeTax,SalaryInformation27.TotalAmt,SalaryInformation27.CreatedOn,SalaryInformation27.ClientId,(SELECT Employee.Name FROM Employee WHERE Employee.Id=SalaryInformation27.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan WHERE Challan.Id=SalaryInformation27.ChallanId)AS challanname FROM SalaryInformation27 INNER JOIN dbsilicon.Client ON
  Client.Id=SalaryInformation27.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId WHERE User.Active = 1 AND Client.Active = 1  ";
if( $cid== "0")
{
	$showno=$_GET['show'];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].$timePr;
	  $qry.=" and SalaryInformation27.CreatedOn>='$txtdate' and SalaryInformation27.CreatedOn<='$txtenddate' "; 
	   $txtclientid=$_GET["CltId"];
 if($userid!="0")
	 {
	 $qry.=" and User.Id='$userid'";
	 }
	 if($txtclientid!="0")
	 {
	 $qry.=" and SalaryInformation27.ClientId='$txtclientid'";
	 }
$qry.="  ORDER BY SalaryInformation27.Id DESC "; 
if($showno != "All")
{
	$qry.=" LIMIT $showno";
}
}
else
{
	
	$qry.=" and SalaryInformation27.Id='$cid'";
	
}
//echo $qry;
//exit;
}
 else if($tbl=="UploadScannedCopies")
 {
$userid =$_GET["userid"];		
$qry="SELECT UploadScannedCopies.Id,UploadScannedCopies.FilePath,UploadScannedCopies.ClientId,UploadScannedCopies.Quarter,
UploadScannedCopies.Year,UploadScannedCopies.Date,UploadScannedCopies.Description,UploadScannedCopies.DocType,
UploadScannedCopies.Active,UploadScannedCopies.CreatedOn,User.Id AS UId,User.Name AS UName,Client.Name AS CName FROM UploadScannedCopies INNER JOIN dbsilicon.Client ON Client.Id=UploadScannedCopies.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId WHERE User.Active = 1 AND  Client.Active = 1 AND UploadScannedCopies.Active=1";
 
if( $cid== "0")
{
	$txtclientid=$_GET["CltId"];
	$showno=$_GET['show'];
$txtdate=$_GET["txtdate"].$startPr;
 $txtenddate=$_GET["txtenddate"].' '.$timePr;
 if($userid!="0")
	 {
	 $qry.=" and User.Id='$userid'";
	 }
 $qry.=" and UploadScannedCopies.CreatedOn>='$txtdate' and UploadScannedCopies.CreatedOn<='$txtenddate' "; 

 if($txtclientid!="0")
	 {
	 $qry.=" and UploadScannedCopies.ClientId='$txtclientid'";
	 }
	 $qry.="  ORDER BY UploadScannedCopies.Id DESC "; 

}
else
{
	
	$qry.=" and UploadScannedCopies.Id='$cid'";
	//echo $qry;
}
}
//task
 else if($tbl=="Task")
 {
$userid =$_GET["userid"];	 
$qry="SELECT Task.Id,Task.ClientId,Task.DateGiven,Task.Task,Task.DateComplete,Task.CompletedByUserId,Task.Status,Task.CreatedOn,User.Id AS UId,User.Name AS UName,Client.Name AS CName FROM Task INNER JOIN dbsilicon.Client ON Client.Id=Task.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId WHERE User.Active = 1 AND  Client.Active = 1";
 
if( $cid== "0")
{
 $txtclientid=$_GET["CltId"];
	 $txtdate=$_GET["txtdate"].$startPr;
	  $txtenddate=$_GET["txtenddate"].' '.$timePr;
	$showno=$_GET['show'];
	 if($userid!="0")
	 {
	 $qry.=" and User.Id='$userid'";
	 }
$qry.=" and Task.CreatedOn>='$txtdate' and Task.CreatedOn<='$txtenddate'"; 
   
	 if($txtclientid!="0")
	 {
	 $qry.=" and Task.ClientId='$txtclientid'";
	 }
$qry.="  ORDER BY Task.Id DESC "; 
}


else
{
	
	$qry.=" and Task.Id='$cid' ";
	
}

}

$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
	 ?> 