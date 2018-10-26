<?php include("dbConnect/dbConnect.php");

$qry="SELECT * FROM SalaryInformation ";

$q=mysqli_query($dbcon,$qry);

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=saldeduction.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");


echo '<table border="1">';



echo '<tr><td>Serial No.</td><td>Emp. Id</td><td>Name</td><td>Amount of Payment</td><td>Amount Paid/Credited Date</td><td>Income Tax</td><td>Surcharge</td><td>Cess</td><td>Amount of Tax Deducted </td><td>Tax Deducted Date</td><td>Challan Serial No.</td><td>Remarks for Deduction</td><td>Certificate No. of Lower/Non Deduction 
u/s 197</td><td>Narration</td><td>Employer Contribution</td></tr>';
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