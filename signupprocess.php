<?php
@include("includes/config.php");
//print_r($_REQUEST);
$dbh = connectdb();
$sql="SELECT * FROM customers WHERE phone='".$_REQUEST['mobile']."'";
$result = $dbh->prepare($sql);
$result->execute();
$cust_array=$result->fetchAll(PDO::FETCH_OBJ);
if(count($cust_array)==0)
{
   /* $sql="UPDATE verify_code SET is_verified='1' WHERE phone='".$_REQUEST['mobile']."' AND verification_code='".$_REQUEST['code']."'";
    $result = $dbh->prepare($sql);
    $result->execute();*/
    $sql="INSERT INTO  customers(first_name,phone,email,password) VALUES('".$_REQUEST['firstname']."','".$_REQUEST['mobile']."','".$_REQUEST['email']."','".$_REQUEST['password']."')";
    $query = $dbh->prepare($sql);
    $query->execute();
    $_SESSION["customer_id"]=$dbh->lastInsertId();
    header("Location: ".$_REQUEST["previous"]);
}
else
{
    echo "Customer exists!";
}
?>