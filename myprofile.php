<!DOCTYPE html>
<?php
@include("includes/config.php");
if($_SESSION["customer_id"]=="" && !isset($_SESSION["guest_id"]))
{
    header("Location: login.php");
}
$myorders=getMyOrders();
$myprofile=getMyProfile();
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
        <title> BSS</title>
        <style>
        label{margin-bottom:5px;margin-top:5px;}
    </style>
    </head>
<body>
<?php @include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php @include("sidebar.php"); ?>
            </div>
            <div class="col-sm-9">
                <div class="heading">
                  <h2>My Profile</h2>
                  <hr>
                </div>
                <?php @include("myprofileform.php"); ?>
            </div>
    </div>
 <br>
 <br>
<script>
jQuery(document).on('keyup focusout', '.field-validate', function(e)
{

    if(this.value == '') {
        jQuery(this).css('border-color', 'red');
        jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").removeAttr('hidden');
    }
    else
    {
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }
});

jQuery(document).on('keyup focusout', '.mobile-validate', function(e)
{

    if(this.value == '' || isNaN(this.value) || this.value.length < 10) {
        jQuery(this).css('border-color', 'red');
        jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").removeAttr('hidden');
    }
    else
    {
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }
});

//validate form
jQuery(document).on('submit', '.profile-validate', function(e){
var error = "";

jQuery(".field-validate").each(function()
{

    if(this.value == '') {
        jQuery(this).css('border-color', 'red');
        jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").removeAttr('hidden');
        error = "has error";
    }
    else
    {
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }
});

jQuery(".mobile-validate").each(function() {
    if(this.value == '' || isNaN(this.value) || this.value.length < 10) {
        jQuery(this).css('border-color', 'red');
        jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").removeAttr('hidden');
        error = "has error";
    }
    else
    {
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }
});



	if(error=="has error"){
		return false;
	}
});
</script>
</body>
</html>