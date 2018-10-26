<?php
include "Db.php";

 $shopid=$_GET['shopid'];
  $txtloaddate=$_GET['txtloaddate'];
// $endtime=$_GET['dte'];
$data=array();
if($shopid != "0")
{
$qry="SELECT ShopProduct.id,Shop.description,ProductType.description AS prtype,Variant.description AS prvariant,inwardQty FROM ShopProduct
 INNER JOIN Product ON ShopProduct.productId=Product.Id INNER JOIN ProductType ON Product.prTypeId=ProductType.id INNER JOIN  Variant ON Variant.id=Product.prVariantId INNER JOIN Shop ON Shop.id=ShopProduct.shopId WHERE  Shop.id='$shopid' AND loaddate='$txtloaddate' ORDER BY id DESC";
 }


$q=mysqli_query($con,$qry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;	
}
echo json_encode($data);
?>