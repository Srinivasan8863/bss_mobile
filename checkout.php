<?php
@include("includes/config.php");
if(!isset($_SESSION["customer_id"]) && !isset($_SESSION["guest_id"]))
{
    header("Location: login.php");
}
if(!$_SESSION["step"])
{
    $_SESSION["step"]=1;
}
?>
<!DOCTYPE html>
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

    .input-group .form-control{top: -10px !important;
    width: 40px !important;
    margin-left: 5px !important;
    margin-right: 5px !important;
}
    </style>
  </head>
<body>
<?php
 @include("header.php");
 ?>
<div class="container">
  <h2>Check Out</h2>
    <div class="row">
        <div class="col-sm-9">
            <ul class="nav nav-pills">
                <li <?php if($_SESSION["step"]==1){?>class="active"<?php } ?>><a data-toggle="pill" href="#shipaddress">Shipping Address</a></li>
                <li <?php if($_SESSION["step"]==2){?>class="active"<?php } ?>><a data-toggle="pill" href="#paymentmethod">Payment Method</a></li>
            </ul>
            
            <div class="tab-content">
                <div id="shipaddress" class="tab-pane fade in <?php if($_SESSION["step"]==1){ echo 'active'; } ?>">
                    <?php
                    @include("shippingaddressform.php");
                    ?>
                
                </div>
                <div id="paymentmethod" class="tab-pane fade in <?php if($_SESSION["step"]==2){ echo 'active'; } ?>">
                    <?php
                    @include("paymentmethodform.php");
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
        <?php
        @include("ordersummary.php");
        ?>
        </div>
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

jQuery(document).on('keyup focusout', '.address-validate', function(e){
	if(this.value == '') 
    {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
    }else{
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }

});
jQuery(document).on('keyup focusout', '.city-validate', function(e){
	if(this.value == '') 
    {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
    }else{
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }

});
jQuery(document).on('keyup focusout', '.state-validate', function(e){
	if(this.value == '') 
    {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
    }else{
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }

});
jQuery(document).on('keyup focusout', '.pincode-validate', function(e){
	if(this.value == '' || isNaN(this.value) || this.value.length < 6) {
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
jQuery(document).on('submit', '.form-validate', function(e){
var error = "";

jQuery(".field-validate").each(function() {
		if(this.value == '') {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
		}else{
			jQuery(this).css('border-color', '#dee2e6');
			jQuery(this).parents(".input-group").removeClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").attr('hidden', true);
		}
});

jQuery(".address-validate").each(function(){
	if(this.value == '') 
    {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
    }else{
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }

});

jQuery(".city-validate").each(function(){
	if(this.value == '') 
    {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
    }else{
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }

});

jQuery(".state-validate").each(function(){
	if(this.value == '') 
    {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
    }else{
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }

});

jQuery(".pincode-validate").each(function(){
	if(this.value == '' || isNaN(this.value) || this.value.length < 6) {
    {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
    }else{
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }

});



jQuery('.mobile-validate').each(function(){

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

if(error!="")
{
	jQuery(this).css('border-color', 'red');
    jQuery(this).parents(".input-group").addClass('has-error');
    jQuery(this).next(".error-content").css('color', 'red');
    jQuery(this).next(".error-content").removeAttr('hidden');
    return false;
}
});
//validate form
jQuery(document).on('submit', '.payment-validate', function(e){
var error = "";
var isChecked = jQuery('#cod').prop('checked')?true:false;
if(isChecked==false) error="has error";
if(error!="")
{
    jQuery(".error-content").removeAttr('hidden');
    jQuery(".error-content").css('color', 'red');
    error="";
    return false;
}
});
</script>
</body>
</html>