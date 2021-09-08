<?php
$cart_array=cart();
$totalcost=0;
for($i=0;$i<count($cart_array);$i++)
{
    $totalcost+=$cart_array[$i]->final_price;
}
$shippingcost=shippingcost();
?>
    <style type="text/css">
    .input-group .form-control .carttext{top: 10px !important;
   /* width: 40px !important;
    margin-left: 5px !important;
    margin-right: 5px !important;*/
}
    </style>
<table class="table right-table">
        <thead>
          <tr>
            <th scope="col" colspan="2" align="center">Order Summary</th>                    
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Sub Total</th>
            <td align="right">₹ <?php echo number_format($totalcost,2); ?></td>

          </tr>
          <tr>
                <th scope="row">Shipping Cost</th>
                <td align="right">₹ <?php echo number_format($shippingcost,2); ?></td>

              </tr>
          <tr class="item-price">
            <th scope="row">Total</th>
            <td align="right">₹ <?php echo number_format(($totalcost+$shippingcost),2); ?></td>

          </tr>
      
        </tbody>
        
      </table>
<hr>
<?php if($_SESSION["step"]==2){?>
<h3>Payment Methods</h3>
<form name="paymentform" class="payment-validate" action="placeorder.php" method="post">
<div class="radio">
    <label><input type="radio" name="cod" id="cod" value="cod" checked>Cash On Delivery</label>
    <span class="form-text text-muted error-content" hidden>This field is required.</span>
</div>
<input type="submit" style="margin-top:20px;margin-left: 15px;" class="btn btn-primary" value="Place Order">
</form>
<?php } ?>