<?php include("dbConnect/dbConnect.php");

$qry="SELECT * FROM Employee ";

$q=mysqli_query($dbcon,$qry);


header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=employee.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");


echo '<table border="1">';
echo '<tr><td rowspan="2">Emp. Id.</td><td rowspan="2">Title</td><td rowspan="2">Name</td><td rowspan="2">Designation of Employee</td><td rowspan="2">Gender</td><td rowspan="2">Senior Citizen / Very Senior Citizen</td><td rowspan="2">Date of Birth (dd/mm/yyyy)</td><td colspan="2">Period of Employment</td><td rowspan="2">PAN</td><td rowspan="2">Flat/Door/Block No.</td><td rowspan="2">Name of Building</td><td rowspan="2">Street/Road Name</td><td rowspan="2">Area</td><td rowspan="2">City</td><td rowspan="2">State</td><td rowspan="2">Pincode</td><td rowspan="2">Phone</td><td rowspan="2">Mobile Number</td><td rowspan="2">Email</td><td rowspan="2">Is Director</td><td rowspan="2">Reference No.</td></tr>';

echo '<tr><td>From - Date</td><td>To - Date</td></tr>';
echo '<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td></tr>';
while ($row=mysqli_fetch_assoc($q)){
    $excelSection="<tr><td>".$row['SerialNo']."</td><td>Mr.</td><td>".$row['Name']."</td><td>".$row['DesignationId']."</td><td>Male</td><td></td><td></td><td></td><td></td><td>".$row['Pan']."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row['Mobile']."</td><td>-</td><td></td><td></td></tr>";
	
	echo $excelSection;
}
echo '</table>';
?>