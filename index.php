<!DOCTYPE html>
<html lang="en">

<head>
    <title> BSS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Khula&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <!--
<div class="jumbotron text-center">
  <h1>BSS</h1>
  <p>Bala Super Shoppe</p> 
</div>
-->
    <?php
    @include("includes/config.php");
    // @include("header.php");
    // @include("banner.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12 header-fixed">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Search" autocomplete="off" 
                                id="searchterm" />
                    </div>
                </div>
            </div>
            <div class="col-sm-3 category-fixed">
                <?php @include("category.php"); ?>
            </div>
            <div class="col-sm-6 products-list">
                
                <div id="productlist">
                    <?php @include("products.php"); ?>
                </div>
            </div>
            <div class="col-sm-3 cart-fixed" id="cartlist">
                <?php @include("cart.php"); ?>
            </div>
        </div>
    </div>
    <?php @include("scripts.php"); ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $(window).scroll(function() {
                var lastID = $('.load-more').attr('lastID');
                var categoryid = $("#category_id").val();
                var searchterm = $("#searchterm").val();
                if (($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)) {
                    $.ajax({
                        type: 'POST',
                        url: 'getData.php',
                        data: 'id=' + lastID + '&category_id=' + categoryid + '&searchterm=' + searchterm,
                        beforeSend: function() {
                            $('.load-more').show();
                        },
                        success: function(html) {
                            //console.log(html);
                            $('.load-more').remove();
                            $('#productlist').append(html);
                        }
                    });
                }
            });
            $("#searchterm").keyup(function() {
                var lastID = $('.load-more').attr('lastID');
                var categoryid = $("#category_id").val();
                var searchterm = $("#searchterm").val();
                //alert(lastID);
                $.ajax({
                    type: 'POST',
                    url: 'getSearchData.php',
                    data: 'id=' + lastID + '&category_id=' + categoryid + '&searchterm=' + searchterm,
                    beforeSend: function() {
                        $('.load-more').show();
                    },
                    success: function(html) {
                        console.log(html);
                        $('.load-more').remove();
                        $('#productlist').html(html);
                    }
                });
            });

        });
        $('.carousel').carousel();
        selectedItem();
    function selectedItem() {

        
        var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < ll; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
            except the current select box:*/
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
    }
    </script>
</body>

</html>