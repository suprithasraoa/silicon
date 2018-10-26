<?php include("dbConnect/dbConnect.php");

$qry="SELECT *,(SELECT Employee.Name FROM Employee WHERE Employee.Id=SalaryInformation.EmployeeId)AS empname,(SELECT CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan WHERE Challan.Id=SalaryInformation.ChallanId)AS challanname FROM SalaryInformation ";

$q=mysqli_query($dbcon,$qry);


//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");


echo '<table border="1">';
//make the column headers what you want in whatever order you want
echo '<tr><th>Field Name 1</th><th>Field Name 2</th><th>Field Name 3</th></tr>';
//loop the query data to the table in same order as the headers
while ($row=mysqli_fetch_assoc($q)){
    echo "<tr><td>".$row['empname']."</td><td>".$row['challanname']."</td><td>".$row['Id']."</td></tr>";
}
echo '</table>';
?>