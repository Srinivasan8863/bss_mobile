<?php
$cart_array = cart();
$cartcount = 0;
$quantity = 0;
$totalcost = 0;
for ($i = 0; $i < count($cart_array); $i++) {
    $cartcount += $cart_array[$i]->customers_basket_quantity;
    $totalcost += $cart_array[$i]->final_price;
}
//$cartcount=count($cart_array);
?>

<div class="sc-10mkyz7-0 k0tmtc-5 gaSwzL" id="cartlist">
    <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1pm8vvt-0 eKBhGe">
        <div class="sc-10mkyz7-0 sc-1pm8vvt-4 kbozFV">
            <div class="sc-10mkyz7-0 sc-1py8954-5 boakgX">
                <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1py8954-2 gbQtPk"><span class="sc-1gu8y64-0 BbwkM sc-1py8954-0 jNzVsZ">Your Cart </span><span class="sc-1gu8y64-0 BbwkM sc-1py8954-1 jXBoSm">(<?php echo $cartcount; ?> Items)</span></div>
            </div>
        </div>
        <div class="sc-10mkyz7-0 sc-16a6ozh-0 kHwhCa sc-1pm8vvt-3 ewaYyg">
            <div class="sc-10mkyz7-0 dWkYtl">
                <div class="sc-10mkyz7-0 sc-1woi3cc-0 cmm1ad-0 bczJcg">
                    <div class="sc-10mkyz7-0 sc-1woi3cc-0 cmm1ad-1 hcBgMh">
                        <!-- loop -->
                        <?php
                        if (count($cart_array) == 0) {
                        ?>
                            <img src="images/no-items-in-cart.png" alt="" title="" width="205px" height="100%" class="sc-1go0t46-0 jKRUzu" />
                            <p class="sc-1gu8y64-0 BbwkM kb1q03-1 cPMUpk">Your cart is empty</p>
                            <p class="sc-1gu8y64-0 BbwkM kb1q03-1 cPMUpk">Add items to get started</p>

                        <?php
                        } else {
                        ?>
                            <?php
                            for ($i = 0; $i < count($cart_array); $i++) {
                                $option_id = $cart_array[$i]->options_id;
                                $product_id = $cart_array[$i]->products_id;
                                $product_name = getProductName($product_id);
                                $quantity = $cart_array[$i]->customers_basket_quantity;
                                $final_price = $cart_array[$i]->final_price;
                                $weight = getOptionWeight($option_id);
                                $unit = getOptionUnit($option_id); ?>

                                <div class="sc-10mkyz7-0 sc-1nivjq8-0 cXkNBx">
                                    <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1nivjq8-1 cVDEfY">
                                        <div class="sc-10mkyz7-0 sc-1nivjq8-7 hDia-DB"></div>
                                        <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1nivjq8-2 gXSNWL">
                                            <p class="sc-1gu8y64-0 BbwkM sc-1nivjq8-3 GyoxA"><?php echo $product_name; ?></p><button class="sc-59cghl-0 sc-1nivjq8-8 gBkFCe">
                                                <p type="subtitle" class="sc-1gu8y64-0 BbwkM sc-1nivjq8-5 eKVDFK"><?php echo $weight; ?> <?php echo $unit; ?></p>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" class="sc-64ptou-0 bXZuJi sc-1nivjq8-10 gzlFHZ mtm9p">
                                                    <path d="M12.594 4L8 8.962 3.406 4 2 5.519 8 12l6-6.481L12.594 4z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="sc-10mkyz7-0 dWkYtl">
                                            <div width="60px" class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1lv858r-6 gAHkjh sc-1nivjq8-9 jtLufl">
                                                <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1lv858r-0 kHHWiy">
                                                    <button class="sc-59cghl-0 sc-1lv858r-4 hTFfdu" onclick="removeCartQuantity(<?php echo $product_id; ?>,<?php echo $option_id; ?>);">-</button>
                                                    <p class="sc-1gu8y64-0 BbwkM sc-1lv858r-5 fJFoxJ mt17pg"><?php echo $quantity; ?></p>
                                                    <button class="sc-59cghl-0 sc-1lv858r-3 cvTPQn" onclick="addCartQuantity(<?php echo $product_id; ?>,<?php echo $option_id; ?>);">+</button>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="sc-1gu8y64-0 BbwkM sc-1nivjq8-4 eVFNQj"><?php echo  "&#8377; " . ($final_price + 0); ?></p>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- loop end -->
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (count($cart_array) != 0) {
        ?>
            <div class="sc-10mkyz7-0 sc-1pm8vvt-2 hqvSQU">
                <div class="sc-10mkyz7-0 lmDoJv">
                    <a href="checkout.php" class="text-dec-none">
                        <button shape="circular" size="48" class="sc-1115q80-0 sc-1pm8vvt-5 ePAzTQ">Checkout<p class="sc-1gu8y64-0 BbwkM sc-1pm8vvt-1 cdJVCw mt10px">&#8377;<?php echo number_format((float)$totalcost, 2); ?></p></button>
                    </a>
                </div>
            </div>
        <?php
        } ?>
    </div>
</div>
<div class="viewCartMobile">
<?php
    if (count($cart_array) != 0) {
?>
<div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1y5v0rv-0 gidTrr sc-6wxr4l-0 hzTxix" >
    <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-6wxr4l-1 fjNlAo"><svg viewBox="0 0 26 22" xmlns="http://www.w3.org/2000/svg" width="16px" height="14px" class="sc-64ptou-0 eyXbUZ">
            <path d="M9.325 5.497h14.463l-2.762 9.332c-.096.326-.481.607-.822.607h-9.842c-.346 0-.76-.286-.87-.602l-3.676-10.6C5.401 3.039 4.092 1.788 2.837 1.39l-1.152-.365a.527.527 0 00-.659.32.497.497 0 00.332.632l1.152.364c.942.299 2.005 1.314 2.316 2.21l3.677 10.6c.251.725 1.064 1.287 1.86 1.287h9.841c.809 0 1.603-.58 1.826-1.335l2.95-9.97c.095-.32-.155-.638-.502-.638H9.325a.512.512 0 00-.521.501c0 .277.233.5.521.5zm.519 15.914c-1.146 0-2.076-.892-2.076-1.993 0-1.1.93-1.992 2.076-1.992s2.075.892 2.075 1.992-.93 1.993-2.075 1.993zm11.397 0c-1.146 0-2.076-.892-2.076-1.993 0-1.1.93-1.992 2.076-1.992s2.076.892 2.076 1.992-.93 1.993-2.076 1.993zm0-1.002c.57 0 1.032-.444 1.032-.99 0-.547-.463-.992-1.032-.992-.57 0-1.033.445-1.033.991 0 .547.463.992 1.033.992zm-10.365-.99c0 .546-.463.99-1.032.99-.57 0-1.033-.444-1.033-.99 0-.547.463-.992 1.033-.992.57 0 1.032.445 1.032.991z" fill="#6F7588"></path>
            <path d="M23.788 5.497l.24.07.095-.32h-.335v.25zm-2.762 9.332l-.24-.07.24.07zm-11.533.005l.236-.082-.236.082zm-3.677-10.6l-.236.083.236-.082zM2.837 1.39l-.075.238.075-.238zm-1.152-.365l-.075.239.075-.239zm-.327.952l-.075.238.075-.238zm1.152.364l-.075.239.075-.239zm2.316 2.21l.236-.082-.236.082zm3.677 10.6l-.237.081.237-.082zm13.527-.048l-.24-.07.24.07zm2.95-9.97l-.24-.071.24.07zm-1.192.114H9.325v.5h14.463v-.5zM21.266 14.9l2.762-9.332-.48-.142-2.761 9.332.479.142zm-1.062.786c.236 0 .468-.095.651-.23s.344-.328.41-.556l-.479-.142a.608.608 0 01-.227.296.63.63 0 01-.355.132v.5zm-9.842 0h9.842v-.5h-9.842v.5zm-1.106-.77c.078.222.25.412.44.543.19.132.43.227.666.227v-.5a.712.712 0 01-.38-.138.661.661 0 01-.253-.296l-.473.164zM5.58 4.316l3.676 10.6.473-.164-3.677-10.6-.472.165zM2.762 1.629c.583.185 1.191.573 1.707 1.065.515.493.92 1.072 1.111 1.624l.472-.164c-.224-.646-.682-1.29-1.238-1.821-.557-.532-1.23-.968-1.901-1.18l-.151.476zM1.61 1.264l1.152.364.15-.476L1.762.787l-.151.477zm-.347.161a.277.277 0 01.347-.161l.15-.477a.777.777 0 00-.97.476l.473.162zm.17.313c-.147-.046-.212-.19-.17-.313L.79 1.263a.747.747 0 00.493.952l.15-.477zm1.153.365l-1.152-.365-.151.477 1.152.365.15-.477zM5.062 4.47c-.172-.497-.544-1.007-.985-1.428-.44-.42-.974-.774-1.491-.938l-.151.477c.424.134.894.438 1.297.823.404.386.72.831.858 1.23l.472-.164zm3.677 10.6l-3.677-10.6-.472.164 3.676 10.6.473-.165zm1.623 1.119c-.694 0-1.408-.5-1.623-1.12l-.473.164c.289.831 1.2 1.456 2.096 1.456v-.5zm9.842 0h-9.842v.5h9.842v-.5zm1.586-1.156c-.19.645-.884 1.156-1.586 1.156v.5c.915 0 1.81-.65 2.066-1.514l-.48-.142zm2.95-9.97l-2.95 9.97.48.142 2.95-9.97-.48-.142zm-.262-.317c.194 0 .306.17.262.317l.48.142c.146-.494-.242-.959-.742-.959v.5zm-15.153 0h15.153v-.5H9.325v.5zm-.271.251c0-.13.112-.25.271-.25v-.5a.762.762 0 00-.771.75h.5zm.271.25c-.16 0-.271-.121-.271-.25h-.5c0 .424.355.75.771.75v-.5zM7.518 19.419c0 1.248 1.051 2.243 2.326 2.243v-.5c-1.018 0-1.826-.79-1.826-1.743h-.5zm2.326-2.242c-1.275 0-2.326.995-2.326 2.242h.5c0-.952.808-1.742 1.826-1.742v-.5zm2.325 2.242c0-1.247-1.051-2.242-2.325-2.242v.5c1.017 0 1.825.79 1.825 1.742h.5zm-2.325 2.243c1.274 0 2.325-.995 2.325-2.243h-.5c0 .953-.808 1.743-1.825 1.743v.5zm9.07-2.243c0 1.248 1.052 2.243 2.327 2.243v-.5c-1.018 0-1.826-.79-1.826-1.743h-.5zm2.327-2.242c-1.275 0-2.326.995-2.326 2.242h.5c0-.952.808-1.742 1.826-1.742v-.5zm2.326 2.242c0-1.247-1.052-2.242-2.326-2.242v.5c1.017 0 1.826.79 1.826 1.742h.5zm-2.326 2.243c1.274 0 2.326-.995 2.326-2.243h-.5c0 .953-.809 1.743-1.826 1.743v.5zm.782-2.243c0 .4-.341.742-.782.742v.5c.698 0 1.282-.547 1.282-1.242h-.5zm-.782-.74c.441 0 .782.341.782.74h.5c0-.694-.584-1.24-1.282-1.24v.5zm-.783.74c0-.399.341-.74.783-.74v-.5c-.698 0-1.283.546-1.283 1.24h.5zm.783.742c-.442 0-.783-.342-.783-.742h-.5c0 .695.585 1.242 1.283 1.242v-.5zm-11.397.5c.698 0 1.282-.547 1.282-1.242h-.5c0 .4-.341.742-.782.742v.5zM8.56 19.418c0 .695.584 1.242 1.283 1.242v-.5c-.442 0-.783-.342-.783-.742h-.5zm1.283-1.24c-.699 0-1.283.546-1.283 1.24h.5c0-.399.341-.74.783-.74v-.5zm1.282 1.24c0-.694-.584-1.24-1.282-1.24v.5c.44 0 .782.341.782.74h.5z" fill="#6F7588"></path>
        </svg>
        <div class="sc-10mkyz7-0 dWkYtl">
            <div class="sc-10mkyz7-0 sc-1woi3cc-0 ldVXoJ"><span class="sc-1gu8y64-0 BbwkM sc-6wxr4l-2 kDayfp"><?php echo $cartcount; ?> Items</span>
                <p class="sc-1gu8y64-0 BbwkM sc-6wxr4l-5 kxCnUF">•</p>
                <p class="sc-1gu8y64-0 BbwkM sc-6wxr4l-3 iShSBF">&#8377;<?php echo number_format((float)$totalcost, 2); ?></p>
            </div>
        </div>
    </div><button shape="circular" class="sc-1hdkpm0-0 sc-6wxr4l-6 cIeCkw" id="viewCartMobileBtn">View Cart</button>
</div>
<?php
    } 
?>
</div>