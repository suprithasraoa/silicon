<?php include("dbConnect/dbConnect.php");

$qry="SELECT * FROM Client where Id=1";

$q=mysqli_query($dbcon,$qry);

/* header("Content-Type: application/vnd.openxmlformats.officedocument.spreadsheetml.sheet");    
header("Content-Disposition: attachment; filename=deductor.xls");  
header("Cache-Control: max-age=0"); 

 */


//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=deductor.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

echo '<table border="1">';
echo '<tr><td></td><td>Deductor Master</td></tr>';

echo '<tr><td>Deductor Details</td><td></td></tr>';

while ($row=mysqli_fetch_assoc($q)){
    $excelSection="<tr><td>Name</td><td>".$row['Name']."</td></tr>";
	$excelSection.="<tr><td>Branch/Division</td><td>".$row['Branch']."</td></tr>";
	$excelSection.="<tr><td>Flat/Door/Block No.</td><td>-</td></tr>";
	$excelSection.="<tr><td>Name of the Building</td><td></td></tr>";
	$excelSection.="<tr><td>Street/Road Name</td><td></td></tr>";
	$excelSection.="<tr><td>Area</td><td></td></tr>";
	$excelSection.="<tr><td>City</td><td>-</td></tr>";
	$excelSection.="<tr><td>State</td><td>Karnataka</td></tr>";
	$excelSection.="<tr><td>Pincode</td><td>576101</td></tr>";
	$excelSection.="<tr><td>Address Change</td><td>No</td></tr>";
	$excelSection.="<tr><td>Telephone</td><td></td></tr>";
	$excelSection.="<tr><td>STD Code</td><td></td></tr>";
	$excelSection.="<tr><td>Telephone (Alternate)</td><td></td></tr>";
	$excelSection.="<tr><td>STD Code (Alternate)</td><td></td></tr>";
	$excelSection.="<tr><td>Fax</td><td></td></tr>";
	$excelSection.="<tr><td>E-Mail</td><td>-</td></tr>";
	$excelSection.="<tr><td>E-Mail (Alternate)</td><td></td></tr>";
	$excelSection.="<tr><td>Responsible Person Details</td><td></td></tr>";
	
	$excelSection.="<tr><td>Name</td><td>".$row['RespPersonName']."</td></tr>";
	$excelSection.="<tr><td>Sex</td><td>Male</td></tr>";
	$excelSection.="<tr><td>Father's Name</td><td></td></tr>";
	$excelSection.="<tr><td>Designation</td><td>".$row['RespPersonDesig']."</td></tr>";
	$excelSection.="<tr><td>Flat/Door/Block No.</td><td>-</td></tr>";
	$excelSection.="<tr><td>Name of Building</td><td></td></tr>";
	$excelSection.="<tr><td>Street Name/Road Name</td><td></td></tr>";
	$excelSection.="<tr><td>Area</td><td></td></tr>";
	$excelSection.="<tr><td>City</td><td></td></tr>";
	
		$excelSection.="<tr><td>State</td><td>Karnataka</td></tr>";
	$excelSection.="<tr><td>Pincode</td><td>576101</td></tr>";
	$excelSection.="<tr><td>Address Change</td><td>No</td></tr>";
	$excelSection.="<tr><td>Telephone</td><td></td></tr>";
	$excelSection.="<tr><td>STD Code</td><td></td></tr>";
	$excelSection.="<tr><td>Telephone (Alternate)</td><td></td></tr>";
	$excelSection.="<tr><td>STD Code (Alternate)</td><td></td></tr>";
	$excelSection.="<tr><td>Fax</td><td></td></tr>";
	$excelSection.="<tr><td>Mobile Number</td><td>".$row['RespPersonPhNo']."</td></tr>";
	$excelSection.="<tr><td>E-Mail</td><td></td></tr>";
	$excelSection.="<tr><td>E-Mail (Alternate)</td><td></td></tr>";
		$excelSection.="<tr><td>Statutory Details</td><td></td></tr>";
		
	$excelSection.="<tr><td>TAN</td><td>BLRS12345E</td></tr>";
	$excelSection.="<tr><td>PAN</td><td>".$row['DeductorPAN']."</td></tr>";
	
	$excelSection.="<tr><td>GSTIN</td><td></td></tr>";
	$excelSection.="<tr><td>Status</td><td>Others</td></tr>";
	$excelSection.="<tr><td>Whether existing TDS assessee</td><td>Yes</td></tr>";
	$excelSection.="<tr><td>Assessing officer's code</td><td></td></tr>";
	$excelSection.="<tr><td>Financial Year</td><td>2018-19</td></tr>";
	$excelSection.="<tr><td>Quarter</td><td>Quarter1</td></tr>";
	$excelSection.="<tr><td>Return Type</td><td>Electronic</td></tr>";
	$excelSection.="<tr><td>Responsible Person PAN</td><td>".$row['RespPersonPAN']."</td></tr>";
	$excelSection.="<tr><td>Deductor Type</td><td>Company</td></tr>";
	$excelSection.="<tr><td>State Name</td><td></td></tr>";
	$excelSection.="<tr><td>Accounts Office ID Number (AIN)</td><td></td></tr>";
	$excelSection.="<tr><td>PAO Code</td><td></td></tr>";
	$excelSection.="<tr><td>PAO Registration No.</td><td></td></tr>";
		$excelSection.="<tr><td>DDO Code</td><td></td></tr>";
	$excelSection.="<tr><td>DDO Registration No.</td><td></td></tr>";
	$excelSection.="<tr><td>Ministry</td><td></td></tr>";
	$excelSection.="<tr><td>Other Ministry</td><td></td></tr>";
	echo $excelSection;
}
echo '</table>';
?>