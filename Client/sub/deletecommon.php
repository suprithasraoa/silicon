<?php
include("../dbConnect/dbConnect.php"); 
$tblnme=strval($_GET['Tname']);
	
//Employee
	if($tblnme == "Employee")
	{
		
		$id=$_GET['pkvId'];
	$delete="update Employee set Active=0 where Id= $id";
	//echo $delete;
	//exit;
if(mysqli_query($dbcon,$delete))
{
		
             echo json_encode("success");      
       
    }

	}
		else if($tblnme == "Deductee")
	{
		
		$id=$_GET['pkvId'];
	$delete="update Deductee set Active=0 where Id= $id";
	//echo $delete;
	//exit;
if(mysqli_query($dbcon,$delete))
{
		
             echo json_encode("success");      
       
    }

	}
	//Challan
	else if($tblnme == "Challan")
	{
		
		$id=$_GET['pkvId'];
	$delete="update Challan set Active=0 where Id= $id";
if(mysqli_query($dbcon,$delete))
{
		
             echo json_encode("success");      
       
    }

	}
		//DeducteeChallan
	else if($tblnme == "DeducteeChallan")
	{
		
		$id=$_GET['pkvId'];
	$delete="update DeducteeChallan set Active=0 where Id= $id";
if(mysqli_query($dbcon,$delete))
{
		
             echo json_encode("success");      
       
    }

	}
	//UploadScannedCopies
	else if($tblnme == "UploadScannedCopies")
{

$id=$_GET['pkvId'];
$delete="update UploadScannedCopies set Active=0 where Id= $id";

if(mysqli_query($dbcon,$delete))
{

            echo json_encode("success");      
      
   }

}
	else
 {
  echo json_encode("error");
 }
 
 ?>
