<?php
@include("includes/config.php");
unset($_SESSION);
session_destroy();
header("Location: index.php");
?>