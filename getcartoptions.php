<?php
@include("includes/config.php");
$option_id=$_REQUEST["option_id"];
$dbh = connectdb();
$sessionid = session_id();
$sql="SELECT * FROM customers_basket WHERE session_id='".$sessionid."' AND options_id='".$option_id."'";
$result = $dbh->prepare($sql);
$result->execute();
$cart_array=$result->fetchAll(PDO::FETCH_OBJ);
echo count($cart_array);
exit();
?>