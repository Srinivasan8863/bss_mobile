<?php
@include("includes/config.php");
$dbh = connectdb();
$code =$_REQUEST["code"];
$phone=$_REQUEST["phone"];
$sql="SELECT * FROM verify_code WHERE phone='".$phone."' AND verification_code='".$code."' LIMIT 1";
$result = $dbh->prepare($sql);
$result->execute();
$data=$result->fetchAll(PDO::FETCH_OBJ);
if(count($data)>0)
{
    echo "1";
}
else
{
    echo "0";
}
?>