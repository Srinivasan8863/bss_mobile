<?php
$cart_array = cart();
//print_r($cart_array);
$cartcount = 0;
$quantity = 0;
$totalcost = 0;
for ($i = 0; $i < count($cart_array); $i++) {
    $cartcount += $cart_array[$i]->customers_basket_quantity;
    $totalcost += $cart_array[$i]->final_price;
}
//$cartcount=count($cart_array);
?>
<div class="sc-10mkyz7-0 mwrf36-0 dOqMhw">
    <div id="header" class="sc-10mkyz7-0 sc-1woi3cc-0 jqmf1i-4 CGDMv">
        <div class="sc-10mkyz7-0 sc-1woi3cc-0 jqmf1i-6 jqmf1i-7 koBeDj">
            <div class="sc-10mkyz7-0 sblcwm-0 jxNrUI">
                <div class="sc-10mkyz7-0 sc-1woi3cc-0 cMelyt">
                    <a href="">
                        <div class="sc-10mkyz7-0 sc-1woi3cc-0 jqmf1i-5 bWWezq"> <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#162354" height="16px" width="16px" class="sc-64ptou-0 gvYvIw jqmf1i-19 fhVyne">
                                <path d="M16.15 6.125H2.902l4.5-4.631a.894.894 0 000-1.238.833.833 0 00-1.203 0L.249 6.381a.893.893 0 000 1.238l5.95 6.125a.835.835 0 001.202 0 .893.893 0 000-1.238l-4.5-4.63H16.15c.47 0 .85-.393.85-.876a.863.863 0 00-.85-.875z" fill-rule="nonzero"></path>
                            </svg>
                            <div class="sc-10mkyz7-0 dFGOFu">
                                <p class="sc-1gu8y64-0 BbwkM jqmf1i-1 ewAccF">Confirm order</p>
                            </div>
                        </div>
                    </a>
                    <div class="sc-10mkyz7-0 sc-1woi3cc-0 KhJWx"></div>
                    <div class="sc-10mkyz7-0 sc-1woi3cc-0 ldVXoJ">
                        <div class="sc-10mkyz7-0 GmqgG">
                            <p class="sc-1gu8y64-0 BbwkM sc-1c1rgbd-0 bxshYB"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sc-10mkyz7-0 n1p5ey-0 dFRkXz">
        <div height="16px" class="sc-10mkyz7-0 qkcqpu-1 bXFhdk"></div>
        <div class="sc-10mkyz7-0 sc-7sodx2-0 iTusQj">
            <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-7sodx2-1 jQWuxK">
                <p class="sc-1gu8y64-0 BbwkM sc-7sodx2-2 bCIxPu">BSS</p><a href="" class="jxbqi7-0 sc-7sodx2-3 kwDIWM">+ ADD MORE</a>
            </div>
            <div class="sc-1wjh0ls-0 sc-7sodx2-6 gKqEzz"></div>
            <!-- loop -->
            <?php
            for ($i = 0; $i < count($cart_array); $i++) {
                $option_id = $cart_array[$i]->options_id;
                $product_id = $cart_array[$i]->products_id;
                $product_name = getProductName($product_id);
                $quantity = $cart_array[$i]->customers_basket_quantity;
                $final_price = $cart_array[$i]->final_price;
                $weight = getOptionWeight($option_id);
                $unit = getOptionUnit($option_id); 
            ?>

            <div class="sc-10mkyz7-0 sc-7sodx2-4 cszZJP">
                <div class="sc-10mkyz7-0 sc-1woi3cc-0 cmm1ad-0 bczJcg">
                    <div class="sc-10mkyz7-0 sc-1woi3cc-0 cmm1ad-1 hcBgMh">
                        <div class="sc-10mkyz7-0 sc-1nivjq8-0 gFKDCK">
                            <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1nivjq8-1 cVDEfY">
                                <div class="sc-10mkyz7-0 sc-1nivjq8-7 hDia-DB"></div>
                                <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1nivjq8-2 gXSNWL">
                                    <p class="sc-1gu8y64-0 BbwkM sc-1nivjq8-3 GyoxA"><?php echo $product_name; ?></p><button class="sc-59cghl-0 sc-1nivjq8-8 gBkFCe">
                                        <p type="subtitle" class="sc-1gu8y64-0 BbwkM sc-1nivjq8-5 eKVDFK"><?php echo $weight; ?> <?php echo $unit; ?></p><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" class="sc-64ptou-0 bXZuJi sc-1nivjq8-10 gzlFHZ">
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
                    </div>
                </div>
            </div>
            <?php
                            } ?>
            <!-- loop -->
        </div>
        <div height="16px" class="sc-10mkyz7-0 qkcqpu-1 bXFhdk"></div>
        <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1ctpznt-0 ktRuPU"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 16" fill="none" class="sc-64ptou-0 LjWMs sc-1hg0930-0 finouJ">
                <g>
                    <path d="M14.6888 7.18224V13.8C14.6888 14.0188 14.6457 14.2356 14.5619 14.4378C14.4782 14.64 14.3554 14.8237 14.2006 14.9785C14.0459 15.1332 13.8622 15.256 13.6599 15.3398C13.4577 15.4235 13.241 15.4666 13.0221 15.4666H3.02214C2.58011 15.4666 2.15618 15.291 1.84362 14.9785C1.53106 14.6659 1.35547 14.242 1.35547 13.8V3.79997C1.35547 3.35794 1.53106 2.93402 1.84362 2.62146C2.15618 2.3089 2.58011 2.1333 3.02214 2.1333H9.08047" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M13.9185 0.967689C14.1519 0.7342 14.4686 0.603027 14.7988 0.603027C15.129 0.603027 15.4457 0.7342 15.6792 0.967689C15.9127 1.20118 16.0439 1.51786 16.0439 1.84806C16.0439 2.17826 15.9127 2.49494 15.6792 2.72843L10.1035 8.30411L7.75586 8.89103L8.34277 6.54337L13.9185 0.967689Z" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
        </div>
        <div height="16px" class="sc-10mkyz7-0 qkcqpu-1 bXFhdk"></div>
        <div height="32px" class="sc-10mkyz7-0 qkcqpu-1 SoumM"></div>
        <div class="sc-10mkyz7-0 sc-35zitq-0 deVRNi">
            <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-1y5v0rv-0 gidTrr sc-35zitq-1 dieeHa">
                <div class="sc-10mkyz7-0 sc-35zitq-2 hVxfDY">
                    <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-35zitq-3 hotdwF">
                        <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-35zitq-6 gcLOZg"><svg viewBox="0 0 26 22" xmlns="http://www.w3.org/2000/svg" class="sc-64ptou-0 faawBe sc-35zitq-7 cFCWec">
                                <path d="M9.325 5.497h14.463l-2.762 9.332c-.096.326-.481.607-.822.607h-9.842c-.346 0-.76-.286-.87-.602l-3.676-10.6C5.401 3.039 4.092 1.788 2.837 1.39l-1.152-.365a.527.527 0 00-.659.32.497.497 0 00.332.632l1.152.364c.942.299 2.005 1.314 2.316 2.21l3.677 10.6c.251.725 1.064 1.287 1.86 1.287h9.841c.809 0 1.603-.58 1.826-1.335l2.95-9.97c.095-.32-.155-.638-.502-.638H9.325a.512.512 0 00-.521.501c0 .277.233.5.521.5zm.519 15.914c-1.146 0-2.076-.892-2.076-1.993 0-1.1.93-1.992 2.076-1.992s2.075.892 2.075 1.992-.93 1.993-2.075 1.993zm11.397 0c-1.146 0-2.076-.892-2.076-1.993 0-1.1.93-1.992 2.076-1.992s2.076.892 2.076 1.992-.93 1.993-2.076 1.993zm0-1.002c.57 0 1.032-.444 1.032-.99 0-.547-.463-.992-1.032-.992-.57 0-1.033.445-1.033.991 0 .547.463.992 1.033.992zm-10.365-.99c0 .546-.463.99-1.032.99-.57 0-1.033-.444-1.033-.99 0-.547.463-.992 1.033-.992.57 0 1.032.445 1.032.991z" fill="#6F7588"></path>
                                <path d="M23.788 5.497l.24.07.095-.32h-.335v.25zm-2.762 9.332l-.24-.07.24.07zm-11.533.005l.236-.082-.236.082zm-3.677-10.6l-.236.083.236-.082zM2.837 1.39l-.075.238.075-.238zm-1.152-.365l-.075.239.075-.239zm-.327.952l-.075.238.075-.238zm1.152.364l-.075.239.075-.239zm2.316 2.21l.236-.082-.236.082zm3.677 10.6l-.237.081.237-.082zm13.527-.048l-.24-.07.24.07zm2.95-9.97l-.24-.071.24.07zm-1.192.114H9.325v.5h14.463v-.5zM21.266 14.9l2.762-9.332-.48-.142-2.761 9.332.479.142zm-1.062.786c.236 0 .468-.095.651-.23s.344-.328.41-.556l-.479-.142a.608.608 0 01-.227.296.63.63 0 01-.355.132v.5zm-9.842 0h9.842v-.5h-9.842v.5zm-1.106-.77c.078.222.25.412.44.543.19.132.43.227.666.227v-.5a.712.712 0 01-.38-.138.661.661 0 01-.253-.296l-.473.164zM5.58 4.316l3.676 10.6.473-.164-3.677-10.6-.472.165zM2.762 1.629c.583.185 1.191.573 1.707 1.065.515.493.92 1.072 1.111 1.624l.472-.164c-.224-.646-.682-1.29-1.238-1.821-.557-.532-1.23-.968-1.901-1.18l-.151.476zM1.61 1.264l1.152.364.15-.476L1.762.787l-.151.477zm-.347.161a.277.277 0 01.347-.161l.15-.477a.777.777 0 00-.97.476l.473.162zm.17.313c-.147-.046-.212-.19-.17-.313L.79 1.263a.747.747 0 00.493.952l.15-.477zm1.153.365l-1.152-.365-.151.477 1.152.365.15-.477zM5.062 4.47c-.172-.497-.544-1.007-.985-1.428-.44-.42-.974-.774-1.491-.938l-.151.477c.424.134.894.438 1.297.823.404.386.72.831.858 1.23l.472-.164zm3.677 10.6l-3.677-10.6-.472.164 3.676 10.6.473-.165zm1.623 1.119c-.694 0-1.408-.5-1.623-1.12l-.473.164c.289.831 1.2 1.456 2.096 1.456v-.5zm9.842 0h-9.842v.5h9.842v-.5zm1.586-1.156c-.19.645-.884 1.156-1.586 1.156v.5c.915 0 1.81-.65 2.066-1.514l-.48-.142zm2.95-9.97l-2.95 9.97.48.142 2.95-9.97-.48-.142zm-.262-.317c.194 0 .306.17.262.317l.48.142c.146-.494-.242-.959-.742-.959v.5zm-15.153 0h15.153v-.5H9.325v.5zm-.271.251c0-.13.112-.25.271-.25v-.5a.762.762 0 00-.771.75h.5zm.271.25c-.16 0-.271-.121-.271-.25h-.5c0 .424.355.75.771.75v-.5zM7.518 19.419c0 1.248 1.051 2.243 2.326 2.243v-.5c-1.018 0-1.826-.79-1.826-1.743h-.5zm2.326-2.242c-1.275 0-2.326.995-2.326 2.242h.5c0-.952.808-1.742 1.826-1.742v-.5zm2.325 2.242c0-1.247-1.051-2.242-2.325-2.242v.5c1.017 0 1.825.79 1.825 1.742h.5zm-2.325 2.243c1.274 0 2.325-.995 2.325-2.243h-.5c0 .953-.808 1.743-1.825 1.743v.5zm9.07-2.243c0 1.248 1.052 2.243 2.327 2.243v-.5c-1.018 0-1.826-.79-1.826-1.743h-.5zm2.327-2.242c-1.275 0-2.326.995-2.326 2.242h.5c0-.952.808-1.742 1.826-1.742v-.5zm2.326 2.242c0-1.247-1.052-2.242-2.326-2.242v.5c1.017 0 1.826.79 1.826 1.742h.5zm-2.326 2.243c1.274 0 2.326-.995 2.326-2.243h-.5c0 .953-.809 1.743-1.826 1.743v.5zm.782-2.243c0 .4-.341.742-.782.742v.5c.698 0 1.282-.547 1.282-1.242h-.5zm-.782-.74c.441 0 .782.341.782.74h.5c0-.694-.584-1.24-1.282-1.24v.5zm-.783.74c0-.399.341-.74.783-.74v-.5c-.698 0-1.283.546-1.283 1.24h.5zm.783.742c-.442 0-.783-.342-.783-.742h-.5c0 .695.585 1.242 1.283 1.242v-.5zm-11.397.5c.698 0 1.282-.547 1.282-1.242h-.5c0 .4-.341.742-.782.742v.5zM8.56 19.418c0 .695.584 1.242 1.283 1.242v-.5c-.442 0-.783-.342-.783-.742h-.5zm1.283-1.24c-.699 0-1.283.546-1.283 1.24h.5c0-.399.341-.74.783-.74v-.5zm1.282 1.24c0-.694-.584-1.24-1.282-1.24v.5c.44 0 .782.341.782.74h.5z" fill="#6F7588"></path>
                            </svg>
                            <div class="sc-10mkyz7-0 dWkYtl">
                                <div class="sc-10mkyz7-0 sc-1woi3cc-0 ldVXoJ"><span class="sc-1gu8y64-0 BbwkM sc-6wxr4l-2 kDayfp"><?php echo $cartcount; ?> Items</span>
                                    <p class="sc-1gu8y64-0 BbwkM sc-6wxr4l-5 kxCnUF">•</p>
                                    <p class="sc-1gu8y64-0 BbwkM sc-6wxr4l-3 iShSBF">&#8377;<?php echo number_format((float)$totalcost, 2); ?></p>
                                </div>
                            </div>
                        </div><a href="checkout.php" class="text-dec-none"> <button class="sc-1hdkpm0-0 sc-35zitq-5 gCdDXe">Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>