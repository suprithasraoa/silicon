<?php
include("../dbConnect/dbConnect.php"); 
$output = array(); 

$query = "SELECT * FROM Client Where Resp_Person_PhNo='".$_GET["mobile"]."'  and Resp_Person_Password='".$_GET["password"]."'";  
$result = mysqli_query($dbcon, $query);  
if(mysqli_num_rows($result)>0)
{
while($row = mysqli_fetch_array($result))  
{  
     $output[] = $row;  
}  
//echo json_encode($output);  
echo "success";  
}
else
{
	echo "failed";
}

?>