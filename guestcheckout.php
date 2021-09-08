<?php
@include("includes/config.php");
$_SESSION["guest_id"]=1;
if($_SESSION["guest_id"]==1)
{
    header("Location: checkout.php");
}
?>