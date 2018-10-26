<?php include("dbConnect/dbConnect.php");

$qry="SELECT * FROM SalaryInformation ";

$q=mysqli_query($dbcon,$qry);

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=challan.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");


echo '<table border="1">';



echo '<tr><td>Serial No.</td><td>Income Tax</td><td>Fee u/s 234E</td><td>Surcharge</td><td>Education Cess</td><td>Interest</td><td>Penalty</td><td>Other Amount Paid</td><td>Amount of Tax Paid</td><td>TDS Interest Amount</td><td>TDS Other Amount</td><td>Type of Payment</td><td>Bank Challan No./Transfer voucher No.</td><td>Date of Bank Challan/Transfer Voucher</td><td>Bank Branch Code</td><td>Payment Mode</td><td>Cheque / DD No. (if any)</td><td>Cheque / DD Date (if any)</td><td>Cheque / DD Drawn Bank branch Name</td><td>Remarks</td></tr>';
echo  '<tr>';
$sctn='';	
for ($x = 1; $x <= 15; $x++) {
    $sctn.= '<td>'.$x.'</td>';
} 
echo  $sctn;
echo '</tr>';
while ($row=mysqli_fetch_assoc($q)){
   // $excelSection="<tr><td>".$row['Serial']."</td><td>Mr.</td><td>".$row['Name']."</td><td>".$row['DesignationId']."</td><td>Male</td><td></td><td></td><td></td><td></td><td>".$row['PAN']."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row['Mobile']."</td><td>-</td></tr>";
	
	//echo $excelSection;
}
echo '</table>';
?>