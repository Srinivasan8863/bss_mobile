<?php
@include("includes/config.php");
$option_id=$_REQUEST["option_id"];
$product_id=$_REQUEST["product_id"];
$dbh = connectdb();
$sessionid = session_id();
$sql="SELECT * FROM customers_basket WHERE session_id='".$sessionid."' AND options_id='".$option_id."'";
$result = $dbh->prepare($sql);
$result->execute();
$cart_array=$result->fetchAll(PDO::FETCH_OBJ);
$cart_quantity=$cart_array[0]->customers_basket_quantity;
$cart_quantity=$cart_quantity+1;
$final_price=0;
$sql="SELECT * FROM products_options WHERE option_id='".$option_id."' AND stock>=".$cart_quantity;
$result = $dbh->prepare($sql);
$result->execute();
$price_array=$result->fetchAll(PDO::FETCH_OBJ);
$price=$price_array[0]->price;
$final_price=$cart_quantity*$price;
$sql="UPDATE customers_basket SET customers_basket_quantity='".$cart_quantity."', final_price='".$final_price."' WHERE session_id='".$sessionid."' AND options_id='".$option_id."'";
$query = $dbh->prepare($sql);
$query->execute();
$response= "Product Updated to Cart successfully||".$cart_quantity;
echo $response;
?>