<?php
@include("includes/config.php");
$category_id=$_REQUEST["category_id"];
if($category_id=="") $category_id=0;
$dbh = connectdb();
if($category_id==0) 
{
    $sql="SELECT * FROM category WHERE category_status='1' AND parent_id='0' ORDER BY priority DESC LIMIT 1";
    $result = $dbh->prepare($sql);
    $result->execute();
    $category_array=$result->fetchAll(PDO::FETCH_OBJ);
    $category_id=$category_array[0]->category_id;
}
//echo $_REQUEST["id"];
if(!empty($_REQUEST["id"]))
{
    //Get last ID
    $lastID = $_REQUEST['id'];

    //Limit on data display
    $showLimit = 10;
    
    if($category_id!="" && $category_id>0 &&$category_id!="undefined")
         $condition=" AND (category_id='".$category_id."' OR subcategory_id='".$category_id."')";
   /* if(!empty($lastID))
    {
        $condition.=" AND products_id < ".$lastID;
    }*/

    //Get all rows except already displayed
    $sql="SELECT * FROM products WHERE products_id < ".$lastID. $condition. " AND products_status='1' ORDER BY products_id DESC";
    $result = $dbh->prepare($sql);
    $result->execute();
    //$totalproducts = $result->fetchAll(PDO::FETCH_OBJ);
    $allNumRows=$result->rowCount();
    
    $sql="SELECT * FROM products WHERE products_id < ".$lastID. $condition. " AND products_status='1' ORDER BY products_id DESC LIMIT ".$showLimit;
    $result = $dbh->prepare($sql);
    $result->execute();
    $products=$result->fetchAll(PDO::FETCH_OBJ);
    ?>
    <input type="hidden" id="category_id" value="<?php echo $category_id; ?>">

<div class="list-group">
<?php
for($i=0;$i<count($products);$i++)
{
?>

    <a class="list-group-item list-group-item-action" style="padding:5px;margin:5px;" aria-current="true">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <img src="images/product_images/<?php echo $products[$i]->products_image; ?>" alt="<?php echo $products[$i]->products_name; ?>" class="img-thumbnail">
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7">
                <div style="float:left;"><b><?php echo $products[$i]->products_name; ?></b></div><br>
                <?php
                $options=getProductOptions($products[$i]->products_id);
                if(count($options)==1)
                {
                ?>
                <input type="hidden" name="option_id<?php echo $options[0]->option_id;?>" id="option_id<?php echo $products[$i]->products_id;?>" class="optionid" 
                value="<?php echo $options[0]->option_id;?>--<?php echo $options[0]->weight;?>--<?php echo $options[0]->unit;?>--<?php echo $options[0]->price;?>--<?php echo $options[0]->discount_price;?>--<?php echo $options[0]->stock;?>" >
                <?php
                }
                else
                {
                    if(count($options)>0)
                    {
                ?>
                <br>
                <select name="option_id<?php echo $options[0]->option_id;?>" id="option_id<?php echo $products[$i]->products_id;?>" class="optionid" 
                    onchange="showAddButton(<?php echo $products[$i]->products_id;?>,this.value);">
                <?php
                        for($j=0;$j<count($options);$j++)
                        {
                            $cart_array=getCartOptions($options[$j]->option_id);
                ?>
                            <option value="<?php echo $options[$j]->option_id;?>" <?php if (in_array($options[$j]->option_id, $cart_array)){ ?>selected="selected"<?php } ?>>
                            <?php echo $options[$j]->weight;?><?php echo $options[$j]->unit;?> - &#8377;<?php echo $options[$j]->price;?>
                            <?php if($options[$j]->discount_price>0){?>
                                <del><?php echo $options[$j]->discount_price;?></del>
                            <?php } ?>
                            </option>
                    <?php
                        }
                    ?>
                        
                        </select><br>
                <?php
                        
                    }
                }
                ?>
                  <br>
                <?php echo $options[0]->weight;?><?php echo $options[0]->unit;?> - &#8377;<?php echo $options[0]->price;?>
                <?php if($options[0]->discount_price>0){?>
                    <del><?php echo $options[0]->discount_price;?></del>
                <?php } ?>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <?php
                $incart=0;
                $cartquantity=0;
                $getcart=getcart($products[$i]->products_id);
                if($cartquantity=="") $cartquantity=1;
                $incart=count($getcart);
                if($incart>0)
                {
                    $cartquantity=$getcart[0]->customers_basket_quantity;
                }
                ?>
                <div id="spanqty<?php echo $products[$i]->products_id; ?>" <?php if($incart==0){ ?> style="display:none;" <?php } ?>>
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" onclick="removeQuantity(<?php echo $products[$i]->products_id; ?>);" class="btn btn-primary" id="qtyminus<?php echo $products[$i]->products_id; ?>">-</button>
                        </div>
                        <input type="text" readonly class="form-control" maxlength="4" size="4" name="qty<?php echo $products[$i]->products_id; ?>" 
                        id="qty<?php echo $products[$i]->products_id; ?>" value="<?php echo $cartquantity; ?>" style="margin-top: 20px;">
                        <div class="input-group-btn">
                            <button type="button" onclick="addQuantity(<?php echo $products[$i]->products_id; ?>);" class="btn btn-primary" id="qtyplus<?php echo $products[$i]->products_id; ?>">+</button>
                        </div>
                    </div>
                </div>
                <button <?php if($incart>0){ ?> style="display:none;" <?php } ?> id="button<?php echo $products[$i]->products_id; ?>" type="button" onclick="addtocart(<?php echo $products[$i]->products_id; ?>);" class="btn btn-primary"><span>+</span>&nbsp;ADD</button>
            </div>
        </div>
        
    </a>
    
<?php
}
?>
<?php if($allNumRows > $showLimit){ ?>
    <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
        <img src="loading.gif"/>
    </div>
<?php }else{ ?>
    <div class="load-more" lastID="0">
        That's All!
    </div>
<?php }
}else{ ?>
    <div class="load-more" lastID="0">
        That's All!
    </div>
<?php
 }
?>
</div>