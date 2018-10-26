 <?php 
  include("../dbConnect/dbConnect.php");
  $data=array();	
  $field=$_GET['field'];
  
  $query ="SELECT EmployeeCtr FROM Parameter where ClientId=$field";

    $result = mysqli_query($dbcon,$query);
  
while ($row=mysqli_fetch_object($result)){
 $data[]=$row;	
}
echo json_encode($data);
?>