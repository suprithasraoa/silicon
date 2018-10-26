<?php
 include("../dbConnect/dbConnect.php"); 
$qry="";
$tblnme=strval($_GET['Tname']);

$data=array();
if($tblnme=="Nature")
{
$qry="select SectionId,NatureOfPayment from ChallanLink where Stype='".$_GET['txtType']."'";
}
else if($tblnme=="sec")
{
$qry="select Description from Section where Section.Id='".$_GET['txtId']."'";
}
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
?>