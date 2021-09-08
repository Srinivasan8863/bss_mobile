<!DOCTYPE html>
<?php
@include("includes/config.php");
$order_id=$_REQUEST["order_id"];
$order_array=getOrder($order_id);
$order_products=getOrderedProducts($order_id);
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
    <div class="jumbotron text-center">
        <h1>BSS</h1>
        <p>Bala Super Shoppe</p> 
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php @include("sidebar.php"); ?>
            </div>
            <div class="col-sm-9">
   

        <div class="row">
          <div class="col-sm-5">
              <div class="heading">
                <h2>                  
                    Order ID #&nbsp;<?php echo $order_id; ?>
                </h2>
              </div>
              <table class="table">
                  <tbody>
                      <tr>
                        <td class="col-sm-6">Order Status</td>
                        <td class="col-sm-6"><span class="badge badge-primary"><?php echo $order_array[0]->status; ?></span></td>
                                              </tr>
                      <tr>
                        <td class="col-sm-6">Order Date</td>
                        <td class="col-sm-6" align="left"><?php echo $order_array[0]->created_at; ?></td>
                        </tr>
                    </tbody>
              </table>
          </div>
          <div class="col-sm-7">
              <div class="heading">
                  <h2>
                
                      Shipping Details
                 
                  </h2>
                </div>

              <table class="table">
                  <tbody>
                      <tr>
                        <td class="col-sm-6"><?php echo $order_array[0]->delivery_name; ?></td>


                      </tr>
                      <tr>
                          <td class="col-sm-12">
                          <?php echo $order_array[0]->delivery_street_address; ?>
                          <?php echo $order_array[0]->delivery_city; ?>
                          <?php echo $order_array[0]->delivery_state; ?>
                          <?php echo $order_array[0]->delivery_postcode; ?>
                          </td>

                        </tr>
                    </tbody>
              </table>

          </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <div class="heading">
                    <h2>                     
                         Payment Method                      
                    </h2>
                  </div>

                <table class="table">
                    <tbody>
                        <!--
                        <tr>
                          <td class="col-sm-6">Shipping Method</td>
                          <td class="col-sm-6"></td>
                        </tr>
                        -->
                        <tr>
                            <td class="col-sm-6">Payment Method</td>
                            <td class="col-sm-6"><?php if($order_array[0]->payment_method=="cod"){ ?>Cash on Delivery<?php }else { echo $order_array[0]->payment_method; } ?></td>
                          </tr>
                      </tbody>
                </table>

            </div>
        </div>
        <table class="table items">
        <tbody>
        <?php for($i=0;$i<count($order_products);$i++){?>
            <tr>
                <td class="col-sm-2">
                    <?php $productimage=getProductImage($order_products[$i]->product_id);?>
                    <img src="images/product_images/<?php echo $productimage; ?>" alt="<?php echo $order_products[$i]->products_name; ?>" class="img-thumbnail">
                </td>
                <td class="col-sm-3">
                <?php echo $order_products[$i]->products_name; ?>
                </td>
                <td class="col-sm-3">₹ <?php echo $order_products[$i]->products_price; ?></td>
                <td class="col-sm-2"><?php echo $order_products[$i]->products_quantity; ?></td>
                <td class="col-sm-3">₹ <?php echo $order_products[$i]->final_price; ?></td>
            </tr>
        <?php } ?>
                                                                    
              
                    

          </tbody>
        </table>
    </div>
 </div>
 <br>
 <br>
</body>
</html>