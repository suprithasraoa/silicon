 <?php 
  include("../dbConnect/dbConnect.php");
  $data=array();	
  $userid=$_GET['UserId'];
  $query ="SELECT 0  AS Id,'--select--' AS Name UNION ALL SELECT Id,Name FROM Client where Active=1 and UserId='$userid' ";

    $result = mysqli_query($dbcon,$query);
  
while ($row=mysqli_fetch_object($result)){
 $data[]=$row;	
}
echo json_encode($data);
?>