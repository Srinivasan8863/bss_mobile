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
$final_price=0;
$sql="SELECT * FROM products_options WHERE option_id='".$option_id."'";
$result = $dbh->prepare($sql);
$result->execute();
$price_array=$result->fetchAll(PDO::FETCH_OBJ);
$price=$price_array[0]->price;
if(!isset($_REQUEST["quantity"]) || $_REQUEST["quantity"]=="") $quantity=1; else $quantity=$_REQUEST["quantity"];
$final_price=$quantity*$price;
if(count($cart_array)==0)
{
    $sql="INSERT INTO  customers_basket(products_id,options_id,customers_basket_quantity,final_price,is_order,customers_basket_date_added,session_id) VALUES('".$product_id."','".$option_id."','".$quantity."','".$final_price."','0','".date("Y-m-d")."','".$sessionid."')";
    $query = $dbh->prepare($sql);
    $query->execute();
    echo "Product Added to Cart successfully";
}
else
{
   echo $sql="UPDATE customers_basket SET customers_basket_quantity='".$quantity."', final_price='".$final_price."' WHERE session_id='".$sessionid."' AND options_id='".$option_id."'";
    $query = $dbh->prepare($sql);
    $query->execute();
    echo "Product Updated to Cart successfully";
}
?>