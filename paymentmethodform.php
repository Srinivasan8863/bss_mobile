<h3>Order Detail</h3>
<?php
$cart_array=cart();
?>
<table class="table top-table">
    <tbody>
    <?php
    for($i=0;$i<count($cart_array);$i++)
    {
        $option_id=$cart_array[$i]->options_id;
        $product_id=$cart_array[$i]->products_id;
        $product_name=getProductName($product_id);
        $image_name=getProductImage($product_id);
        $product_price=getProductPrice($option_id);
        $quantity=$cart_array[$i]->customers_basket_quantity;
        $final_price=$cart_array[$i]->final_price;
        $weight=getOptionWeight($option_id);
        $unit=getOptionUnit($option_id);
    ?>
    <tr>
        <td align="center">
            <img src="images/product_images/<?php echo $image_name; ?>" alt="<?php echo $product_name; ?>" class="img-thumbnail">
        </td>
        <td>
            <?php echo $product_name." - ".$weight." ".$unit; ?>
        </td>
        <td  align="center">
            ₹ <?php echo $product_price; ?>
        </td>
        <td  align="center">
            <input type="text" style="width:15%; text-align:center;" class="form-control" readonly value="<?php echo  $quantity; ?>">
        </td>
        <td  align="center">
            <?php echo $final_price; ?>
        </td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>
<hr>
<br><br>
