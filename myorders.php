<!DOCTYPE html>
<?php
@include("includes/config.php");
if($_SESSION["customer_id"]=="" && !isset($_SESSION["guest_id"]))
{
    header("Location: login.php");
}
$myorders=getMyOrders();
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
        <title> BSS</title>
    </head>
<body>
<?php @include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php @include("sidebar.php"); ?>
            </div>
            <div class="col-sm-9">
                <div class="heading">
                  <h2>My Orders</h2>
                  <hr>
                </div>
                <table class="table">
                    <?php
                    if(count($myorders)>0){?>
                    <thead>
                        <tr class="d-flex">
                            <th class="col-sm-2">Order ID</th>
                            <th class="col-sm-2">Order Date</th>
                            <th class="col-sm-2">Price</th>
                            <th class="col-sm-3">Status</th>
                            <th class="col-sm-3"> Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<count($myorders);$i++){?>
                        <tr class="d-flex">
                            <td><?php echo $myorders[$i]->orders_id; ?></td>
                            <td><?php echo $myorders[$i]->created_at; ?></td>
                            <td><?php echo $myorders[$i]->order_price; ?></td>
                            <td>
                                <?php echo $myorders[$i]->status; ?>
                                <?php if($myorders[$i]->status=="Pending"){?>
                                    / <button type="button" class="btn btn-danger" onclick="cancelOrder(<?php echo $myorders[$i]->orders_id; ?>);">Cancel Order</button>
                                <?php } ?>
                            </td>
                            <td><a href="orderdetail.php?order_id=<?php echo $myorders[$i]->orders_id; ?>">View Order</a></td>
                        </tr>
                        <?php } ?>
                    <tbody>
                    <?php } else { ?>
                        <tbody>
                            <tr>
                                <td>No Orders Placed.</td>
                            </tr>
                        </tbody> 
                    <?php } ?>
                </table>
            </div>
    </div>
 <br>
 <br>
 <script>
function cancelOrder(orderid)
{
    if(confirm("Are you sure wants to cancel this order"))
    {
        $.post("cancelorder.php",{"orderid":orderid}, function(data)
        {
            //alert(data);
          window.location.reload();

        });
    }
}
 </script>
</body>
</html>