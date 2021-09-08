<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script><style type="text/css">
    .input-group .form-control{top: -10px !important;
    width: 40px !important;
    margin-left: 5px !important;
    margin-right: 5px !important;
}
    </style>
    <title> BSS</title>
  </head>
<body>
<?php
    @include("includes/config.php");
    @include("header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
           <br>
        </div>
        <div class="col-sm-6" id="productlist">
            <div class="heading">
                <h2>Forgot Password</h2>
                <hr>
            </div>
            <form name="updateMyPassword" class="form-validate" id="updateMyPassword" action="showpassword.php" method="post">
                <div class="from-group">
                <label for="mobile"><strong style="color: red;">*</strong>Phone Number</label>
                <input  name="mobile" type="text" class="form-control mobile-validate" id="mobile" placeholder="Please enter your valid mobile number" value="" >
                <span class="form-text text-muted error-content" hidden>Please enter your valid mobile number</span>
                </div>

                <br><br>
                <div class="from-group">
                    <button type="submit" class="btn btn-primary">Send</button>

                </div>
            </form>
        </div>
        <div class="col-sm-3" id="cartlist">
            <br>
        </div>
  </div>
</div>
<script>
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
jQuery(document).on('submit', '.form-validate', function(e){
var error = "";
    jQuery(".mobile-validate").each(function() {
		if(this.value == '' || isNaN(this.value) || this.value.length < 10) {
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
	if(error=="has error"){
		return false;
	}
});
</script>
</body>
</html>