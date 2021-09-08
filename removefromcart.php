<?php
@include("includes/config.php");
$cartid=$_REQUEST["cartid"];
$categoryid=$_REQUEST["categoryid"];
$dbh = connectdb();
if(empty($categoryid))
{
    $sql="SELECT * FROM category WHERE category_status='1' AND parent_id='0' ORDER BY priority DESC LIMIT 1";
    $result = $dbh->prepare($sql);
    $result->execute();
    $category_array=$result->fetchAll(PDO::FETCH_OBJ);
    $categoryid=$category_array[0]->category_id;
}
$sql="DELETE FROM customers_basket WHERE customers_basket_id='".$cartid."'";
$query = $dbh->prepare($sql);
$query->execute();
/*$response= "Product Deleted from Cart successfully";
echo $response;*/
echo $categoryid;
exit();
?>