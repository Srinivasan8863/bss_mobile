<?php
@include("includes/config.php");
$option_id=$_REQUEST["option_id"];
$product_id=$_REQUEST["product_id"];
$dbh = connectdb();
$sessionid = session_id();
$sql="SELECT * FROM customers_basket WHERE session_id='".$sessionid."' AND products_id='".$product_id."'";
$result = $dbh->prepare($sql);
$result->execute();
$cart_array=$result->fetchAll(PDO::FETCH_OBJ);
echo $cart_array[0]->customers_basket_quantity;
exit();
?>