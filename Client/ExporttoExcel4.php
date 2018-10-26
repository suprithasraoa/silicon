<?php include("dbConnect/dbConnect.php");

$qry="SELECT * FROM SalaryInformation ";

$q=mysqli_query($dbcon,$qry);

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=salmoredetail.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");


echo '<table border="1">';



echo '<tr><td>Emp. Id</td><td>PAN of Landlord1</td><td>Name of Landlord1</td><td>PAN of Landlord2</td><td>Name of Landlord2</td><td>PAN of Landlord3</td><td>Name of Landlord3</td><td>PAN of Landlord4</td><td>Name of Landlord4</td><td>PAN of Lender1</td><td>Name of Lender1</td><td>PAN of Lender2</td><td>Name of Lender2</td><td>PAN of Lender3</td><td>Name of Lender3</td><td>PAN of Lender4</td><td>Name of Lender4</td><td>Name of Superannuation Fund</td><td>Contribution From Date</td><td>Contribution To Date</td><td>Contribution Repaid</td><td>Averate Tax Rate (%)</td><td>Tax Deducted</td></tr>';
echo  '<tr>';
$sctn='';
for ($x = 1; $x <= 23; $x++) {
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