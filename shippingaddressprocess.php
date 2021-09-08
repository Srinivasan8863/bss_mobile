<?php
@include("includes/config.php");
$_SESSION["shipping_username"]=$_REQUEST["firstname"];
$_SESSION["shipping_address1"]=$_REQUEST["address1"];
$_SESSION["shipping_city"]=$_REQUEST["city"];
$_SESSION["shipping_state"]=$_REQUEST["state"];
$_SESSION["shipping_pincode"]=$_REQUEST["pincode"];
$_SESSION["shipping_email"]=$_REQUEST["email"];
$_SESSION["shipping_mobile"]=$_REQUEST["mobile"];
$_SESSION["step"]=2;
header("Location: ".$_REQUEST["current"]);
?>