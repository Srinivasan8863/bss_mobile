<?php
@include("includes/config.php");
$dbh = connectdb();
$code = rand(1000,9999);
$mobile=$_REQUEST["phone"];
$sql="INSERT INTO  verify_code(phone,verification_code) VALUES('".$mobile."','".$code."')";
$query = $dbh->prepare($sql);
$query->execute();
echo $code;
?>