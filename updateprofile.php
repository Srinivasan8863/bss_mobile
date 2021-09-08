<?php
@include("includes/config.php");
$firstname=$_REQUEST["firstname"];
$email=$_REQUEST["email"];
$mobile=$_REQUEST["mobile"];
$dbh = connectdb();
$sql="SELECT phone FROM customers WHERE id!='".$_SESSION["customer_id"]."'";
$query = $dbh->prepare($sql);
$query->execute();
$customer_array=$query->fetchAll(PDO::FETCH_OBJ);
if(count($customer_array)==0)
{
    $sql="UPDATE customers SET phone='".$mobile."',email='".$email."',first_name='".$firstname."' WHERE id='".$_SESSION["customer_id"]."'";
    $query = $dbh->prepare($sql);
    $query->execute();
}
echo "Profile updated successfully";
header("Location: myprofile.php");
?> 