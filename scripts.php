<script type="text/javascript">
    $(document).ready(function() {

        if (window.location.href.includes('index.php') || !window.location.href.includes('.php')) {
            $("#myCarousel").css('display', 'block');
        } else {
            $("#myCarousel").css('display', 'none');
        }

        $(document).on("click", "#viewCartMobileBtn", function() {
            $(".viewCartPage").css("display", "flex")
            $(".gfdwqu").css("display", "none")
        })


        $('#categoryBss0').addClass("lcdcqN").removeClass("eQpvsi");
        $('#categoryBss0').siblings().addClass("eQpvsi").removeClass("lcdcqN")
        $('#categoryBssMobile0').css("border-bottom", "3px solid rgb(0, 192, 139)");
        $('#categoryBssMobile0').siblings().css("border-bottom", "")
        $('#categoryBssMobile0').find('a').css("color", "rgb(15, 25, 56)")
        $('#categoryBssMobile0').siblings().find('a').css('color', 'rgb(135, 140, 155)')

        $('.outline-none').on('focus blur', (e) => {
            if (e.type == 'focus') {
                $('.searchBorder').css("border", "1px solid rgb(0, 179, 122)")

            } else {
                $('.searchBorder').css("border", "1px solid white")

            }
        });

        var j = $('.chBgpx').height();
        var sum = (j * 2) + 35;
        $('.bTkgTA').css('height', sum + 'px');
        $('.tab-content').hide();
        $('#BEVERAGES').show();
        $('.sc-1hdkpm0-0').click(function() {
            var d = $(this).attr('value');

            $('.tab-content').hide();
            $('#' + d).show();
            $('.sc-1hdkpm0-0').addClass('eQpvsi').removeClass('lcdcqN');
            $(this).addClass('lcdcqN').removeClass('eQpvsi');

            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        });

        $('.padma-menu').click(function() {
            $('#categoryBssMobile0').css("border-bottom", "");

            $(this).find('a').css('color', 'rgb(15, 25, 56)');
            $(this).siblings().find('a').css('color', 'rgb(135, 140, 155)');

            var d = $(this).attr('value');
            $('.tab-content').hide();
            $('.' + d).show();
            $('a.nav-link').css('border-bottom', '0');
            $(this).find('a').css('border-bottom', '3px solid rgb(0, 192, 139)');
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        });
        $(window).resize(function() {
            var j = $('.chBgpx').height();
            var sum = (j * 2) + 35;
            $('.bTkgTA').css('height', sum + 'px');
        });
    });



    function showProducts(categoryid, index = null) {
        // var lastID = $('.load-more').attr('lastID');
        $('#categoryBss' + index).removeClass("cXhrkW eQpvsi");
        $('#categoryBss' + index).addClass("klBrHK lcdcqN");
        $('#categoryBss' + index).siblings().removeClass("klBrHK lcdcqN")
        $('#categoryBss' + index).siblings().addClass("cXhrkW eQpvsi")
        $("#productlist").load("products-ajax.php?category_id=" + categoryid);
    }

    function addtocart(productid) {
        //alert(productid);
        var option_id = $("#option_id" + productid).val();
        //alert(option_id);
        $.post("addtocart.php", {
            "option_id": option_id,
            "product_id": productid
        }, function(data) {
            // alert(data);
            $("#spanqty" + productid).css("display", "block");
            $("#qty" + productid).val(1);
            $("#qtyp" + productid).html(1);
            $("#button" + productid).css("display", "none");
            cart();
        });
    }

    function cart() {
        $("#cartlist").load("cart-ajax.php");
    }

    function addQuantity(product_id) {
        var option_id = $("#option_id" + product_id).val();
        $.post("addquantity.php", {
            "option_id": option_id,
            "product_id": product_id
        }, function(data) {
            var data1 = data.split("||");
            // alert(data1[1]);
            $("#spanqty" + product_id).css("display", "block");
            $("#qty" + product_id).val(data1[1]);
            $("#qtyp" + product_id).text(data1[1]);

            $("#button" + product_id).css("display", "none");
            cart();

        });
    }

    function addCartQuantity(product_id, option_id) {
        $.post("addquantity.php", {
            "option_id": option_id,
            "product_id": product_id
        }, function(data) {
            var data1 = data.split("||");
            // alert(data1[1]);
            $("#spanqty" + product_id).css("display", "block");
            $("#qty" + product_id).val(data1[1]);
            $("#qtyp" + product_id).html(data1[1]);

            $("#button" + product_id).css("display", "none");
            cart();

        });
    }

    function removeQuantity(product_id) {
        var option_id = $("#option_id" + product_id).val();
        $.post("removequantity.php", {
            "option_id": option_id,
            "product_id": product_id
        }, function(data) {
            var data1 = data.split("||");
            //alert(data1[0]);
            if (data1[1] == 0) {
                $("#spanqty" + product_id).css("display", "none");
                $("#button" + product_id).css("display", "block");
            } else {
                $("#spanqty" + product_id).css("display", "block");
                $("#qty" + product_id).val(data1[1]);
                $("#qtyp" + product_id).html(data1[1]);
                $("#button" + product_id).css("display", "none");
            }
            cart();

        });
    }

    function removeCartQuantity(product_id, option_id) {
        $.post("removequantity.php", {
            "option_id": option_id,
            "product_id": product_id
        }, function(data) {
            var data1 = data.split("||");
            //alert(data1[0]);
            if (data1[1] == 0) {
                $("#spanqty" + product_id).css("display", "none");
                $("#button" + product_id).css("display", "block");
            } else {
                $("#spanqty" + product_id).css("display", "block");
                $("#qty" + product_id).val(data1[1]);
                $("#qtyp" + product_id).html(data1[1]);
                $("#button" + product_id).css("display", "none");
            }
            cart();

        });
    }

    function showAddButton(product_id, option_id) {
        //alert(option_id);
        $.post("getcartoptions.php", {
            "option_id": option_id
        }, function(data) {
            //alert(data);
            if (data == 0) {
                $("#spanqty" + product_id).css("display", "none");
                $("#button" + product_id).css("display", "block");
            } else {
                $("#spanqty" + product_id).css("display", "block");
                $("#button" + product_id).css("display", "none");
            }
            cart();

        });
        $.post("getcartquantity.php", {
            "option_id": option_id
        }, function(data) {
            //alert(data);
            $("#qty" + product_id).val(data);
            $("#qtyp" + product_id).html(data);

        });
    }

    function removeFromCart(cartid) {
        var categoryid = $("#category_id").val();
        // if(confirm("Are You sure want to remove this product from the cart ?"))
        // {
        $.post("removefromcart.php", {
            "cartid": cartid,
            "categoryid": categoryid
        }, function(data) {
            //alert(data);
            showProducts(data);
        });
        // }
        cart();

    }
</script>