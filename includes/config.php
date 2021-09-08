<?php
// DB credentials.
// define('DB_HOST','localhost');
// define('DB_USER','root');
// define('DB_PASS','');
// define('DB_NAME','bss');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shopping_cart-new');
session_start();
function connectdb()
{

    // Establish database connection.
    try {
        // $link = mysql_connect('localhost', 'mysql_user', 'mysql_password');
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
    return $dbh;
}
function categories($parent_id = 0)
{
    $dbh = connectdb();
    $category_array = array();
    $condition = "parent_id='" . $parent_id . "'";
    $sql = "SELECT * FROM category WHERE category_status='1' AND " . $condition . "ORDER BY priority DESC";
    $result = $dbh->prepare($sql);
    $result->execute();
    $category_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $category_array;
}
function getCategoryName($category_id = 0)
{
    $dbh = connectdb();
    if ($category_id == 0) {
        $sql = "SELECT category_name FROM category WHERE category_status='1' ORDER BY priority DESC LIMIT 1";
    } else {
        $sql = "SELECT category_name FROM category WHERE category_id='" . $category_id . "' ORDER BY priority DESC";
    }
    $result = $dbh->prepare($sql);
    $result->execute();
    $category_array = $result->fetchAll(PDO::FETCH_OBJ);
    $category_name = $category_array[0]->category_name;
    return $category_name;
}
function products($category_id = 0)
{
    $dbh = connectdb();
    $product_array = array();
    //echo $category_id;exit();
    if ($category_id == 0) {
        $sql = "SELECT * FROM category WHERE category_status='1' AND parent_id='0' ORDER BY priority DESC LIMIT 1";
        $result = $dbh->prepare($sql);
        $result->execute();
        $category_array = $result->fetchAll(PDO::FETCH_OBJ);
        $category_id = $category_array[0]->category_id;
    }
    //echo $category_id
    if ($category_id != "" && $category_id > 0)
        $condition = "AND (category_id='" . $category_id . "' OR subcategory_id='" . $category_id . "')";
    $sql = "SELECT * FROM products WHERE products_status='1'" . $condition . "ORDER BY products_id DESC  LIMIT 10";
    $result = $dbh->prepare($sql);
    $result->execute();
    $product_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $product_array;
}
function getProductOptions($product_id)
{
    $dbh = connectdb();
    $option_array = array();
    $sql = "SELECT * FROM products_options WHERE stock>0 AND product_id='" . $product_id . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $option_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $option_array;
}
function cart()
{
    $dbh = connectdb();
    $cart_array = array();
    $sql = "SELECT * FROM customers_basket WHERE session_id='" . session_id() . "' AND is_order='0'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $cart_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $cart_array;
}
function getProductName($product_id)
{
    $dbh = connectdb();
    $sql = "SELECT products_name FROM products WHERE products_id='" . $product_id . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $product_array = $result->fetchAll(PDO::FETCH_OBJ);
    $products_name = $product_array[0]->products_name;
    return $products_name;
}
function getOptionWeight($option_id)
{
    $dbh = connectdb();
    $sql = "SELECT weight FROM products_options WHERE option_id='" . $option_id . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $product_array = $result->fetchAll(PDO::FETCH_OBJ);
    $weight = $product_array[0]->weight;
    return $weight;
}
function getOptionUnit($option_id)
{
    $dbh = connectdb();
    $sql = "SELECT unit FROM products_options WHERE option_id='" . $option_id . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $product_array = $result->fetchAll(PDO::FETCH_OBJ);
    $unit = $product_array[0]->unit;
    return $unit;
}
function getcart($productid)
{
    $dbh = connectdb();
    $sql = "SELECT * FROM customers_basket WHERE session_id='" . session_id() . "' AND products_id='" . $productid . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $cart_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $cart_array;
}
function getCartOptions($optionid)
{
    $dbh = connectdb();
    $sql = "SELECT * FROM customers_basket WHERE session_id='" . session_id() . "' AND options_id='" . $optionid . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $cart_array = $result->fetchAll(PDO::FETCH_OBJ);
    $options = array();
    for ($i = 0; $i < count($cart_array); $i++) {
        $options[$i] = $cart_array[$i]->options_id;
    }
    return $options;
}
function shippingcost()
{
    $dbh = connectdb();
    $ship_array = array();
    $sql = "SELECT * FROM shipping WHERE status='1'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $ship_array = $result->fetchAll(PDO::FETCH_OBJ);
    $shipcost = $ship_array[0]->amount;
    return $shipcost;
}
function getProductImage($product_id)
{
    $dbh = connectdb();
    $sql = "SELECT products_image FROM products WHERE products_id='" . $product_id . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $product_array = $result->fetchAll(PDO::FETCH_OBJ);
    $image_name = $product_array[0]->products_image;
    return $image_name;
}
function getProductPrice($option_id)
{
    $dbh = connectdb();
    $option_array = array();
    $sql = "SELECT price FROM products_options WHERE option_id='" . $option_id . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $option_array = $result->fetchAll(PDO::FETCH_OBJ);
    $price = $option_array[0]->price;
    return $price;
}
function getAllPincode()
{
    $dbh = connectdb();
    $sql = "SELECT * FROM pincodelist WHERE status='1'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $pincode_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $pincode_array;
}
function getOrder($order_id)
{
    $dbh = connectdb();
    $sql = "SELECT * FROM orders WHERE orders_id='" . $order_id . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $order_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $order_array;
}
function getOrderedProducts($order_id)
{
    $dbh = connectdb();
    $sql = "SELECT * FROM orders_products WHERE order_id='" . $order_id . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $orderprouduct_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $orderprouduct_array;
}
function getMyOrders()
{
    $dbh = connectdb();
    $sql = "SELECT * FROM orders WHERE customers_id='" . $_SESSION["customer_id"] . "' ORDER BY orders_id DESC";
    $result = $dbh->prepare($sql);
    $result->execute();
    $order_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $order_array;
}
function getMyProfile()
{
    $dbh = connectdb();
    $sql = "SELECT * FROM customers WHERE id='" . $_SESSION["customer_id"] . "'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $customer_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $customer_array;
}
function banners()
{
    $dbh = connectdb();
    $banner_array = array();
    $sql = "SELECT * FROM banners WHERE status='1'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $banner_array = $result->fetchAll(PDO::FETCH_OBJ);
    return $banner_array;
}
function shopDetails() {
    $dbh = connectdb();
    $sql = "SELECT * FROM shop_details WHERE id='1'";
    $result = $dbh->prepare($sql);
    $result->execute();
    $shop = $result->fetch(PDO::FETCH_OBJ);
    return $shop;
}
