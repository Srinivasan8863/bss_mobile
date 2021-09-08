<?php
@include("includes/config.php");
$orderid=$_REQUEST["orderid"];
$dbh = connectdb();
$sql="UPDATE orders SET status='Cancelled' WHERE orders_id='".$orderid."'";
$query = $dbh->prepare($sql);
$query->execute();
echo "Order cancelled successfully";
?>