<?php include("dbConnect/dbConnect.php");

$qry="SELECT * FROM SalaryInformation ";

$q=mysqli_query($dbcon,$qry);

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=salary.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");


echo '<table border="1">';

echo '<tr><td rowspan="2">Emp. ID.</td><td colspan="3">Gross Salary</td><td colspan="2">Exemption u/s 10</td><td colspan="2">Exemption u/s 10</td><td colspan="2">Exemption u/s 10</td><td colspan="2">Exemption u/s 10</td><td colspan="2">Exemption u/s 10</td><td colspan="2">Exemption u/s 10</td><td colspan="2">Exemption u/s 10</td><td colspan="2">Exemption u/s 10</td><td rowspan="2">Gross Total of Total Exemption  under section 10 under  associated  Salary Details - Section 10 Detail </td><td rowspan="2">Total Salary</td><td colspan="2">Deduction u/s 16</td><td rowspan="2">Gross Total of Total Deduction under section 16 under  associated  Salary Details  - Section 16 Detail </td><td rowspan="2">Income chargeable under the head Current Salaries</td><td rowspan="2">Taxable Salary from previous Employment</td><td rowspan="2">Income ( including loss from house property) under any head other than income under the head "salaries" offered for TDS</td><td rowspan="2">Gross Total Income</td><td colspan="3">Chapter VIA Details (1)</td><td colspan="3">Chapter VIA Details (2)</td><td colspan="3">Chapter VIA Details (3)</td><td colspan="3">Chapter VIA Details (4)</td><td colspan="3">Chapter VIA Details (5)</td><td colspan="3">Chapter VIA Details (6)</td><td colspan="3">Chapter VIA Details (7)</td><td colspan="3">Chapter VIA Details (8)</td><td colspan="3">Chapter VIA Details (8)</td><td colspan="3">Chapter VIA Details (10)</td><td rowspan="2">Gross Total of Amount deductible under provisions of chapter VI-A under  associated  Salary Details  - Chapter VIA Detail</td><td rowspan="2">Total Taxable Income</td><td rowspan="2">Income Tax on Total Income</td><td rowspan="2">Income Tax Credit u/s 87A</td><td rowspan="2">Surcharge</td><td rowspan="2">Education Cess</td><td rowspan="2">Total Income Tax Payable</td><td rowspan="2">Income Tax Relief</td><td colspan="3">TDS made in Previous Employment</td><td colspan="3">TDS made without Deduction details</td><td rowspan="2">Net Income Tax payable</td><td rowspan="2">TDS deducted From Employee u/s 192 (1)</td><td rowspan="2">Tax paid by the employer on behalf of the employee u/s 192 (1A) on perquisites u/s 17(2)</td><td rowspan="2">Tax Payable/Refundable </td><td colspan="14">Perquisites.</td><td rowspan="2">Sum Total of Other Recoveries from Employee - N.A</td></tr>';

echo '<tr><td>Total amount of salary , excluding amount required  to shown in columns 3 and 4.</td><td>House Rent Allowance and Otder Allowances to tde extent Chargeable to Tax (see sec 10(13A) read witd rule 2A)</td><td>Value of perquisites and amount accretion to Employees PF Account(Total 4=84+85+86+87+88+89+90)</td><td>Description (1)</td><td>Amount (1)</td><td>Description (2)</td><td>Amount (2)</td><td> Description (3)</td><td>Amount (3)</td><td>Description (4)</td><td>Amount (4)</td><td>Description (5)</td><td>Amount (5)</td><td>Description (6)</td><td>Amount (6)</td><td>Description (7)</td><td>Amount (7)</td><td>Description (8)</td><td>Amount (8)</td><td>Entertainment allowance</td><td>Tax on Employment(PT)</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Particulars</td><td>Gross Amount</td><td>Deductible Amount</td><td>Income Tax</td><td>Surcharge</td><td>Cess</td><td>Income Tax</td><td>Surcharge</td><td>Cess</td><td>Perk- Where accommodation is unfurnished</td><td>Perk-Furnished-Value as if accommodation is unfurnished</td><td>Perk-Furnished-Cost of furniture</td><td>Perk-Furnished-Furniture Rentals</td><td>Perk-Furnished-Perquisite value of furniture (10% of 57)  + Perk-Furnished-Furniture Rentals</td><td>Perk-Furnished-Total</td><td>Rent, if any, paid by employee</td><td>Value of perquisite</td><td>Perquisite value of conveyance/car</td><td>Remuneration paid by employer for domestic and personal services provided to the employee</td><td>Value of free or concessional passages on home leave and other traveling to the extent chargeable to tax </td><td>Estimated value of any other benefit or amenity provided by the employer free of cost or at concessional rate not included in the preceding columns</td><td>Employers contribution to recognised provident fund in excess of 12% of employees salary</td><td>Interest credited to the assessees account in recognised PF Fund in excess of the rate fixed by central govt.</td></tr>';
echo  '<tr>';
$sctn='';
for ($x = 1; $x <= 92; $x++) {
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