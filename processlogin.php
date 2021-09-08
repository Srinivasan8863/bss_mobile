<?php
@include("includes/config.php");
//print_r($_REQUEST);
$dbh = connectdb();
$sql="SELECT * FROM customers WHERE phone='".$_REQUEST['phone']."' AND password='".$_REQUEST['password']."'";
$result = $dbh->prepare($sql);
$result->execute();
$cust_array=$result->fetchAll(PDO::FETCH_OBJ);
if(count($cust_array)>0)
{
    $_SESSION["customer_id"]=$cust_array[0]->id;
    if(isset($_REQUEST["previous"]) && $_REQUEST["previous"]!="")
        header("Location: ".$_REQUEST["previous"]);
    else
        header("Location: index.php");
}
else
{
    echo "else";
    if(isset($_REQUEST["current"]) && $_REQUEST["current"]!="")
        header("Location: ".$_REQUEST["current"]);
    else
        header("Location: login.php");
}
?>