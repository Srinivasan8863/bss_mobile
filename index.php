<!DOCTYPE html>
<html lang="en">

<head>
    <title>BSS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Khula&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
</head>

<body>
    <?php
    @include("includes/config.php");
    ?>

    <div class="viewCartPage" style="display: none;">
        <?php
        @include("viewCartMobile.php");
        ?>
    </div>
    <div class="sc-10mkyz7-0 k0tmtc-7 gfdwqu">
        <div class="sc-10mkyz7-0 xkwf08-6 iojkqX">
            <?php
            @include("header.php");
            @include("search.php");
            ?>
        </div>
        <?php @include("categoryMobile.php") ?>

        <div class="sc-10mkyz7-0 sblcwm-0 k0tmtc-1 bxUDzw">
            <div class="sc-10mkyz7-0 sc-1woi3cc-0 KhJWx">
                <div class="sc-10mkyz7-0 sc-1woi3cc-0 k0tmtc-2 bTkgTA">
                    <?php @include("category.php") ?>
                </div>
                <?php
                @include("products.php");
                @include("cart.php");
                ?>
            </div>
            <div class="sc-10mkyz7-0 sc-1woi3cc-0 sc-9rax15-0 fSDDmS">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 17" width="17" height="17" class="sc-64ptou-0 ZJgbP">
                    <path d="M6.125 16.15V2.902l-4.631 4.5a.894.894 0 01-1.238 0 .833.833 0 010-1.203L6.381.249a.893.893 0 011.238 0l6.125 5.95a.835.835 0 010 1.202.893.893 0 01-1.238 0l-4.63-4.5V16.15c0 .47-.393.85-.876.85a.863.863 0 01-.875-.85z" fill="#fff"></path>
                </svg>
            </div>
        </div>
    </div>
    </div>
    <div id="modal"></div>
    <div id="expandable-view"></div>

</body>
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

</html>