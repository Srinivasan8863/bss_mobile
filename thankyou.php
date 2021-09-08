<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script><style type="text/css">
    .input-group .form-control{top: -10px !important;
    width: 40px !important;
    margin-left: 5px !important;
    margin-right: 5px !important;
}
    </style>
    <title> BSS</title>
  </head>
<body>
<div class="jumbotron text-center">
  <h1>BSS</h1>
  <p>Bala Super Shoppe</p> 
</div>
<?php
    @include("includes/config.php");
?>
<div class="container">
  <?php
  $orderid=$_REQUEST["orderid"];
  ?>
    Thank You for ordering with us. <a href="orderdetail.php?order_id=<?php echo $orderid; ?>">View Order</a>.
</div>
<?php @include("scripts.php"); ?>
</body>
</html>