<?php
$products = products($category_id);
$category_name = getCategoryName($category_id);
?>

<div class="sc-10mkyz7-0 k0tmtc-3 hbMfZT" id="productlist">
    <input type="hidden" id="category_id" value="<?php echo $category_id; ?>">
    <div class="sc-10mkyz7-0 k0tmtc-4 iTjZEq">
        <div class="sc-10mkyz7-0 dWkYtl tab-content BEVERAGES" id="BEVERAGES">
            <p class="sc-1gu8y64-0 BbwkM s3m7ci-2 hMxDKt"><?php echo $category_name; ?></p>
            <div class="sc-10mkyz7-0 dWkYtl">
                <?php
                $currentIndex = 0;

                for ($i = 0; $i < count($products); $i++) {
                    $postID = $products[$i]->products_id;
                ?>



                    <a class="jxbqi7-0 eTesqN">
                        <div disabled="" class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1twyv6b-5 cPthBx wm485">
                            <div class="sc-10mkyz7-0 sc-1twyv6b-8 BYxJj"><img src="images/product_images/<?php echo $products[$i]->products_image; ?>" alt="<?php echo $products[$i]->products_name; ?>" title="<?php echo $products[$i]->products_name; ?>" width="72px" height="72px" class="sc-1go0t46-0 krootd" /></div>
                            <div class="sc-10mkyz7-0 dFGOFu">
                                <p class="sc-1gu8y64-0 hFuQhd sc-1twyv6b-0 kArLCp"><?php echo $products[$i]->products_name; ?></p>
                                <!-- <button disabled="" class="sc-59cghl-0 sc-67e167-1 fxXtYT">
                                    <span class="sc-67e167-0 dvfcir">2.25 Ltr</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#6F7588" viewBox="0 0 16 16" height="10px" width="10px" class="sc-64ptou-0 cHSwiM">
                                        <path d="M12.594 4L8 8.962 3.406 4 2 5.519 8 12l6-6.481L12.594 4z"></path>
                                    </svg>
                                </button> -->
                                <?php
                                $options = getProductOptions($products[$i]->products_id);

                                if (count($options) == 1) {
                                ?>
                                    <input type="hidden" name="option_id<?php echo $options[0]->option_id; ?>" id="option_id<?php echo $products[$i]->products_id; ?>" class="optionid" value="<?php echo $options[0]->option_id; ?>">
                                    <?php
                                } else {
                                    if (count($options) > 0) {
                                    ?>
                                        <select class="form-select" style="border:none" name="option_id<?php echo $options[0]->option_id; ?>" id="option_id<?php echo $products[$i]->products_id; ?>" class="optionid" onchange="showAddButton(<?php echo $products[$i]->products_id; ?>,this.value);">
                                            <?php
                                            for ($j = 0; $j < count($options); $j++) {
                                                $cart_array = getCartOptions($options[$j]->option_id);
                                            ?>
                                                <option value="<?php echo $options[$j]->option_id; ?>" <?php if (in_array($options[$j]->option_id, $cart_array)) { ?>selected="selected" <?php } ?>>
                                                    <?php echo $options[$j]->weight; ?><?php echo $options[$j]->unit; ?> - &#8377;<?php echo $options[$j]->price; ?>
                                                    <?php if ($options[$j]->discount_price > 0) { ?>
                                                        <del><?php echo $options[$j]->discount_price; ?></del>
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
                                <p class="sc-1gu8y64-0 BbwkM sc-1twyv6b-2 ootqU pt-25"><?php echo $options[0]->weight . " " . $options[0]->unit . "- &#8377;" . $options[0]->price ?></p>
                            </div>
                            <div class="sc-10mkyz7-0 gnsVKE">
                                <?php
                                $incart = 0;
                                $cartquantity = 0;
                                $getcart = getcart($products[$i]->products_id);
                                if ($cartquantity == "") $cartquantity = 1;
                                $incart = count($getcart);
                                if ($incart > 0) {
                                    $cartquantity = $getcart[0]->customers_basket_quantity;
                                }
                                ?>
                                <div class="sc-10mkyz7-0 dWkYtl" id="spanqty<?php echo $products[$i]->products_id; ?>" <?php if ($incart == 0) { ?> style="display:none;" <?php } ?>>
                                    <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1lv858r-6 ipGA-dv">
                                        <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1lv858r-0 kHHWiy">
                                            <button class="sc-59cghl-0 sc-1lv858r-4 hTFfdu" onclick="removeQuantity(<?php echo $products[$i]->products_id; ?>);" id="qtyminus<?php echo $products[$i]->products_id; ?>" style="border-radius:50%;">-</button>
                                            <p class="sc-1gu8y64-0 BbwkM sc-1lv858r-5 fJFoxJ" id="qtyp<?php echo $products[$i]->products_id; ?>"><?php echo $cartquantity; ?></p>
                                            <button class="sc-59cghl-0 sc-1lv858r-3 cvTPQn" onclick="addQuantity(<?php echo $products[$i]->products_id; ?>);" id="qtyplus<?php echo $products[$i]->products_id; ?>">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div <?php if ($incart > 0) { ?> style="display:none;" <?php } ?> id="button<?php echo $products[$i]->products_id; ?>">
                                    <div class="sc-10mkyz7-0 dWkYtl">
                                        <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1lv858r-6 daxmtW">
                                            <button shape="circular" size="48" class="sc-1115q80-0 sc-1lv858r-1 eVvFGm" style="cursor:pointer;" type="button" onclick="addtocart(<?php echo $products[$i]->products_id; ?>);">
                                                <div class="sc-10mkyz7-0 sc-1lv858r-2 jEeuYs">+</div>
                                                ADD
                                            </button>
                                        </div>
                                    </div>
                                    <p class="sc-1gu8y64-0 BbwkM sc-1twyv6b-4 ceZFlC">Customizable</p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</div>