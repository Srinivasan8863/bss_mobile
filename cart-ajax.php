<?php
@include("includes/config.php");
$cart_array=cart();
//print_r($cart_array);
$cartcount=0;
$quantity=0;
$totalcost=0;
for($i=0;$i<count($cart_array);$i++)
{
    $cartcount+=$cart_array[$i]->customers_basket_quantity;
    $totalcost+=$cart_array[$i]->final_price;
}
//$cartcount=count($cart_array);
?>
<div class="row">
    <div class="col-xs-5 col-sm-5"><h4>Your Cart</h4></div>
    <div align="right" class="col-xs-7 col-sm-7">(<?php echo $cartcount; ?> Items)</div>
</div>
<div class="list-group">
<?php
for($i=0;$i<count($cart_array);$i++)
{
    $option_id=$cart_array[$i]->options_id;
    $product_id=$cart_array[$i]->products_id;
    $product_name=getProductName($product_id);
    $quantity=$cart_array[$i]->customers_basket_quantity;
    $final_price=$cart_array[$i]->final_price;
    $weight=getOptionWeight($option_id);
    $unit=getOptionUnit($option_id);
?>
       <a class="list-group-item list-group-item-action" style="padding:5px;margin:5px;" aria-current="true">
       <button class="btn btn-danger btn-xs pull-right remove-item" onclick=removeFromCart(<?php echo $cart_array[$i]->customers_basket_id; ?>);>X</button>
        <div class="row">
        <div class="col-xs-6 col-sm-6"><?php echo $product_name; ?><br><?php echo $weight; ?> - <?php echo $unit; ?></div>
            <div class="col-xs-6 col-sm-6">
                <div class="input-group">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default" style="padding: 7px !important;" onclick="removeCartQuantity(<?php echo $product_id; ?>,<?php echo $option_id; ?>);">
                        -
                    </button>
                </span>
                <input type="text" class="form-control" readonly maxlength="2" size="2" style="margin-top: 1px !important;" name="qty<?php echo $product_id; ?>" id="cartqty<?php echo $product_id; ?>"
                                value="<?php echo $quantity; ?>">
                <span class="input-group-btn" style="left: -13px;">
                    <button type="button" class="btn btn-default" style="padding: 7px !important;"  onclick="addCartQuantity(<?php echo $product_id; ?>,<?php echo $option_id; ?>);">
                        +
                    </button>
                </span>
            </div>
            &#8377; <?php echo $final_price; ?>
      <!--
            <button type="button" style="float:left;" onclick="removeQuantity(<?php echo $product_id; ?>);" id="cartqtyminus<?php echo $product_id; ?>">-</button>&nbsp;
                  <input type="text" class="form-control" readonly maxlength="2" size="2" style="width:50px;float:left;margin-left:5px;margin-right:5px;height:26px !important;" name="qty<?php echo $product_id; ?>" id="cartqty<?php echo $product_id; ?>"
                        value="<?php echo $quantity; ?>">&nbsp;
                
                    
                    <button type="button" style="float:left;" onclick="addQuantity(<?php echo $product_id; ?>);" id="cartqtyplus<?php echo $product_id; ?>">+</button>
-->
            </div>
        </div>
    </a>
<?php
}
?>
</div>
<?php if($totalcost>0){?>
<div>
<a href="checkout.php" type="button" class="btn btn-success">Checkout   &#8377;<?php echo number_format((float)$totalcost,2); ?></a>
</div>
<?php } ?>