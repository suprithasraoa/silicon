 <?php 
  include("../dbConnect/dbConnect.php");
  $data=array();	
  $field=$_GET['field'];
  $ctr=$_GET['ctr'];
  $query ="SELECT $ctr FROM Parameter where ClientId=$field";

    $result = mysqli_query($dbcon,$query);
  
while ($row=mysqli_fetch_object($result)){
 $data[]=$row;	
}
echo json_encode($data);
?>