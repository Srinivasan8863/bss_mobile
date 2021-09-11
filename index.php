<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
    <title> BSS</title>
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
    @include("header.php");
    @include("banner.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php @include("category.php"); ?>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Search" autocomplete="off" id="searchterm" />

                    </div>
                </div>
                <div id="productlist">
                    <?php @include("products.php"); ?>
                </div>
            </div>
            <div class="col-sm-3" id="cartlist">
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
    </script>
</body>

</html>