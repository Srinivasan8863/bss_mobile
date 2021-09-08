<?php
@include("includes/config.php");
$new_password=$_REQUEST["new_password"];
$dbh = connectdb();
$sql="UPDATE customers SET password='".$new_password."' WHERE id='".$_SESSION["customer_id"]."'";
$query = $dbh->prepare($sql);
$query->execute();
echo "Password updated successfully";
header("Location: myprofile.php");
?> 