<?php
@include("includes/config.php");
/*print_r($_REQUEST);
print_r($_SESSION);*/
$dbh = connectdb();
$cart_array=cart();
$totalcost=0;
$order_price=0;
for($i=0;$i<count($cart_array);$i++)
{
    $totalcost+=$cart_array[$i]->final_price;
}
$shippingcost=shippingcost();
$order_price=$totalcost+$shippingcost;
if($_SESSION["customer_id"]!="") $customer_id=$_SESSION["customer_id"];
if(isset($_SESSION["guest_id"])) $customer_id="guest";
$sql="INSERT INTO orders
(customers_id,customers_name,email,delivery_name,delivery_street_address,delivery_city,delivery_state,delivery_postcode,delivery_phone,payment_method,subtotal,order_price,shipping_cost,created_at)
VALUES('".$customer_id."','".$_SESSION["shipping_username"]."','".$_SESSION["shipping_email"]."','".$_SESSION["shipping_username"]."','".$_SESSION["shipping_address1"]."'
,'".$_SESSION["shipping_city"]."','".$_SESSION["shipping_state"]."','".$_SESSION["shipping_pincode"]."','".$_SESSION["shipping_mobile"]."','".$_REQUEST["cod"]."','".$totalcost."',
'".$order_price."','".$shippingcost."','".date("Y-m-d")."')";
$query = $dbh->prepare($sql);
$query->execute();
$order_id=$dbh->lastInsertId();
for($i=0;$i<count($cart_array);$i++)
{
    $product_name=getProductName($cart_array[$i]->products_id);
    $weight=getOptionWeight($cart_array[$i]->options_id);
    $unit=getOptionUnit($cart_array[$i]->options_id);
    $product_price= getProductPrice($cart_array[$i]->options_id);
    $sql="INSERT INTO orders_products(order_id,product_id,option_id,products_name,products_price,final_price,products_quantity)
    VALUES('".$order_id."','".$cart_array[$i]->products_id."','".$cart_array[$i]->options_id."','".$product_name." - ".$weight." ".$unit."','".$product_price."','".$cart_array[$i]->final_price."'
    ,'".$cart_array[$i]->customers_basket_quantity."')";
    $query = $dbh->prepare($sql);
    $query->execute();
}
$sql="DELETE FROM customers_basket WHERE session_id='".session_id()."'";
$result = $dbh->prepare($sql);
$result->execute();
header("Location: thankyou.php?orderid=".$order_id);
?>