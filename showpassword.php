<?php
@include("includes/config.php");
//print_r($_REQUEST);
$dbh = connectdb();
$sql="SELECT * FROM customers WHERE phone='".$_REQUEST['mobile']."'";
$result = $dbh->prepare($sql);
$result->execute();
$cust_array=$result->fetchAll(PDO::FETCH_OBJ);
if(count($cust_array)>0)
{
    echo $cust_array[0]->password;
}
else
{
    echo "You are not a customer";
}
?>
<a href="login.php">Login</a>
<?php
exit();
?>