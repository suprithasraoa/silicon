<?php

  include("dbConnect/dbConnect.php");
$description_arr = array();

  $stmt = $dbcon->prepare("SELECT Name FROM Employee Where Active=1"); 
  $stmt->execute();
  $stmt->bind_result($description); 
  while($stmt->fetch()){ 
    $description_arr[] = $description;
  } 
  echo json_encode($description_arr);

?>